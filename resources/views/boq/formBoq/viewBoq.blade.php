<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Boq - </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('public/dist/css/_app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{ url('index') }}" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('public/dist/images/logo.svg')}}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-white/[0.08] py-5 hidden">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="{{ url("index") }}" class="-intro-x hidden md:flex">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('public/dist/images/logo.svg')}}">
                    <span class="text-white text-lg ml-3">Test</span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Project</a></li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{ asset('public/dist/images/profile-8.jpg')}}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">Nicolas Cage</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Software Engineer</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav">
            <ul>
                <li>
                    <a href="javascript:;.html" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="top-menu__title"> BOQ <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div class="wrapper wrapper--top-nav">
            <div class="wrapper-box">
                <!-- BEGIN: Content -->
                <div class="content">
                    <div class="intro-y flex sm:flex-row items-top mt-5">
                        <h2 class="text-lg font-medium mr-auto">
                            <b>Edit BOQ of {{ $project_id->project->brand_master->brand_name }} at {{ $project_id->project->location_master->location_name }}
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
                            {{-- <form action="{{ url('/formBoq/update') }}" method="post" id="form1" enctype="multipart/form-data">
                                @csrf --}}
                                <div class="form-inline mb-3 mt-10">
                                    <label for="horizontal-form-1" class="form-label ml-4">Vender : </label>
                                    <input type="text" value="{{ $project_id->vender_name->name }}" disabled>
                                </div>
                                <div id="addmain" class="input-form mt-3">
                                    @foreach ($catagories as $key => $cat)
                                    <input type="hidden" value="{{ $id }}" name="id">
                                    <input type="text" class="w-full" value="{{$key + 1}}. {{$cat->name}}" style="background-color: rgb(153, 187, 238);" readonly >
                                    <input type="hidden" name="main_id[]" value="{{$cat->id}}" >
                                    <div class="intro-y input-form mt-3 ml-2">
                                        <div class="input-form">
                                            @foreach ( $editboq as $eb )
                                            {{-- {{ $eb->main_id }} --}}
                                            @if ( $eb->main_id == $cat->id)
                                                <input type="hidden" value="{{ $eb->id }}" name="boq_id">
                                                <input type="hidden" value="{{ $project_id->project_id }}" name="project_id">
                                                <div id="addsub" class="flex flex-row gap-2 mb-2">
                                                    <input type="text" class="w-32" value="{{ $eb->sub_cata->code }}" disabled>
                                                    {{-- <select id="code_id{{$cat->id}}" name="code_id[][{{$cat->id}}]" class="tom-select-code-{{$key + 1}} tom-select w-32" placeholder="Code...">
                                                        <option selected value="{{ $eb->sub_id }}">{{ $eb->sub_cata->code }}</option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->code}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" class="w-full" value="{{ $eb->sub_cata->name }}" disabled>
                                                    {{-- <select id="" name="sub_id[][{{ $cat->id }}]" class="tom-select w-full" placeholder="Please Select...">
                                                        <option selected value="{{ $eb->sub_id }}">{{ $eb->sub_cata->name }}</option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" placeholder="จำนวน" value="{{ $eb->amount }}" disabled>
                                                    <input type="text" class="w-24" value="{{ $eb->unit_u->unit_name }}" disabled>
                                                    {{-- <select name="unit_id[][{{ $cat->id }}]" class="form-control w-24">
                                                        <option selected value="{{ $eb->unit_id }}">{{ $eb->unit_u->unit_name }}</option>
                                                        @foreach ($catagories2 as $cat2)
                                                        <option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" value="{{ $eb->desc }}" disabled>
                                                    @php
                                                    $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                                                    ->where('name', "Master BOQ")
                                                    ->first();
                                                    @endphp
                                                    @if ( $data_chk )
                                                    <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->wage_cost }}" disabled>
                                                    <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" value="{{ $eb->material_cost }}" disabled>
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
                                                    <input type="text" class="w-32" value="" disabled>
                                                    {{-- <select id="code_id{{$cat->id}}" name="code_id[][{{$cat->id}}]" class="tom-select-code-{{$key + 1}} tom-select w-32" placeholder="Code...">
                                                        <option selected value=""></option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->code}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" class="w-full" value="" disabled>
                                                    {{-- <select id="sub1" name="sub_id[][{{ $cat->id }}]" class="tom-select w-full">
                                                        <option selected value=""></option>
                                                        @foreach ($cat->catagory_sub as $cat_s)
                                                        <option value="{{$cat_s->id}}">{{$cat_s->name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="number" name="amount[][{{ $cat->id }}]" class="form-control w-24" disabled>
                                                    <input type="text" class="w-24" value="" disabled>
                                                    {{-- <select name="unit_id[][{{ $cat->id }}]" class="form-control w-24">
                                                        <option selected value=""></option>
                                                        @foreach ($catagories2 as $cat2)
                                                        <option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>
                                                        @endforeach
                                                    </select> --}}
                                                    <input type="text" name="desc[][{{ $cat->id }}]" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full" disabled>
                                                    @php
                                                    $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                                                    ->where('name', "Master BOQ")
                                                    ->first();
                                                    @endphp
                                                    @if ( $data_chk )
                                                    <input type="number" name="material_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าวัสดุ" disabled>
                                                    <input type="number" name="wage_cost[][{{ $cat->id }}]" class="form-control w-24" placeholder="ค่าแรง" disabled>
                                                    @endif
                                                </div>
                                            @endif
                                            <div id="newRowsub{{$key + 1}}"></div>
                                            <input type="hidden" id="number_s" rel="{{$key + 1}}">
                                        </div>
                                    </div>
                                    {{-- <div class="grid grid-cols-3 mb-3">
                                        <div class="col-span-2">
                                            <input type="button" value="ลบงานย่อยที่เลือก" class="btn btn-secondary" id="checkDel" />
                                        </div>
                                        <div class="flex justify-end gap-2">
                                            <input type="button" value="เพิ่มงานย่อย" class="btn btn-primary" id="btnAddsub{{$key + 1}}" rel="{{$key + 1}}" />
                                        </div>
                                    </div> --}}
                                    @endforeach
                                    @php
                                        $data_chk = App\Models\template_boqs::where('project_id', $project_id->project_id)
                                        ->where('name', "Master BOQ")
                                        ->first();
                                        // dd($data_chk);
                                        @endphp
                                        @if ($data_chk)
                                            @if ($data_chk->status == "2" )
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
                                        @endif
                                </div>
                                {{-- <input type="hidden" id="is_btn" name="btn_send">
                                <input type="submit" value="Save Draft" class="btn btn-primary mr-1">
                                <input type="button" id="btn_send1" value="Save & Send" class="btn btn-primary mr-1" data-tw-toggle="modal" data-tw-target="#delete-modal-preview"> --}}
                                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Back</a>
                            {{-- </form> --}}
                        </div>
                    <!-- END: Validation Form -->
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: Modal Content -->
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
        <!-- END: Modal Content -->
        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('public/dist/js/app.js')}}"></script>
        <script src="{{ asset('public/tom-select/dist/js/tom-select.complete.js')}}"></script>
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


            // btn add subwork
            jQuery(document).ready(function()
            {
                var x = 1;
                jQuery.ajax({
                url: "/addformBoq/select-catagory",
                type: "GET",
                datatype: "JSON",
                success: function(response) {
                    // console.log(response);

                    jQuery.each(response.data, function(key, value){
                        // console.log(response);
                        var sub_num = key + 1;

                        // $('#code_id'+sub_num).on('change', function(){
                        //     console.log($(this).val());
                        //     // $('.sub_selected'+sub_num).append('<option selected value="1">EEEEE</option>');
                        //     // $('.sub_selected'+sub_num).val("rrrrr");
                        //     // new TomSelect(".sub_id"+sub_num);
                        // });

                        // new TomSelect(".tom-select-code-"+sub_num);
                        // new TomSelect(".tom-select-sub-"+sub_num);

                        $("#btnAddsub" + sub_num).on('click', function(){
                            var html = '';
                            html += '<div id="addsub" class="flex flex-row gap-2 mb-2">';
                            html += '<input id="checkbox-switch-1" class="form-check-input" type="checkbox" name="test">';
                            html += '<select name="code_id[]['+sub_num+']" class="sub_select2-'+x+' tom-select w-32" placeholder="Code...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value3){
                                if(value3.catagory_id == value.id){
                                    html += '<option value="'+value3.id+'">'+value3.code+'</option>';
                                }
                            });

                            html += '</select>';
                            html += '<select  name="sub_id[]['+sub_num+']" class="sub_select-'+x+' tom-select w-full" placeholder="Please Select...">';
                            html += '<option selected value=""></option>';
                            jQuery.each(response.dataSub, function(key, value2){
                                if(value2.catagory_id == value.id){
                                    html += '<option value="'+value2.id+'">'+value2.name+'</option>';
                                }
                            });
                            html += '</select>';
                            html += '<input type="number" name="amount[]['+sub_num+']" class="form-control w-24" placeholder="จำนวน" >';
                            html += '<select name="unit_id[]['+sub_num+']" class="form-control w-24">';
                            html += '<option selected value=""></option>@foreach ($catagories2 as $cat2)<option value="{{$cat2->id}}">{{$cat2->unit_name}}</option>@endforeach</select>';
                            html += '<input type="text" name="desc[]['+sub_num+']" placeholder="หมายเหตุ" aria-label="default input inline 2" class="w-full">';
                            html += '<input type="button" value="ลบ" class="btn btn-secondary" id="delSubBtn">';
                            html += '</div>';

                            console.log(sub_num);
                        $("#newRowsub" + sub_num).append(html);

                        // Tom select

                        new TomSelect(".sub_select2-"+x);
                        new TomSelect(".sub_select-"+x);
                        x++;

                         });
                    });
                }
                });
            });


        </script>
        <!-- END: JS Assets-->
    </body>
</html>
