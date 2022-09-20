<!DOCTYPE html>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('public/dist/css/app.css') }}" />
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
                        <li class="breadcrumb-item active" aria-current="page">allBoq</li>
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
                    <a href="{{ url('index')}}" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="top-menu__title"> Project <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;.html" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
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
                    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                        <h2 class="text-lg font-medium mr-auto">
                            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                                <ol class="breadcrumb breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('index') }}">Project</a></li>
                                    <li class="breadcrumb-item active"><a></a>{{ $project->brand_master->brand_name }} at {{ $project->location_master->location_name }}</li>
                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <!-- BEGIN: HTML Table Data -->
                    <div class="intro-y box p-5 mt-5">
                        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                </div>
                            </form>
                            <div class="sm:flex items-center mt-2 xl:mt-0">
                                @php
                                    $data_chk = App\Models\template_boqs::where('project_id', $project->id)
                                    ->where('name', "Master BOQ")
                                    ->first();
                                @endphp
                                @if ( $data_chk )
                                    @if ( $data_chk->status == "2" )
                                        <a href="{{ url('/createformBoq', $project->id) }}" class="btn btn-primary mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>New BOQ</a>
                                        @else
                                        <a href="#" class="btn btn-secondary mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>New BOQ</a>
                                    @endif
                                    @else
                                    <a href="{{ url('/createformBoq', $project->id) }}" class="btn btn-primary mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i>New BOQ</a>
                                @endif
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-hover table-auto sm:mt-2">
                                <thead class="table-light">
                                    <tr>
                                        <th class="whitespace-nowrap">ID</th>
                                        <th class="whitespace-nowrap">BOQ_name</th>
                                        <th class="text-center whitespace-nowrap">Date</th>
                                        <th class="text-center whitespace-nowrap">Status</th>
                                        <th class="text-center whitespace-nowrap"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temp_boq as $tb)
                                    <tr class="intro-x">
                                        <td class="w-40 table-report__action">
                                            <div class="flex">
                                                <h3>{{ $tb->number_id }}</h3>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="font-medium whitespace-nowrap">{{ $tb->name }}</a>
                                        </td>
                                        <td class="table-report__action w">
                                            <div class="flex items-center justify-center">{{ $tb->date }}</div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                @if ($tb->status == "0")
                                                    Drafted
                                                    @elseif ($tb->status == "1")
                                                    Waiting Approval
                                                    @elseif ($tb->status == "2")
                                                    Approval
                                                    @elseif ($tb->status == "3")
                                                    Reject
                                                    @elseif ($tb->status == "4")
                                                    Rework
                                                @endif
                                            </div>
                                        </td>
                                        <td class="table-report__action">
                                            <div class="btn-group text-center flex justify-center">
                                                <a href="{{ url('/viewBoq', $tb->id) }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>

                                                @if ( $tb->status == "1" || $tb->status == "2" || $tb->status == "3" )
                                                    <button class="btn btn-outline-secondary w-full sm:w-auto mr-2" disabled><i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </button>
                                                    @else
                                                    <a href="{{ url('/editFormBoq/edit', $tb->id) }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                                        aria-expanded="false"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                                @endif

                                                @if ( $tb->name  == "Master BOQ" )
                                                    @if ( $tb->status == "1" || $tb->status == "2" || $tb->status == "3" )
                                                    <button type="button" id="change_status_boq" value="{{ $tb->id }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                                        aria-expanded="false" data-tw-toggle="modal" data-tw-target="#send-modal-preview" disabled>
                                                        <i data-lucide="send" class="w-4 h-4 mr-2"></i> Send </button>
                                                    @else
                                                    <button type="button" id="change_status_boq" value="{{ $tb->id }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                                        aria-expanded="false" data-tw-toggle="modal" data-tw-target="#send-modal-preview">
                                                        <i data-lucide="send" class="w-4 h-4 mr-2"></i> Send </button>
                                                    @endif
                                                @endif

                                                @if ( $tb->status == "3" )
                                                    <button class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export </button>
                                                    @else
                                                    <a href="{{ url('projects/export', $tb->id ) }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export</a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--dropzone-->
                        <div class="sm:flex flex-col sm:items-end mt-2">
                        <!-- BEGIN: Large Modal Toggle -->
                                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview" class="btn btn-primary mr-1 mb-2">Import BOQ from vender</a>
                            <!-- END: Large Modal Toggle -->
                        </div>
                        <!-- BEGIN: Large Modal Content -->
                        <div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <a data-tw-dismiss="modal" href="javascript:;">
                                        <i data-lucide="x" class="w-8 h-8 text-slate-400"></i>
                                    </a>
                                    <div class="modal-body p-10 text-center">
                                        <form data-file-types="image/jpeg|image/png|image/jpg" action="/file-upload" class="dropzone">
                                            <div class="fallback">
                                                <input name="file" type="file" />
                                            </div>
                                            <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                                <div class="text-slate-500">
                                                    This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded.
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: HTML Table Data -->
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: Modal Content -->
        <div id="send-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('/change_status_boq') }}" method="post">
                            @csrf
                            <div class="p-5 text-center">
                                <i data-lucide="send" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Send to Manager??</div>
                                <div class="text-slate-500 mt-2">?????????????? <br>???????????.</div>
                            </div>
                            <input type="hidden" id="boq_id" name="boq_id">
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="submit" name="send" class="btn btn-primary w-28">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
        <!-- END: Content -->

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('public/dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
        <script type="text/javascript">
            jQuery(document).on('click', '#change_status_boq', function()   {
                var boq_id = $(this).val();
                $('#boq_id').val(boq_id);
                jQuery('#send-modal-preview').show();
            });
        </script>
    </body>
</html>
