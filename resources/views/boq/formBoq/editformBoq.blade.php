@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex sm:flex-row items-center mt-3">
        <h2 class="text-lg font-medium mr-auto">
            <b>Edit BOQ of {{ $project_id->project->brand_master->brand_name }} at {{ $project_id->project->location_master->location_name }}
            @if ( $project_id->name == 'Master BOQ' )
                [Master BOQ]
                @else
                [Additional BOQ]
            @endif</b>
        </h2>
    </div>
    <!-- BEGIN: Validation Form -->
        <div class="group_wrapper">
            <div class="intro-y input-form box p-5 mt-3">
            <form action="{{ url('/formBoq/update') }}" method="post" onsubmit="return validateForm()" id="form1" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-inline mb-3 mt-10">
                    <label for="horizontal-form-1" class="form-label ml-4">Vender : </label>
                    <select id="vender_id" name="vender_id" class="tom-select w-72" placeholder="Select Vender...">
                        <option selected value="{{ @$project_id->vender_id }}">{{ @$project_id->vender_name->name }}</option>
                        @foreach ( $ven_der as $vd )
                        <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <input type="hidden" value="{{ @$project_id->project->brand_master->id }}" name="brand_id" id="b_id">
                <div id="addmain" class="input-form mt-3">
                    @php
                        $num_x = 1;
                    @endphp
                    @foreach ($catagories as $key => $cat)
                    <input type="hidden" value="{{ $id }}" name="id">
                    <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(153, 187, 238);" readonly >
                    <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
                    <input type="hidden" value="{{ $project_id->project_id }}" name="project_id">
                    <div class="intro-y input-form mt-3 ml-2">
                        <div class="input-form">
                            @foreach ( $editboq as $eb )
                            @if ( $eb->main_id == $cat->id)
                                <input type="hidden" value="{{ $eb->id }}" name="boq_id">
                                <div id="addsub" class="flex flex-row gap-2 mb-2">
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">
                                    <select id="code_edit{{$num_x}}" name="code_id[][{{$cat->id}}]" class="selectDropdown_2_edit code" placeholder="Code...">
                                        <option selected value="{{ $eb->sub_id }}">{{ @$eb->sub_cata->code }}</option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        @if ( $cat_s->is_active == "1")
                                            <option value="{{$cat_s->id}}">{{$cat_s->code}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select id="sub_edit{{$num_x}}" name="sub_id[][{{ $cat->id }}]" class="selectDropdown_2 sub" placeholder="Please Select...">
                                        <option selected value="{{ $eb->sub_id }}">{{ @$eb->sub_cata->name }}</option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        @if ( $cat_s->is_active == "1")
                                            <option value="{{$cat_s->id}}">{{@$cat_s->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <input type="number" id="width{{$key + 1}}" name="width[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="กว้าง" value="{{$eb->width}}">
                                    <input type="number" id="depth{{$key + 1}}" name="depth[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="ยาว" value="{{$eb->depth}}">
                                    <input type="number" id="height{{$key + 1}}" name="height[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="สูง" value="{{$eb->height}}">
                                    <input type="number" id="amount{{$key + 1}}" name="amount[][{{ $cat->id }}]" class="form-control w-20" min="0" step=".01" placeholder="จำนวน" value="{{ @$eb->amount }}" rel="{{$key + 1}}">
                                    <select name="unit_id[][{{ $cat->id }}]" class="form-control w-20">
                                        <option selected value="{{ $eb->unit_id }}">{{ @$eb->unit_u->unit_name }}</option>
                                        @foreach ($catagories2 as $cat2)
                                        <option value="{{$cat2->id}}">{{@$cat2->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc" value="{{ @$eb->desc }}">
                                    {{-- @if ( $eb->wage_cost != null ) --}}
                                    @if ( $eb->template->name != "Master BOQ" )
                                    <input type="number" id="material{{$key + 1}}" name="material_cost[][{{ $cat->id }}]" placeholder="ค่าวัสดุ" min="0" step=".01" class="form-control w-20" value="{{ @$eb->material_cost }}" rel="{{$key + 1}}">
                                    <input type="number" id="wage{{$key + 1}}" name="wage_cost[][{{ $cat->id }}]" placeholder="ค่าแรง" min="0" step=".01" class="form-control w-20" value="{{ @$eb->wage_cost }}" rel="{{$key + 1}}">
                                    <input type="text" id="each_unit{{$key + 1}}" name="each_unit[][{{ $cat->id }}]" placeholder="รวม/หน่วย" min="0" step=".01" class="form-control w-20" value="{{ @$eb->each_unit }}" readonly>
                                    <input type="text" id="all_unit{{$key + 1}}" name="all_unit[][{{ $cat->id }}]" placeholder="รวมทั้งหมด" min="0" step=".01" class="form-control w-20" value="{{ @$eb->all_unit }}" readonly>
                                    @endif

                                    <input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">
                                </div>
                                @php
                                    $num_x ++;
                                @endphp
                            @endif
                            @endforeach
                            @php
                                $data_chk = App\Models\Boq::where('main_id', $cat->id)
                                    ->where('template_boq_id', $project_id->id)
                                    ->first();
                            @endphp
                            @if ( $data_chk == '')
                                <div id="addsub" class="flex flex-row gap-2 mb-2">
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">
                                    <span id="select_code_id{{$key + 1}}"></span>
                                    <span id="select_sub_id{{$key + 1}}"></span>
                                    <input type="number" id="width{{$key + 1}}" name="width[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="กว้าง">
                                    <input type="number" id="depth{{$key + 1}}" name="depth[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="ยาว">
                                    <input type="number" id="height{{$key + 1}}" name="height[][{{ $cat->id }}]" class="form-control w-16" min="0" step=".01" placeholder="สูง">
                                    <input type="number" id="amount{{$key + 1}}" name="amount[][{{ $cat->id }}]" class="form-control w-20" min="0" step=".01" placeholder="จำนวน" rel="{{$key + 1}}" >
                                    <select name="unit_id[][{{ $cat->id }}]" class="form-control w-20" >
                                        <option selected value=""></option>
                                        @foreach ($catagories2 as $cat2)
                                        <option value="{{$cat2->id}}">{{@$cat2->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">
                                    @php
                                    $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                                    ->where('name', "Master BOQ")
                                    ->first();
                                    @endphp
                                    @if ( $data_chk )
                                        @if ( $data_chk->status == "2" )
                                        <input type="number" id="material{{$key + 1}}" name="material_cost[][{{ $cat->id }}]" min="0" step=".01" placeholder="ค่าวัสดุ" class="form-control w-20" rel="{{$key + 1}}">
                                        <input type="number" id="wage{{$key + 1}}" name="wage_cost[][{{ $cat->id }}]" min="0" step=".01" placeholder="ค่าแรง" class="form-control w-20" rel="{{$key + 1}}">
                                        <input type="text" id="each_unit{{$key + 1}}" name="each_unit[][{{ $cat->id }}]" min="0" step=".01" placeholder="รวม/หน่วย" class="form-control w-20" readonly>
                                        <input type="text" id="all_unit{{$key + 1}}" name="all_unit[][{{ $cat->id }}]" min="0" step=".01" placeholder="รวมทั้งหมด" class="form-control w-20" readonly>
                                        @endif
                                    @endif
                                    <input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">
                                </div>
                            @endif
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
                        $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                        ->where('name', "Master BOQ")
                        ->first();
                    @endphp
                        @if ( $project_id->name == "Additional BOQ" )
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="validation-form-8" class="form-label w-full flex flex-col sm:flex-row">
                                <b> Overhead </b>
                                </label>
                                <input id="validation-form-8" type="number" name="overhead" class="form-control" value="{{$project_id->overhead}}">
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-9" class="form-label w-full flex flex-col sm:flex-row">
                                <b> Discount </b>
                                </label>
                                <input id="validation-form-9" type="number" name="discount" class="form-control" value="{{$project_id->discount}}">
                            </div>
                        </div>
                        @endif
                </div>
                <input type="hidden" id="is_btn" name="btn_send">
                <input type="submit" value="Save Draft" class="btn btn-primary mr-1">
                @if (Auth::user()->permision == "2")
                    @if ($data_chk)
                        @if ($data_chk->status != "2")
                        <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" onclick="myFunction()">
                        @endif
                        @else
                        <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" onclick="myFunction()">
                    @endif
                @endif
                {{-- @if ( Auth::user()->permision == "1" )
                    <a href="{{ url('/checkBoq') }}" class="btn btn-secondary mt-5">Back</a>
                @else --}}
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Back</a>
                {{-- @endif --}}
            </form>
        </div>
        </div>
        <!-- END: Validation Form -->
        <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="send" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Send to Manager??</div>
                            <div class="text-slate-500 mt-2"> ตรวจสอบข้อมูลให้เรียบร้อยก่อนส่ง !! <br>???????????.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="button" id="btn_send_to" name="send" class="btn btn-primary w-28">Save & Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            //alert
            function myFunction(){
                const myModal = tailwind.Modal.getInstance(document.querySelector("#delete-modal-preview"));
                // var x = document.forms["form1"]["vender_id"].value;
                // if(x == "" || x == null) {
                    // alert("Vender must be filled out");
                    // $('#delete-modal-preview').hide();
                    // myModal.hide();
                    // return false;
                // }if(x != "" || x != null)
                // {
                    // jQuery('#delete-modal-preview').show();
                    myModal.show();

                // }
            }

            //
            jQuery(document).on('click', "#btn_send_to", function(){
                $('#is_btn').val("btn_send");
            });

            //save & send
            jQuery(document).on('click', "#btn_send_to", function(){
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

            // btn add subwork
            jQuery(document).ready(function()
            {
                var x = 1;
                jQuery.ajax({
                url: "../../addformBoq/select-catagory",
                type: "GET",
                datatype: "JSON",
                success: function(response) {
                    // console.log(response);

                    jQuery.each(response.data, function(key, value){
                        // console.log(response);
                        var sub_num = key + 1;

                        // calculate wage
                        $('#wage'+sub_num).on('keyup', function() {
                            var row = $(this).attr('rel');
                            let wge = $(this).val();
                            var mtr = $("#material"+sub_num).val();
                            var amt = $("#amount"+sub_num).val();
                            // var eun = $("#each_unit").val();
                            var cost1 = (parseFloat(wge) + parseFloat(mtr)).toFixed(2);
                            var cost2 = (parseFloat(amt) * parseFloat(cost1)).toFixed(2);

                            console.log(row);
                            $('#each_unit'+sub_num).val(cost1);
                            $('#all_unit'+sub_num).val(cost2);

                        });

                        // check material
                        $('#material'+sub_num).on('keyup', function() {
                            var row = $(this).attr('rel');
                            var material = $(this).val();
                            var amount = $('#amount'+sub_num).val();
                            var wge = $('#wage'+sub_num).val();
                            var cost1 = (parseFloat(wge) + parseFloat(material)).toFixed(2);
                            var cost2 = (parseFloat(amount) * parseFloat(cost1)).toFixed(2);

                            console.log('#material'+sub_num);

                            $('#each_unit'+sub_num).val(cost1);
                            $('#all_unit'+sub_num).val(cost2);
                        });

                        // check amount
                        $('#amount'+sub_num).on('keyup', function() {
                            var row = $(this).attr('rel');
                            var material = $('#material'+sub_num).val();
                            var amount = $(this).val();
                            var wge = $('#wage'+sub_num).val();
                            var cost1 = (parseFloat(wge) + parseFloat(material)).toFixed(2);
                            var cost2 = (parseFloat(amount) * parseFloat(cost1)).toFixed(2);

                            console.log('#amount'+sub_num);

                            $('#each_unit'+row).val(cost1);
                            $('#all_unit'+row).val(cost2);
                        });

                        //append code
                            var html = '';
                            var html2 = '';
                            html += '<select id="code_id'+sub_num+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if(value3.brand_id){
                                    let rows_tags =  value3.brand_id.split(",");
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

                            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //link code => sub [edit]
                            jQuery(document).on('change', "#code_edit"+sub_num, function(){
                                jQuery("sub_edit"+sub_num).children().remove().end();

                                $("#sub_edit"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                                jQuery('#sub_edit'+sub_num).select2();

                            });
                            jQuery('#code_edit'+sub_num).select2();

                            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            //link sub => code [edit]
                            jQuery(document).on('change', "#sub_edit"+sub_num, function(){
                                jQuery("code_edit"+sub_num).children().remove().end();

                                $("#code_edit"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                                jQuery('#code_edit'+sub_num).select2();

                            });
                            // jQuery('#code_edit'+sub_num).select2();

                        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            // append งานย่อย
                            html2 += '<select id="sub_id'+sub_num+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 sub" placeholder="Please Select...">';
                            html2 += '<option selected value=""></option>';

                            jQuery.each(response.dataSub, function(key, value2){
                                if(value2.brand_id){
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
                            console.log($(this).val());

                            jQuery('#select_sub_id'+sub_num).children().remove().end();

                            var html = '';
                            html += '<select id="sub_id'+sub_num+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value2){
                                if(value2.brand_id){
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
                            $('#select_sub_id'+sub_num).append(html);

                            $("#sub_id"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                        });

                        //------------------------------------------------------------//

                        // คลิกที่ งานย่อย แล้ว link code
                        jQuery(document).on('change', "#sub_id"+sub_num, function(){
                            console.log($(this).val());
                            jQuery('#select_code_id'+sub_num).children().remove().end();

                            var html = '';
                            html += '<select id="code_id'+sub_num+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if(value3.brand_id){
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
                                if(value3.brand_id){
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
                                if(value2.brand_id){

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
                            html +=  '<input type="number" name="width[]['+value.id+']" class="form-control w-16" min="0" step=".01" placeholder="กว้าง">';
                            html +=  '<input type="number" name="depth[]['+value.id+']" class="form-control w-16" min="0" step=".01" placeholder="ยาว">';
                            html +=  '<input type="number" name="height[]['+value.id+']" class="form-control w-16" min="0" step=".01" placeholder="สูง">';
                            html += '<input type="number" id="amount2'+x+'" name="amount[]['+value.id+']" min="0" step=".01" class="form-control w-20" placeholder="จำนวน" rel="'+x+'" >';
                            html += '<select name="unit_id[]['+value.id+']" class="form-control w-20" >';
                            html += '<option selected value=""></option>@foreach ($catagories2 as $cat2)<option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>@endforeach</select>';
                            html += '<input type="text" name="desc[]['+value.id+']" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">';
                            html += '@if ( $data_chk )';
                            html += '@if ($data_chk->status == "2" )';
                            html += '<input type="number" id="material2'+x+'" name="material_cost[]['+value.id+']" min="0" step=".01" placeholder="ค่าวัสดุ" class="form-control w-20" rel="'+x+'">';
                            html += '<input type="number" id="wage2'+x+'" name="wage_cost[]['+value.id+']" min="0" step=".01" placeholder="ค่าแรง" class="form-control w-20" rel="'+x+'">';
                            html += '<input type="text" id="each_unit2'+x+'" name="each_unit[]['+value.id+']" min="0" step=".01" placeholder="รวม/หน่วย" class="form-control w-20" readonly>';
                            html += '<input type="text" id="all_unit2'+x+'" name="all_unit[]['+value.id+']" min="0" step=".01" placeholder="รวมทั้งหมด" class="form-control w-20" readonly>';
                            html += '@endif';
                            html += '@endif';
                            html += '<input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">';
                            html += '</div>';

                            // console.log(sub_num);
                        $("#newRowsub" + sub_num).append(html);
                        jQuery('.selectDropdown_2').select2();
                        jQuery('#sub'+sub_num).select2();

                        // check wage
                        jQuery(document).on('keyup', '#wage2'+x, function() {
                            var row = $(this).attr('rel');
                            var material = $('#material2'+row).val();
                            var amount = $('#amount2'+row).val();
                            var wge = $(this).val();
                            var cost1 = (parseFloat(wge) + parseFloat(material)).toFixed(2);
                            var cost2 = (parseFloat(amount) * parseFloat(cost1)).toFixed(2);

                            // console.log(amount);

                            $('#each_unit2'+row).val(cost1);
                            $('#all_unit2'+row).val(cost2);
                        });

                        // check material
                        jQuery(document).on('keyup', '#material2'+x, function() {
                            var row = $(this).attr('rel');
                            var material = $(this).val();
                            var amount = $('#amount2'+row).val();
                            var wge = $('#wage2'+row).val();
                            var cost1 = (parseFloat(wge) + parseFloat(material)).toFixed(2);
                            var cost2 = (parseFloat(amount) * parseFloat(cost1)).toFixed(2);

                            // console.log('#material2'+x);

                            $('#each_unit2'+row).val(cost1);
                            $('#all_unit2'+row).val(cost2);
                        });

                        // check amount
                        jQuery(document).on('keyup', '#amount2'+x, function() {
                            var row = $(this).attr('rel');
                            var material = $('#material2'+row).val();
                            var amount = $(this).val();
                            var wge = $('#wage2'+row).val();
                            var cost1 = (parseFloat(wge) + parseFloat(material)).toFixed(2);
                            var cost2 = (parseFloat(amount) * parseFloat(cost1)).toFixed(2);

                            // console.log('#material2'+x);

                            $('#each_unit2'+row).val(cost1);
                            $('#all_unit2'+row).val(cost2);
                        });

                        x++;
                        });

                    });
                }
                });
            });


        </script>
        <!-- END: JS Assets-->
@endsection
