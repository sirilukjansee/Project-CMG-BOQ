@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex sm:flex-row items-top mt-5">
    <h2 class="text-lg font-medium mr-auto">
        <b>View BOQ of {{ @$project_id->project->brand_master->brand_name }} at {{ @$project_id->project->location_master->location_name }}
        @if ( $project_id->name == 'Master BOQ' )
            [Master BOQ]
            @else
            [Additional BOQ]
        @endif</b>
    </h2>
    @if ( $project_id->comment != null )
    <div class="intro-y flex sm:flex-row items-top">
        <h2 class="text-lg font-medium mr-auto">
            <b>Comment from Manager : </b>
            <textarea class="flex" cols="60" rows="3" readonly>{{ $project_id->comment }}</textarea>
        </h2>
    </div>
    @endif
    </div>
<!-- BEGIN: Validation Form -->
<div class="group_wrapper">
    <div class="intro-y input-form box p-5 mt-3">
        {{-- <div class="form-inline mb-3 mt-10">
            <label for="horizontal-form-1" class="form-label ml-4">Vender : </label>
            <input type="text" value="{{ @$project_id->vender_name->name }}" disabled>
        </div> --}}
        <div id="addmain" class="input-form mt-3">
            @foreach ($catagories as $key => $cat)
            <input type="hidden" value="{{ $id }}" name="id">
            <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(153, 187, 238);" readonly >
            <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
            <div class="intro-y input-form mt-3 ml-2">
                <div class="input-form">
                    @foreach ( $editboq as $eb )
                    @if ( $eb->main_id == $cat->id)
                        <input type="hidden" value="{{ $eb->id }}" name="boq_id">
                        <input type="hidden" value="{{ $project_id->project_id }}" name="project_id">
                        <div id="addsub" class="flex flex-row gap-2 mb-2">
                            {{-- <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test"> --}}
                            <input type="text" class="w-24" value="{{ @$eb->sub_cata->code }}" disabled>
                            <input type="text" class="w-full" value="{{ $eb->sub_cata->name }}" disabled>
                            <input type="number" name="width[][{{ $cat->id }}]" class="form-control w-16" placeholder="กว้าง" value="{{ $eb->width }}" disabled>
                            <input type="number" name="depth[][{{ $cat->id }}]" class="form-control w-16" placeholder="ยาว" value="{{ $eb->depth }}" disabled>
                            <input type="number" name="height[][{{ $cat->id }}]" class="form-control w-16" placeholder="สูง" value="{{ $eb->height }}" disabled>
                            <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-16" placeholder="จำนวน" value="{{ $eb->amount }}" disabled>
                            <input type="text" class="w-24" value="{{ @$eb->unit_u->unit_name }}" disabled>
                            <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" value="{{ $eb->desc }}" disabled>
                            @php
                            $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                            ->where('name', "Master BOQ")
                            ->first();
                            @endphp
                            @if ( $data_chk )
                            <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->material_cost }}" disabled>
                            <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->wage_cost }}" disabled>
                            <input type="text" name="each_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->each_unit }}" disabled>
                            <input type="text" name="all_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->all_unit }}" disabled>
                            @endif
                        </div>
                    @endif
                    @endforeach
                    @php
                        $data_chk = App\Models\Boq::where('main_id', $cat->id)
                            ->where('template_boq_id', $project_id->id)
                            ->first();
                    @endphp
                    @if ( $data_chk == '')
                        <div id="addsub" class="flex flex-row gap-2 mb-2">
                            {{-- <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test"> --}}
                            <input type="text" class="w-24" disabled>
                            <input type="text" class="w-full" disabled>
                            <input type="number" name="width[][{{ $cat->id }}]" class="form-control w-16" placeholder="กว้าง" disabled>
                            <input type="number" name="depth[][{{ $cat->id }}]" class="form-control w-16" placeholder="ยาว" disabled>
                            <input type="number" name="height[][{{ $cat->id }}]" class="form-control w-16" placeholder="สูง" disabled>
                            <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-16" placeholder="จำนวน" disabled>
                            <input type="text" class="w-24" placeholder="หน่วย" disabled>
                            <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" disabled>
                            @php
                            $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                            ->where('name', "Master BOQ")
                            ->first();
                            @endphp
                            @if ( $data_chk )
                            <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าวัสดุ" disabled>
                            <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าแรง" disabled>
                            <input type="text" name="each_unit[][{{ $cat->id }}]" class="form-control w-24" placeholder="รวม/หน่วย" disabled>
                            <input type="text" name="all_unit[][{{ $cat->id }}]" class="form-control w-24" placeholder="รวมทั้งหมด" disabled>
                            @endif
                        </div>
                    @endif
                    <div id="newRowsub{{$key + 1}}"></div>
                    <input type="hidden" id="number_s" rel="{{$key + 1}}">
                </div>
            </div>

            @endforeach
            @php
                $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                ->where('name', "Master BOQ")
                ->first();
                // dd($data_chk);
                @endphp
                    @if ( $project_id->overhead > 0 )
                    <div class="grid grid-cols-3 gap-2">
                        <div class="input-form mt-3">
                            <label for="validation-form-8" class="form-label w-full flex flex-col sm:flex-row">
                                <b> Overhead </b>
                            </label>
                            <input id="validation-form-8" type="text" name="overhead" class="form-control" value="{{$project_id->overhead}}" disabled>
                        </div>
                        <div class="input-form mt-3">
                            <label for="validation-form-9" class="form-label w-full flex flex-col sm:flex-row">
                                <b> Discount </b>
                            </label>
                            <input id="validation-form-9" type="text" name="discount" class="form-control" value="{{$project_id->discount}}" disabled>
                        </div>
                    </div>
                    @endif
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Back</a>

</div>
</div>

@endsection
