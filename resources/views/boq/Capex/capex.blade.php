@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex sm:flex-row items-center mt-3">
                <h2 class="text-lg font-medium mr-auto">
                    <b>Create Capex of</b>
                </h2>
            </div>
            <!-- BEGIN: Validation Form -->
                <div class="group_wrapper">
                    <div class="intro-y input-form box p-5 mt-3">
                    <form action="{{ route('addcapex') }}" method="post" id="form1" name="form1" onsubmit="return validateForm()" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $template_id->project_id }}" name="project_id">
                        <input type="hidden" value="{{ $template_id->id }}" name="template_id">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12 xl:col-span-9 input-form mt-3">
                                <label for="" style="font-weight: bold;">ชื่อหมวด</label>
                            </div>
                            <div class="col-span-12 xl:col-span-3 input-form mt-3">
                                <label for="" style="font-weight: bold;">จำนวนเงิน</label>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-2">
                        @foreach ($data_categorys as $key => $cat)

                        <div class="col-span-12 xl:col-span-9 input-form mt-3">
                            <input type="hidden" value="{{ $cat->id }}" name="boq_id[]">
                            <input type="text" class="w-full" value="{{ $key + 1 }}. {{ $cat->name }}" readonly >
                        </div>
                        <div class="col-span-12 xl:col-span-3 input-form mt-3">
                            @foreach ( $cpx as $cx )
                            @if ( $cx->boq_id == $cat->id )
                            <input type="number" name="total[]" step=".01" class="w-full" value="{{ @$cx->total }}" placeholder="0000.00" style="text-align: right;" >
                            @endif
                            @endforeach
                            @if ( count($cpx) == 0)
                            <input type="number" name="total[]" step=".01" class="w-full" placeholder="0000.00" style="text-align: right;" >
                            @endif
                        </div>
                        @endforeach
                        </div>
                        <input type="submit" value="Save" class="btn btn-primary mt-5">
                    </form>
                </div>
                </div>
            <!-- END: Validation Form -->


<script type="text/javascript">

</script>
<!-- END: JS Assets-->
@endsection
