@extends('layout.masterLayout')

@section('content-data')
                    <div class="intro-y flex sm:flex-row items-center mt-3">
                        <h2 class="text-lg font-medium mr-auto">
                            <b>Create BOQ of {{ $project->brand_master->brand_name }} at {{ $project->location_master->location_name }}</b>
                        </h2>
                        <div class="text-center">
                            <!-- BEGIN: Super Large Modal Toggle -->
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary mr-1">Choose Template</a>
                            <!-- END: Super Large Modal Toggle -->
                        </div>
                        <!-- BEGIN: Super Large Modal Content -->
                        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body p-10 text-center">
                                        <table class="table allWork" id="emp-table">
                                            <thead>
                                              <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">BOQ</th>
                                                <th scope="col">ชื่อโครงการ</th>
                                                <th scope="col">ขนาด</th>
                                                <th scope="col"></th>
                                              </tr>
                                              <tr>
                                                <th scope="col" class="filterhead">ID</th>
                                                <th scope="col" class="filterhead">BOQ</th>
                                                <th scope="col" class="filterhead">ชื่อโครงการ</th>
                                                <th scope="col" class="filterhead">ขนาด</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $template_choose as $key => $edt )
                                                    @if ($edt->status == "2")
                                                        <tr>
                                                            <th scope="row">{{$edt->number_id}}</th>
                                                            <td>{{$edt->name}}</td>
                                                            <td>{{@$edt->project->brand_master->brand_name}} at {{@$edt->project->location_master->location_name}}</td>
                                                            <td>{{@$edt->project->area}}</td>
                                                            <td class="text-center"><a href="{{ url('/addformboq-template', [$edt->id, $project->id] ) }}" class="btn btn-primary">เลือก</a></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Super Large Modal Content -->
                    </div>
                    <!-- BEGIN: Validation Form -->
                        <div class="group_wrapper">
                            <div class="intro-y input-form box p-5 mt-3">
                            <form action="{{ route('add_Boq') }}" method="post" id="form1" name="form1" onsubmit="return validateForm()" enctype="multipart/form-data">
                                @csrf
                                <div class="form-inline mb-3 mt-10">
                                    <label for="horizontal-form-1" class="form-label ml-4"><b> Vender </b><span style="color: red">*</span> : </label>
                                    <select id="vender_id" name="vender_id" class="tom-select w-72" placeholder="Select Vender...">
                                        <option selected value=""></option>
                                        @foreach ( $venders as $vd )
                                        <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="{{ $project->id }}" name="project_id" id="p_id">
                                <input type="hidden" value="{{ $project->brand }}" name="brand_id" id="b_id"> {{-- ID brand จาก project--}}
                                <div id="addmain" class="input-form mt-3">
                                    @foreach ($catagories as $key => $cat)
                                        <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(153, 187, 238);" readonly >
                                        <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
                                        <div class="intro-y input-form mt-3 ml-2">
                                            <div class="input-form">
                                                <div id="addsub" class="flex flex-row gap-2 mb-2">
                                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">
                                                    <span id="code_id{{$key + 1}}"></span>
                                                    {{-- <select id="code_id{{$key + 1}}" name="code_id[][{{$cat->id}}]" class="selectDropdown_2 w-32" placeholder="Code...">
                                                        <option selected value=""></option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->code}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <span id="select_code_id{{$key + 1}}"></span>
                                                    {{-- <select id="sub{{$key + 1}}" name="sub_id[][{{ $cat->id }}]" class="selectDropdown_2 w-full" placeholder="Please Select...">
                                                        <option selected value=""></option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <span id="select_sub_id{{$key + 1}}"></span>
                                                    <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" placeholder="จำนวน">
                                                    <select name="unit_id[][{{ $cat->id }}]" class="form-control w-24">
                                                        <option selected value=""></option>
                                                        @foreach ($catagories2 as $cat2)
                                                        <option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">
                                                    @php
                                                    $data_chk = App\Models\template_boqs::where('project_id', $project->id)
                                                    ->where('name', "Master BOQ")
                                                    ->first();
                                                    @endphp
                                                    @if ( $data_chk )
                                                    <input type="number" name="material_cost[][{{ $cat->id }}]" placeholder="ค่าวัสดุ" class="form-control w-24">
                                                    <input type="number" name="wage_cost[][{{ $cat->id }}]" placeholder="ค่าแรง" class="form-control w-24">
                                                    @endif
                                                    <input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">
                                                </div>
                                                <div id="newRowsub{{$key + 1}}"></div>
                                                <input type="hidden" id="number_s" rel="{{$key + 1}}">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 mb-3">
                                            <div class="col-span-2">
                                                <input type="button" value="ลบงานย่อยที่เลือก" class="btn btn-secondary" id="checkDel" />
                                            </div>
                                            <div class="flex justify-end gap-2">
                                                <input type="button" value="เพิ่มงานย่อย" class="btn btn-primary" id="btnAddsub{{$key + 1}}" rel="{{$key + 1}}" />
                                            </div>
                                        </div>
                                    @endforeach
                                        @php
                                        $data_chk = App\Models\template_boqs::where('project_id', $project->id)
                                        ->where('name', "Master BOQ")
                                        ->first();
                                        @endphp
                                        @if ($data_chk)
                                            @if ($data_chk->status == "2" )
                                            <div class="grid grid-cols-3 gap-2">
                                                <div class="input-form mt-3">
                                                    <label for="validation-form-8" class="form-label w-full flex flex-col sm:flex-row">
                                                       <b> Overhead </b>
                                                    </label>
                                                    <input id="validation-form-8" type="number" name="overhead" class="form-control" required>
                                                </div>
                                                <div class="input-form mt-3">
                                                    <label for="validation-form-9" class="form-label w-full flex flex-col sm:flex-row">
                                                       <b> Discount </b>
                                                    </label>
                                                    <input id="validation-form-9" type="number" name="discount" class="form-control" required>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                </div>
                                <input type="hidden" id="is_btn" name="btn_send">
                                <input type="submit" value="Save Draft" class="btn btn-primary mr-1">
                                @if ($data_chk)
                                    {{-- @if ("vender_id"  == "" ) --}}
                                    @if ($data_chk->status != "2")
                                        <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" onclick="myFunction()" data-tw-toggle="modal" data-tw-target="#delete-modal-preview">
                                        @endif
                                        @else
                                        <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" onclick="myFunction()" data-tw-toggle="modal" data-tw-target="#delete-modal-preview">
                                    @endif
                                {{-- @endif --}}
                                <a href="{{ url()->previous() }}" class="btn btn-dark-soft mt-5">Back</a>
                            </form>
                        </div>
                        </div>
                    <!-- END: Validation Form -->

                    @if ( "vender_id" != null )
                        <!-- BEGIN: Modal Content -->
                        <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center">
                                            <i data-lucide="send" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Send to Manager??</div>
                                            <div class="text-slate-500 mt-2">!! ตรวจสอบข้อมูลให้เรียบร้อยก่อนส่ง !!<br>???????????.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                            <button type="button" id="btn_send" name="send" class="btn btn-primary w-28">Save & Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Modal Content -->
                    @endif

        <script type="text/javascript">

            //table
            jQuery(document).ready(function() {
                var table = jQuery('.allWork').DataTable({
                    "bLengthChange": true,
                    "iDisplayLength": 10,
                    "ordering": false,
                });

                jQuery(".filterhead").each(function(i) {
                    var select = jQuery(
                            '<select class="form-control-sm w-full"><option value="">All</option></select>')
                        .appendTo(jQuery(this).empty())
                        .on('change', function() {
                            var term = $(this).val();
                            table.column(i).search(term, false, false).draw();
                        });
                    table.column(i).data().unique().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            });

            //alert
            function myFunction() {
                var x = document.forms["form1"]["vender_id"].value;
                if(x == "" || x == null) {
                    alert("Vender must be filled out");
                    return false;
                }
            }


            //alert
            function validateForm(){
                var x = document.forms["form1"]["vender_id"].value;
                if(x == "" || x == null) {
                    alert("Vender must be filled out");
                    return false;
                }
            }

            //
            jQuery(document).on('click', "#btn_send1", function(){
                $('#is_btn').val("btn_send");
            });

            //save & send
            jQuery(document).on('click', "#btn_send", function(){
                document.getElementById("form1").submit();
            });

            // remove subwork w/ btn
            jQuery(document).on('click', "#delSubBtn", function(){
                jQuery(this).closest('#addsub').remove();
            });

            // remove subwork w/ checkbox
            $("#checkDel").on('click', function() {
            var checked = jQuery('input:checkbox:checked').map(function () {
                return this.value;
            }).get();

            jQuery('input:checkbox:checked').parents('#addsub').remove();
            });

            jQuery('.selectDropdown_2').select2();
            // jQuery('.selectDropdown_23').select2();

            // btn add subwork
            jQuery(document).ready(function()
            {
                var x = 1;
                jQuery.ajax({
                url: "../addformBoq/select-catagory",
                type: "GET",
                datatype: "JSON",
                success: function(response) {
                    // console.log(response);

                    jQuery.each(response.data, function(key, value){
                        // console.log(response);
                        var sub_num = key + 1;

                        //append code
                            var html = '';
                            var html2 = '';
                            html += '<select id="code_id'+sub_num+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if( value3.brand_id ){

                                let rows_tags =  value3.brand_id.split(",");
                                // console.log(rows_tags);
                                jQuery.each(rows_tags, function(rkey, rvalue2){
                                    if( rows_tags[rkey] == $('#b_id').val() )
                                        {
                                        if(value3.catagory_id == value.id){

                                            html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                        }
                                    }
                                });
                                }else{
                                    if( value3.brand_id == null ){
                                        if(value3.catagory_id == value.id){
                                            html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                        }
                                    }
                                }
                            });

                            html += '</select>';
                            $('#select_code_id'+sub_num).append(html);
                            // jQuery('#code_id'+sub_num).select2();
                            jQuery('.selectDropdown_2').select2();


                            // append งานย่อย
                            html2 += '<select id="sub'+sub_num+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 sub" placeholder="Please Select...">';
                            html2 += '<option selected value=""></option>';

                            jQuery.each(response.dataSub, function(key, value2){
                                if( value2.brand_id ){

                                    let rows_tags =  value2.brand_id.split(",");
                                    // console.log(rows_tags);
                                    jQuery.each(rows_tags, function(rkey, rvalue2){
                                        if( rows_tags[rkey] == $('#b_id').val() )
                                        {
                                            if(value2.catagory_id == value.id){
                                                html2 += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                        }

                                    });
                                }else{
                                        if( value2.brand_id == null ){
                                            if(value2.catagory_id == value.id){
                                                html2 += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                        }
                                }
                            });
                            html2 += '</select>';
                            $('#select_sub_id'+sub_num).append(html2);
                            // jQuery('#sub'+sub_num).select2();
                            jQuery('.selectDropdown_2').select2();


                        // คลิกที่ code แล้ว link งานย่อย
                        jQuery(document).on('change', "#code_id"+sub_num, function(){
                            // alert("#sub1 option[value='2']");
                            console.log($(this).val());

                            jQuery('#select_sub_id'+sub_num).children().remove().end();

                            var html2 = '';
                            html2 += '<select id="sub'+sub_num+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 sub" placeholder="Please Select...">';
                            html2 += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value2){
                                if( value2.brand_id ){

                                    let rows_tags =  value2.brand_id.split(",");
                                    // console.log(rows_tags);
                                    jQuery.each(rows_tags, function(rkey, rvalue2){
                                        if( rows_tags[rkey] == $('#b_id').val() )
                                                {
                                            if(value2.catagory_id == value.id){

                                                html2 += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                }

                                    });
                                }else{
                                        if( value2.brand_id == null ){
                                            if(value2.catagory_id == value.id){
                                                html2 += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                        }
                                }
                            });
                            html2 += '</select>';
                            $('#select_sub_id'+sub_num).append(html2);

                            $("#sub"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                            // jQuery('.sub'+sub_num).select2();
                        });

                        //------------------------------------------------------------//

                        // คลิกที่ งานย่อย แล้ว link code
                        jQuery(document).on('change', "#sub"+sub_num, function(){
                            // alert("#sub1 option[value='2']");
                            console.log($(this).val());
                            console.log($(this).attr('id'));
                            console.log('#select_code_id'+sub_num);

                            jQuery('#select_code_id'+sub_num).children().remove().end();

                            var html = '';
                            html += '<select id="code_id'+sub_num+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if( value3.brand_id ){

                                    let rows_tags =  value3.brand_id.split(",");
                                    // console.log(rows_tags);
                                    jQuery.each(rows_tags, function(rkey, rvalue2){
                                        if( rows_tags[rkey] == $('#b_id').val() )
                                                {
                                            if(value3.catagory_id == value.id){

                                                html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                            }
                                }

                                    });
                                }else{
                                        if( value3.brand_id == null ){
                                            if(value3.catagory_id == value.id){
                                                html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                            }
                                        }
                                }
                            });
                            html += '</select>';
                            $('#select_code_id'+sub_num).append(html);

                            $("#code_id"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                            // jQuery('#code_id'+sub_num).select2();
                        });

                        //----------------------------------------------------------------------------------------------------//
                        // คลิกที่ งานย่อย แล้ว link code
                        jQuery(document).on('change', "#sub_a"+sub_num, function(){
                            // alert("#sub1 option[value='2']");
                            console.log($(this).val());
                            console.log($(this).attr('id'));
                            console.log("#code_id_a"+sub_num);

                            $("#code_id_a"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                            jQuery('#sub_a'+sub_num).select2();
                        });

                        jQuery(document).on('change', "#code_id_a"+sub_num, function(){
                            // alert("#sub1 option[value='2']");
                            console.log($(this).val());
                            console.log($(this).attr('id'));
                            console.log("#sub_a"+sub_num);

                            $("#sub_a"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                            jQuery('#sub_a'+sub_num).select2();
                        });

                        jQuery('.selectDropdown_2').select2();
                            jQuery('#sub_a'+sub_num).select2();


                        $("#btnAddsub" + sub_num).on('click', function(){
                            var html = '';
                            html += '<div id="addsub" class="flex flex-row gap-2 mb-2">';
                            html += '<input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">';
                            html += '<select id="code_id_a'+x+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if( value3.brand_id ){

                                    let rows_tags =  value3.brand_id.split(",");
                                    // console.log(rows_tags);
                                    jQuery.each(rows_tags, function(rkey, rvalue2){
                                        if( rows_tags[rkey] == $('#b_id').val() )
                                                {
                                            if(value3.catagory_id == value.id){

                                                html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                            }
                                    }

                                    });
                                    }else{
                                        if( value3.brand_id == null ){
                                            if(value3.catagory_id == value.id){
                                                html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                            }
                                        }
                                    }
                            });

                            html += '</select>';
                            html += '<select id="sub_a'+x+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 sub" placeholder="Please Select...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value2){
                                if( value2.brand_id ){

                                    let rows_tags =  value2.brand_id.split(",");
                                    // console.log(rows_tags);
                                    jQuery.each(rows_tags, function(rkey, rvalue2){
                                        if( rows_tags[rkey] == $('#b_id').val() )
                                                {
                                            if(value2.catagory_id == value.id){

                                                html += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                }

                                    });
                                }else{
                                        if( value2.brand_id == null ){
                                            if(value2.catagory_id == value.id){
                                                html += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                            }
                                        }
                                }
                            });
                            html += '</select>';
                            html += '<input type="number" name="amount[]['+value.id+']" class="form-control w-24" placeholder="จำนวน" >';
                            html += '<select name="unit_id[]['+value.id+']" class="form-control w-24" required>';
                            html += '<option selected value=""></option>@foreach ($catagories2 as $cat2)<option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>@endforeach</select>';
                            html += '<input type="text" name="desc[]['+value.id+']" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">';
                            html += '@if ( $data_chk )';
                            html += '<input type="number" name="material_cost[]['+value.id+']" placeholder="ค่าวัสดุ" class="form-control w-24">';
                            html += '<input type="number" name="wage_cost[]['+value.id+']" placeholder="ค่าแรง" class="form-control w-24">';
                            html += '@endif';
                            html += '<input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">';
                            html += '</div>';

                            // console.log(sub_num);
                        $("#newRowsub" + sub_num).append(html);
                        jQuery('.selectDropdown_2').select2();
                        jQuery('#sub'+sub_num).select2();

                        x++;
                         });

                    });
                }
                });
            });


        </script>
        <!-- END: JS Assets-->
@endsection
