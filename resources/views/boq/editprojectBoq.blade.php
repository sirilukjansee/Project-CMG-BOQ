@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto mb-2">
            Edit Project
        </h2>
    </div>
    <!-- BEGIN: Validation Form -->
    <div class="group_wrapper">
        <form name="addProject" action="{{ url('/projectBoq/update') }}" method="post" id="formId" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $project->id }}" name="id">
            <div class="intro-y input-form box p-5">
                <div class="grid grid-cols-2 gap-2">
                    <div class="input-form mt-3">
                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                            Brand <span style="color: red">*</span>
                        </label>
                        {{-- <input id="validation-form-1" type="text" name="brand" class="form-control" required> --}}
                        <select name="brand" id="validation-form-1"  data-placeholder="Select a brand..." class="tom-select form-control w-full">
                            <option selected value="{{ $project->brand_master->id }}">{{ $project->brand_master->brand_name }}</option>
                            @foreach ($project1 as $pro1)
                            <option value="{{ $pro1->id }}">{{ $pro1->brand_name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-form mt-3">
                        <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                            Location <span style="color: red">*</span>
                        </label>
                        {{-- <input id="validation-form-2" type="text" name="location" class="form-control" required> --}}
                        <select id="validation-form-2" name="location" data-placeholder="Select a location..."  autocomplete="off" class="tom-select form-control w-full">
                            <option selected value="{{ $project->location_master->id }}">{{ $project->location_master->location_name }}</option>
                            @foreach ($project2 as $pro2)
                            <option value="{{ $pro2->id }}">{{ $pro2->location_name }}</option>
                            @endforeach
                        </select>
                        @error('location')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-8 gap-2">
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row">
                                Area/Sq.m <span style="color: red">*</span>
                            </label>
                            <input id="validation-form-3" type="number" name="area" class="form-control" value="{{ $project->area }}">
                        </div>
                        @error('area')
                                <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row">
                                IO number
                            </label>
                            <input id="validation-form-4" type="text" name="io" maxlength="8" class="form-control" value="{{ $project->io }}">
                            <p id="comment" class="text-danger mt-2"></p>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                Task Type <span style="color: red">*</span>
                            </label>
                            {{-- <input id="validation-form-5" type="text" name="task" class="form-control" required> --}}
                            <select id="select-beast-empty2" name="task" data-placeholder="Select a task type..."  autocomplete="off" class="tom-select form-control w-full">
                                <option selected value="{{ $project->task_type_master->id }}">{{ $project->task_type_master->task_type_name }}</option>
                                @foreach ($project3 as $pro3)
                                <option value="{{ $pro3->id }}">{{ $pro3->task_type_name }}</option>
                                @endforeach
                            </select>
                            @error('task')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row">
                                Task Name <span style="color: red">*</span>
                            </label>
                            {{-- <input id="validation-form-5" type="text" name="task_n" class="form-control" required> --}}
                            <select id="select-beast-empty3" name="task_n" data-placeholder="Select a task name..."  autocomplete="off" class="tom-select form-control w-full">
                                <option selected value="{{ $project->task_name_master->id }}">{{ $project->task_name_master->task_name }}</option>
                                @foreach ($project4 as $pro4)
                                <option value="{{$pro4->id}}">{{$pro4->task_name}}</option>
                                @endforeach
                            </select>
                            @error('task_n')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-8 gap-2">
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-6" class="form-label w-full sm:flex-row" id="sDate">
                                Start Date <span style="color: red">*</span>
                            </label>
                            <input id="validation-form-6" type="date" name="startDate" class="form-control" value="{{ $project->start_date }}">
                            @error('startDate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-7" class="form-label w-full sm:flex-row">
                                Hand Over Date <span style="color: red">*</span>
                            </label>
                            <input id="validation-form-7" type="date" name="finishDate" class="form-control" value="{{ $project->finish_date }}">
                            @error('finishDate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-10" class="form-label w-full sm:flex-row">
                                All Date
                            </label>
                            <input id="validation-form-10" type="text" name="alldate" class="form-control" value="{{ $project->all_date }}" readonly>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-2 mt-3">
                        <div class="input-form mt-2 xl:mt-0">
                            <label for="validation-form-11" class="form-label w-full sm:flex-row">
                                Open Date <span style="color: red">*</span>
                            </label>
                            <input id="validation-form-11" type="date" name="openDate" class="form-control" value="{{ $project->open_date }}">
                            @error('openDate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="input-form mt-3">
                        <label for="validation-form-8" class="form-label w-full flex flex-col sm:flex-row">
                            Designer Name <span style="color: red">*</span>
                        </label>
                        {{-- <input id="validation-form-8" type="text" name="ds_name" class="form-control" required> --}}
                        <select name="ds_name" id="validation-form-8" data-placeholder="Select a designer..."  autocomplete="off" class="tom-select form-control w-full">
                            <option selected value="{{ $project->designer_master->id }}">{{ $project->designer_master->name }}</option>
                            @foreach ($project5 as $pro5)
                            <option value="{{$pro5->id}}">{{$pro5->name}}</option>
                            @endforeach
                        </select>
                        @error('ds_name')
                                <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <input id="chk" type="submit" value="Save" class="btn btn-primary mt-5">
                {{-- <span id="btn_add"></span> --}}
                <a href="{{ url("index") }}" class="btn btn-secondary mt-5">Back</a>
            </div>
        </form>
    </div>

    <script type="text/javascript">

        // function validateForm() {
        // let x = document.forms["addProject"]["brand"]["location"]["task"]["task_n"]["ds_name"].value;
        // if (x == "") {
        //     alert("Must be filled out");
        //     return false;
        // }
        // }

        //calculate date
        $('#validation-form-7').on('change', function() {

            let strdate = $('#validation-form-6').val();
            var findate = $(this).val();
            var date1 = new Date(strdate);
            var date2 = new Date(findate);


            var diffTime = date2.getTime() - date1.getTime();
            var diffDay = diffTime / (1000 * 3600 * 24);
            console.log(diffDay);
            $('#validation-form-10').val(diffDay);

        });

        // Date Choose - Check
        // $(document).on('change', '[name="startDate"]', function() {
        //     var val = $(this).val();
            // if (val == 1) {
            //     $('[name="check_in"]').removeAttr('readonly').removeAttr('min');
            //     $('[name="check_out"]').removeAttr('readonly').removeAttr('min');
            // } else {
            //     $('[name="check_in"]').attr('readonly', true).val('');
            //     $('[name="check_out"]').attr('readonly', true).val('');
            // }
        // });
        jQuery(document).on('change', '[name="startDate"]', function() {
            var min = $(this).val();
            jQuery('[name="finishDate"]').attr('min', min);
            jQuery('[name="finishDate"]').val();
        });
        jQuery(document).on('change', '[name="finishDate"]', function() {
            var max = $(this).val();
            var min = $(this).val();
            jQuery('[name="startDate"]').attr('max', max);
            jQuery('[name="openDate"]').attr('min', min);
        });

        //  jQuery(document).on('click', '#chk', function(){
        //     var val_brand = $("#validation-form-1").val();
        //     var val_location = $("#validation-form-2").val();
        //     var val_task_t = $("#select-beast-empty2").val();
        //     var val_task_n = $("#select-beast-empty3").val();
        //     var val_design = $("#validation-form-8").val();

        //     if (val_brand == "" && val_task_t == "" && val_task_n == "" && val_design == "") {
        //         $('#test').text('Please fill this');
        //     }
        //     // if (val_location == ""){
        //     //     $('#test').text('Please fill this');
        //     // }
        //     // if(val_brand != "" && val_location != "" && val_task_t != "" && val_task_n != "" && val_design != ""){
        //     //     jQuery("#formId").submit();
        //     // }

        //  });
        //     jQuery(document).on('change', '#validation-form-1', function() {
        //         $('#test').text('');
        //     });
        //     jQuery(document).on('change', '#validation-form-2', function() {
        //         $('#test').text('');
        //     });

        jQuery(document).on('keyup', '#validation-form-4', function(){

            var id = $('#validation-form-4').val();
            var chk = $('#validation-form-1').val();

            jQuery.ajax({
            type:   "GET",
            url:    "{!! url('/addprojectBoq/chk_io/"+id+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(response) {
                console.log(response.chk_io.length);
                if ( response.chk_io.length > 1 )
                {
                    jQuery.each(response.chk_io, function(key, value){
                        if (value.brand != chk) {
                            $('#comment').text("'" + id + "' มีอยูในโครงการอื่นแล้วจ้าาาาาาาา !");
                        }
                    });
                    // console.log("Yay");
                }
                // $('#get_id').val(data.dataEdit.id);
                // $('#location_name').val(data.dataEdit.location_name);
                // $('#update_by').val(data.dataEdit.update_by);
                // jQuery('#Delete').children().remove().end();
            }
        });
        });
    </script>

@endsection
