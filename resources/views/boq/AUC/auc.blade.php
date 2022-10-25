@extends('layout.masterLayout')

@section('content-data')
@if (session('success'))
        <div class="alert alert-warning-soft show flex items-center mb-2 mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    @endif
<form action="{{ url('/export-auc') }}" id="form1" name="form1" onsubmit="return validateForm()" enctype="multipart/form-data" method="post">
    @csrf
    <div class="intro-y flex sm:flex-row items-center mt-3">
        <h2 class="text-lg font-medium mr-auto mt-5 mb-5">
            <b>Select {{ @$auc_pro->brand_master->brand_name }} at {{ @$auc_pro->location_master->location_name }} to AUC</b>
        </h2>
        <div class="mt-5 mb-5">
            {{-- <button type="submit" class="btn btn-success text-white mt-5 gap-2">Export to Excel</button> --}}
            <input type="submit" class="btn btn-success text-white mt-5 gap-2" value="Export to Excel">
        </div>
    </div>
    <ul class="nav nav-tabs" role="tablist">
    @foreach ( $auc_temp as $key => $auc )
        @if ( $auc->project_id == $id )
        <li id="example-{{$key}}-tab" class="nav-item flex-1" role="presentation">
            <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-{{$key}}" type="button" role="tab" aria-controls="example-tab-{{$key}}" aria-selected="true">
                {{ $auc->name }}
            </button>
        </li>
        @endif
    @endforeach
    </ul>
    <div class="tab-content border-l border-r border-b">
        @if ( $auc->project_id == $id )
        @foreach ( $auc_temp as $key => $auc )
        <div id="example-tab-{{$key}}" class="tab-pane leading-relaxed p-5 box" role="tabpanel" aria-labelledby="example-{{$key}}-tab">
            <div class="group_wrapper">
                <div class="intro-y input-form p-3">
                    <div id="addmain" class="input-form">
                        @foreach ( $catagories as $key => $cat )
                        <input type="hidden" value="{{ $id }}" id="project_id" name="project_id">
                        <div class="flex flex-row gap-2">
                            <input id="checkbox-switch-{{$cat->id}}{{$auc->id}}" class="form-check-input" type="checkbox" name="chk_m[{{ $auc->id }}][]" value="{{ $cat->id }}">
                            <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(209, 208, 208);" readonly >
                        </div>
                        <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
                        <input type="hidden" name="template" value="{{$auc->id}}" id="template">
                        <div class="intro-y input-form mt-3">
                            <div class="input-form">
                                @foreach ( $auc->cat_sub as $ac )
                                @if ( $ac->main_id == $cat->id )
                                    <input type="hidden" name="project_id[][{{ $edit_dis->template_boq_id }}]">
                                    <div id="addsub" class="flex flex-row gap-2 mb-2 ml-3">
                                        <input class="form-check-input chk{{$cat->id}}{{$auc->id}}" type="checkbox" name="chk_s[{{$auc->id}}][]" value="{{$ac->id}}">  <!-- เก็บ id ของ boq -->
                                        <input type="text" class="w-24" value="{{ @$ac->sub_cata->code }}" readonly>
                                        <input type="text" name="sub[][{{ $ac->sub_id }}]" class="w-full" value="{{ @$ac->sub_cata->name }}" readonly>
                                        <input type="number" name="amount[][{{ $ac->id }}]" class="form-control w-24" placeholder="จำนวน" value="{{ @$ac->amount }}" readonly>
                                        <input type="text" name="unit[][{{ $ac->unit_id }}]" class="w-24" value="{{ @$ac->unit_u->unit_name }}" readonly>
                                        <input type="text" name="desc[][{{ $ac->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" value="{{ @$ac->desc }}" readonly>
                                        @if ( $auc->name == 'Master BOQ' )
                                        <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$auc->vender_auc->vender_d->material_cost }}" readonly>
                                            <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$auc->vender_auc->vender_d->wage_cost }}" readonly>
                                            <input type="text" name="each_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$auc->vender_auc->vender_d->each_unit }}" readonly>
                                            <input type="text" name="all_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$auc->vender_auc->vender_d->all_unit }}" readonly>
                                            @else
                                            <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$ac->material_cost }}" readonly>
                                            <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$ac->wage_cost }}" readonly>
                                            <input type="text" name="each_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$ac->each_unit }}" readonly>
                                            <input type="text" name="all_unit[][{{ $cat->id }}]" class="form-control w-24" value="{{ @$ac->all_unit }}" readonly>
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
                                    <div id="addsub" class="flex flex-row gap-2 mb-2 ml-3">
                                        <input id="checkbox-switch-2" class="form-check-input" type="checkbox" name="chk">
                                        <input type="text" class="w-24" value="" readonly>
                                        <input type="text" class="w-full" value="" readonly>
                                        <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" readonly>
                                        <input type="text" class="w-24" value="" readonly>
                                        <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" readonly>
                                        {{-- @if ( $ac->wage_cost != '' ) --}}
                                        <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าวัสดุ" readonly>
                                        <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าแรง" readonly>
                                        <input type="text" name="each_unit[][{{ $cat->id }}]" class="form-control w-24" placeholder="รวม/หน่วย" readonly>
                                        <input type="text" name="all_unit[][{{ $cat->id }}]" class="form-control w-24" placeholder="รวมทั้งหมด" readonly>
                                        {{-- @endif --}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Back</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</form>
<!-- Start: JS Assets-->
<script type="text/javascript">
    jQuery(document).ready(function(){
        var id = $('#project_id').val();
        var id_a = $('#template').val();
        // console.log(id_a);
        jQuery.ajax({
            url: "{!! url('export-auc/"+id+"') !!}",
            type: "GET",
            datatype: "JSON",
            success: function(response){
                jQuery.each(response.chk_box, function(key, value){
                    jQuery.each(response.chk_data, function(key1, value1){
                        $('#checkbox-switch-'+value1.id+''+value.id+'').on('click', function(){
                            if($(this).is(':checked') )
                            {
                                jQuery('.chk'+value1.id+''+value.id+'').prop("disabled", true);
                                jQuery('.chk'+value1.id+''+value.id+'').prop("checked", true);
                            }else{
                                jQuery('.chk'+value1.id+''+value.id+'').prop("disabled", false);
                                jQuery('.chk'+value1.id+''+value.id+'').prop("checked", false);
                            }
                        })
                    })
                })
                console.log(id);
            }
        })
    });
</script>
<!-- END: JS Assets-->
@endsection
