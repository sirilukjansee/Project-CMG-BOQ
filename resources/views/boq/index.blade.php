<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>All project boq - </title>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
        <!-- BEGIN: DataTables -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/DataTables/jquery.dataTables.min.css') }}" />
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script src="{{ asset('public/DataTables/jquery.dataTables.min.js') }}"></script>
        <!-- END: DataTables -->
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('public/dist/css/app.css') }}">
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{ url('index') }}" class="flex mr-auto">
                    <span class="text-white text-lg ml-3"><i data-lucide="box"></i></span>
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
                <a href="{{ url('index') }}" class="-intro-x hidden md:flex">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="public/dist/images/logo.svg">
                    <span class="text-white text-lg ml-3">Test</span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="public/dist/images/profile-8.jpg">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">Nicolas Cage</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a href="{{ url('adminBoq') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
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
                {{-- <li>
                    <a href="{{ url('adminBoq')}}" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="lock"></i> </div>
                        <div class="top-menu__title"> Dashboard <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ url('index')}}" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="top-menu__title"> Project <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('checkBoq')}}" class="top-menu">
                        <div class="top-menu__icon"> <i data-lucide="user-check"></i> </div>
                        <div class="top-menu__title"> Manager <i data-lucide="chevron-down" class="top-menu__sub-icon"></i></div>
                    </a>
                </li>
                <li>
                    <a href="#" class="top-menu top-menu--active">
                        <div class="top-menu__icon"> <i data-lucide="clipboard"></i> </div>
                        <div class="top-menu__title"> Master <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ url('/masterBrand') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Brand </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterLocation') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Location </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('masterBoq') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master BOQ</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterDesignPM') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Designer/PM </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterVender') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Vender </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterTaskName') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Task Name </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterTaskType') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Task Type </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterUnit') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master Unit </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/masterTOR') }}" class="top-menu">
                                <div class="top-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="top-menu__title"> Master TOR </div>
                            </a>
                        </li>
                    </ul>
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
                            Project
                        </h2>
                        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                            <a href="{{ url('addprojectBoq') }}" class="btn btn-primary shadow-md mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Project </a>
                        </div>
                    </div>
                    <!-- BEGIN: HTML Table Data -->
                    <div class="intro-y box p-5 mt-5">
                        @if (session("success"))
                        <div class="alert alert-primary-soft show flex items-center mb-2" role="alert">
                             {{ session('success') }}
                            <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                        @endif
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-hover table-auto sm:mt-2 allWork" id="emp-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Area/Sq.m</th>
                                        <th scope="col">Task Type</th>
                                        <th scope="col">Task Name</th>
                                        <th scope="col">Open date</th>
                                        <th scope="col">Designer</th>
                                        <th scope="col">Status</th>
                                        <th class="text-center" scope="col">IO</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="filterhead">#</th>
                                        <th scope="col" class="filterhead">ID</th>
                                        <th scope="col" class="filterhead">Brand</th>
                                        <th scope="col" class="filterhead">Location</th>
                                        <th scope="col" class="filterhead">Area/Sq.m</th>
                                        <th scope="col" class="filterhead">Task Type</th>
                                        <th scope="col" class="filterhead">Task Name</th>
                                        <th scope="col" class="filterhead">Open date</th>
                                        <th scope="col" class="filterhead">Designer</th>
                                        <th scope="col" class="filterhead">Status</th>
                                        <th class="text-center filterhead" scope="col">IO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project as $key => $pro)
                                    <tr data-href="{{ url('allBoq', $pro->id) }}" class="intro-x cursor-pointer">
                                        <td class="text-center table-report__action">{{ $key + 1 }}</td>
                                        <td class="w-40 text-center table-report__action"><h3>{{ $pro->number_id }}</td>
                                        <td class="table-report__action w-56">{{ $pro->brand_master->brand_name }}</td>
                                        <td class="table-report__action w-56">{{ $pro->location_master->location_name }}</td>
                                        <td class="text-center table-report__action w-56">{{ $pro->area }}</td>
                                        <td class="text-center table-report__action w-56">{{ $pro->task_type_master->task_type_name }}</td>
                                        <td class="text-center table-report__action w-56">{{ $pro->task_name_master->task_name }}</td>
                                        <td class="text-center table-report__action w-56">{{ Carbon\Carbon::parse($pro->open_date)->format('d M y') }}</td>
                                        <td class="text-center table-report__action w-56">{{ $pro->designer_master->name }}</td>
                                        <td class="text-center table-report__action w-56">
                                                @if ( @$pro->project_id1->name == "Master BOQ" )
                                                    @if ($pro->project_id1->status == "0")
                                                    Drafted
                                                    @elseif ($pro->project_id1->status == "1")
                                                    Waiting Approval
                                                    @elseif ($pro->project_id1->status == "2")
                                                    Approval
                                                    @elseif ($pro->project_id1->status == "3")
                                                    Reject
                                                    @elseif ($pro->project_id1->status == "4")
                                                    Rework
                                                    @endif
                                                @endif
                                        </td>
                                        <td class="text-center table-report__action w-56">{{ $pro->io }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END: HTML Table Data -->
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- END: Content -->

        <!-- BEGIN: JS Assets-->
        <script src="public/dist/js/app.js"></script>
        <script>
            //data table
            jQuery(document).ready(function() {
            var table = jQuery('.allWork').DataTable({
                "bLengthChange": true,
                "iDisplayLength": 10,
                "ordering": false,
            });

            jQuery(".filterhead").each( function ( i ) {
                var select = jQuery('<select class="form-control-sm w-full"><option value="">All</option></select>')
                    .appendTo( jQuery(this).empty() )
                    .on( 'change', function () {
                    var term = $(this).val();
                        table.column( i ).search(term, false, false ).draw();
                    } );
                table.column( i ).data().unique().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
                } );
            });

            //row button
            document.addEventListener("DOMContentLoaded", () => {
                const rows = document.querySelectorAll("tr[data-href]");

                rows.forEach(row => {
                    row.addEventListener("click", () => {
                        window.location.href = row.dataset.href;
                    });
                });
            });
        </script>
        <!-- END: JS Assets-->
    </body>
</html>
