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
                    <form action="{{ route('add_Boq') }}" method="post" id="form1" name="form1" onsubmit="return validateForm()" enctype="multipart/form-data">
                        @csrf
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
                            <input type="text" class="w-full" value="{{ $key + 1 }}. {{ $cat->name }}" readonly >
                        </div>
                        <div class="col-span-12 xl:col-span-3 input-form mt-3">
                            <input type="text" class="w-full" value="2000.00" style="text-align: right;" readonly >
                        </div>
                        @endforeach
                        </div>
                    </form>
                </div>
                </div>
            <!-- END: Validation Form -->


<script type="text/javascript">

</script>
<!-- END: JS Assets-->
@endsection
