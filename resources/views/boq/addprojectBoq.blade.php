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
        <!-- BEGIN: CSS Assets-->
        {{-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/css/tom-select.css" rel="stylesheet"> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.min.js"></script> --}}
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
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Porject</a></li>
                        <li class="breadcrumb-item active" aria-current="page">addProject</li>
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
                        <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="top-menu__title"> Project <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
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
                    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto mb-2">
                            Create Project
                        </h2>
                    </div>
                    <!-- BEGIN: Validation Form -->
                    <div class="group_wrapper">
                        <form name="addProject" action="{{ url('/addprojectBoq/add') }}" method="post" id="formId">
                            @csrf
                            <div class="intro-y input-form box p-5">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="input-form mt-3">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                            Brand <span style="color: red">*</span>
                                        </label>
                                        {{-- <input id="validation-form-1" type="text" name="brand" class="form-control" required> --}}
                                        <select name="brand" id="validation-form-1"  data-placeholder="Select a brand..." class="tom-select form-control w-full">
                                            <option selected value=""></option>
                                            @foreach ($project1 as $pro1)
                                            @if (old('brand') == $pro1->id)
                                            <option value="{{$pro1->id}}" selected>{{$pro1->brand_name}}</option>
                                            @else
                                            <option value="{{$pro1->id}}">{{$pro1->brand_name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('brand')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="concept" class="form-label w-full flex flex-col sm:flex-row">
                                            Concept
                                        </label>
                                        <select id="concept" name="concept" data-placeholder="Select a Concept..."  autocomplete="off" class="tom-select form-control w-full">
                                            <option selected value=""></option>
                                            @foreach ($project6 as $pro6)
                                            @if (old('concept') == $pro6->id)
                                            <option value="{{$pro6->id}}" selected>{{$pro6->name}}</option>
                                            @else
                                            <option value="{{$pro6->id}}">{{$pro6->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row">
                                            Location <span style="color: red">*</span>
                                        </label>
                                        {{-- <input id="validation-form-2" type="text" name="location" class="form-control" required> --}}
                                        <select id="validation-form-2" name="location" data-placeholder="Select a location..."  autocomplete="off" class="tom-select form-control w-full">
                                            <option selected value=""></option>
                                            @foreach ($project2 as $pro2)
                                            @if (old('location') == $pro2->id)
                                            <option value="{{$pro2->id}}" selected>{{$pro2->location_name}}</option>
                                            @else
                                            <option value="{{$pro2->id}}">{{$pro2->location_name}}</option>
                                            @endif
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
                                            <input id="validation-form-3" type="number" name="area" step=".01" class="form-control" value="{{ old('area') }}">
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
                                            <input id="validation-form-4" type="text" name="io" maxlength="8" class="form-control" value="{{ old('io') }}">
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
                                                <option selected value=""></option>
                                                @foreach ($project3 as $pro3)
                                                @if (old('task') == $pro3->id)
                                                <option value="{{$pro3->id}}" selected>{{$pro3->task_type_name}}</option>
                                                @else
                                                <option value="{{$pro3->id}}">{{$pro3->task_type_name}}</option>
                                                @endif
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
                                                <option selected value=""></option>
                                                @foreach ($project4 as $pro4)
                                                @if (old('task_n') == $pro4->id)
                                                <option value="{{$pro4->id}}" selected>{{$pro4->task_name}}</option>
                                                @else
                                                <option value="{{$pro4->id}}">{{$pro4->task_name}}</option>
                                                @endif
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
                                            <input id="validation-form-6" type="date" name="startDate" class="form-control" value="{{old('startDate')}}">
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
                                            <input id="validation-form-7" type="date" name="finishDate" class="form-control" value="{{old('finishDate')}}">
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
                                            <input id="validation-form-10" type="text" name="alldate" class="form-control" value="{{old('alldate')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-span-12 xl:col-span-2 mt-3">
                                        <div class="input-form mt-2 xl:mt-0">
                                            <label for="validation-form-11" class="form-label w-full sm:flex-row">
                                                Open Date <span style="color: red">*</span>
                                            </label>
                                            <input id="validation-form-11" type="date" name="openDate" class="form-control" value="{{old('openDate')}}">
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
                                        <select name="ds_name" id="validation-form-8" data-placeholder="Select a designer..."  autocomplete="off" class="tom-select form-control w-full">
                                            <option selected value=""></option>
                                            @foreach ($project5 as $pro5)
                                            @if (old('ds_name') == $pro5->id)
                                            <option value="{{$pro5->id}}" selected>{{$pro5->name}}</option>
                                            @else
                                            <option value="{{$pro5->id}}">{{$pro5->name}}</option>
                                            @endif
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
                    <!-- END: Validation Form -->
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="{{ asset('public/dist/js/app.js')}}"></script>
        <script type="text/javascript">

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
                                $('#comment').text("'" + id + "' ???????????????????????????????????????????????????????????????????????????????????????????????? !");
                            }
                        });
                        // console.log("Yay");
                    }
                }
            });
            });
        </script>
        <!-- END: JS Assets-->
    </body>
</html>
