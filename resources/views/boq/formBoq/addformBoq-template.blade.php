@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex sm:flex-row items-center mt-3">
        <h2 class="text-lg font-medium mr-auto">
            <b>Choose Template BOQ of {{ @$project_id->project->brand_master->brand_name }} at {{ @$project_id->project->location_master->location_name }}
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
            <form action="{{ route('add_Boq') }}" method="post" id="form1" enctype="multipart/form-data">
                @csrf
                <div class="form-inline mb-3 mt-10">
                    <label for="horizontal-form-1" class="form-label ml-4">Vender : </label>
                    <select id="vender_id" name="vender_id" class="tom-select w-72" placeholder="Select Vender..." required>
                        <option selected value="{{ $project_id->vender_id }}">{{ @$project_id->vender_name->name }}</option>
                        @foreach ( $ven_der as $vd )
                        <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" value="{{ $project_id->id }}" name="ref_template">
                <input type="hidden" value="{{ @$project_id->project->brand_master->id }}" name="brand_id" id="b_id">
                <input type="hidden" value="{{ $id }}" name="project_id" id="p_id">
                <div id="addmain" class="input-form mt-3">
                    @foreach ($catagories as $key => $cat)
                    <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(153, 187, 238);" readonly >
                    <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
                    <div class="intro-y input-form mt-3 ml-2">
                        <div class="input-form">
                            @foreach ( $data_boq as $eb )
                            @if ( $eb->main_id == $cat->id)
                                <div id="addsub" class="flex flex-row gap-2 mb-2">
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">
                                    <select id="code_id{{$cat->id}}" name="code_id[][{{$cat->id}}]" class="selectDropdown_2 code" placeholder="Code...">
                                        <option selected value="{{ $eb->sub_id }}">{{ @$eb->sub_cata->code }}</option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        <option value="{{$cat_s->id}}">{{@$cat_s->code}}</option>
                                        @endforeach
                                    </select>
                                    <select name="sub_id[][{{ $cat->id }}]" class="selectDropdown_2 sub" placeholder="Please Select...">
                                        <option selected value="{{ $eb->sub_id }}">{{ @$eb->sub_cata->name }}</option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        <option value="{{$cat_s->id}}">{{@$cat_s->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" placeholder="จำนวน" min="0" step=".01" value="{{ $eb->amount }}">
                                    <select name="unit_id[][{{ $cat->id }}]" class="form-control w-24">
                                        <option selected value="{{ $eb->unit_id }}">{{ @$eb->unit_u->unit_name }}</option>
                                        @foreach ($catagories2 as $cat2)
                                        <option value="{{$cat2->id}}">{{@$cat2->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc" value="{{ $eb->desc }}">
                                    @if ( $eb->wage_cost != null )
                                    <input type="number" name="material_cost[][{{ $cat->id }}]" placeholder="ค่าวัสดุ" class="form-control w-24" value="{{ @$eb->material_cost }}">
                                    <input type="number" name="wage_cost[][{{ $cat->id }}]" placeholder="ค่าแรง" class="form-control w-24" value="{{ @$eb->wage_cost }}">
                                    <input type="text" name="each_unit[][{{ $cat->id }}]" placeholder="รวม/หน่วย" class="form-control w-24" value="{{ @$eb->each_unit }}">
                                    <input type="text" name="all_unit[][{{ $cat->id }}]" placeholder="รวมทั้งหมด" class="form-control w-24" value="{{ @$eb->all_unit }}">
                                    @endif
                                    <input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">
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
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">
                                    {{-- <span>code_id{{$key + 1}}</span> --}}
                                    {{-- <select id="code_id{{$cat->id}}" name="code_id[][{{$cat->id}}]" class="selectDropdown_2" placeholder="Code...">
                                        <option selected value=""></option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        <option value="{{$cat_s->id}}">{{$cat_s->code}}</option>
                                        @endforeach
                                    </select> --}}
                                    <span id="select_code_id{{$key + 1}}"></span>
                                    {{-- <select id="sub1" name="sub_id[][{{ $cat->id }}]" class="selectDropdown_2">
                                        <option selected value=""></option>
                                        @foreach ($cat->catagory_sub as $cat_s)
                                        <option value="{{$cat_s->id}}">{{$cat_s->name}}</option>
                                        @endforeach
                                    </select> --}}
                                    <span id="select_sub_id{{$key + 1}}"></span>
                                    {{-- <span class="sub_selected{{ $cat->id }}"></span> --}}
                                    <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" placeholder="จำนวน">
                                    <select name="unit_id[][{{ $cat->id }}]" class="form-control w-24">
                                        <option selected value=""></option>
                                        @foreach ($catagories2 as $cat2)
                                        <option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">
                                    @if ( $eb->wage_cost != null )
                                        <input type="number" name="material_cost[][{{ $cat->id }}]" placeholder="ค่าวัสดุ" class="form-control w-24">
                                        <input type="number" name="wage_cost[][{{ $cat->id }}]" placeholder="ค่าแรง" class="form-control w-24">
                                        <input type="text" name="each_unit[][{{ $cat->id }}]" placeholder="รวม/หน่วย" class="form-control w-24" readonly>
                                        <input type="text" name="all_unit[][{{ $cat->id }}]" placeholder="รวมทั้งหมด" class="form-control w-24" readonly>
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
                        $data_chk = App\Models\template_boqs::where('id', $templateid)
                        ->first();
                        @endphp
                        @if ($data_chk->overhead > 0 )
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
                {{-- @if ($data_chk) --}}
                    @if ($data_chk->status != "2")
                    <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" data-tw-toggle="modal" data-tw-target="#delete-modal-preview">
                    {{-- @endif --}}
                    @else
                    <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" data-tw-toggle="modal" data-tw-target="#delete-modal-preview">
                    @endif
                {{-- <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" data-tw-toggle="modal" data-tw-target="#delete-modal-preview"> --}}
                <a href="{{ url('allBoq', $id) }}" class="btn btn-secondary mt-5">Back</a>
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
                            <div class="text-slate-500 mt-2">?????????????? <br>???????????.</div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="button" id="btn_send" name="send" class="btn btn-primary w-28">Save & Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

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


                            // append งานย่อย
                            html2 += '<select id="sub'+sub_num+'" name="sub_id[]['+value.id+']" class="selectDropdown_2 sub" placeholder="Please Select...">';
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
                        jQuery(document).on('change', "#sub"+sub_num, function(){
                            // alert("#sub1 option[value='2']");
                            console.log($(this).val());
                            // console.log($(this).attr('id'));
                            // console.log('#select_code_id'+sub_num);

                            jQuery('#select_code_id'+sub_num).children().remove().end();

                            var html = '';
                            html += '<select id="code_id'+sub_num+'" name="code_id[]['+value.id+']" class="selectDropdown_2 code" placeholder="Code...">';
                            html += '<option selected value=""></option>';
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
                            html += '</select>';
                            $('#select_code_id'+sub_num).append(html);

                            $("#code_id"+sub_num+" option[value='"+$(this).val()+"']").attr("selected","selected");

                            jQuery('.selectDropdown_2').select2();
                            // jQuery('#code_id'+sub_num).select2();
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
                            html += '<input type="number" name="amount[]['+value.id+']" class="form-control w-24" placeholder="จำนวน" >';
                            html += '<select name="unit_id[]['+value.id+']" class="form-control w-24" required>';
                            html += '<option selected value=""></option>@foreach ($catagories2 as $cat2)<option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>@endforeach</select>';
                            html += '<input type="text" name="desc[]['+value.id+']" placeholder="หมายเหตุ" aria-label="default input inline 2" class="desc">';
                            html += '@if ( $eb->wage_cost != null )';
                            html += '<input type="number" name="material_cost[]['+value.id+']" placeholder="ค่าวัสดุ" class="form-control w-24">';
                            html += '<input type="number" name="wage_cost[]['+value.id+']" placeholder="ค่าแรง" class="form-control w-24">';
                            html += '<input type="text" name="each_unit[]['+value.id+']" placeholder="รวม/หน่วย" class="form-control w-24" readonly>';
                            html += '<input type="text" name="all_unit[]['+value.id+']" placeholder="รวมทั้งหมด" class="form-control w-24" readonly>';
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
