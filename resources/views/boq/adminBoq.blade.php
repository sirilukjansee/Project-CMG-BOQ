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
        <title>All project boq - </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{ url('index') }}" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
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
                    <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                    <span class="text-white text-lg ml-3">Test</span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="{{ url('index') }}">Project</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="dist/images/profile-8.jpg">
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
                                <a href="{{ url('index') }}" class="dropdown-item hover:bg-white/5"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
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
                        <div class="top-menu__icon"> <i data-lucide="lock"></i> </div>
                        <div class="top-menu__title"> Dashborad <i data-lucide="chevron-down" class="top-menu__sub-icon"></i> </div>
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
                            Dasboard
                        </h2>
                        <!---->
                        <!--dropzone-->
                        {{-- <div class="flex flex-col sm:items-end mt-2"> --}}
                            <!-- BEGIN: Large Modal Toggle -->
                                <!--<a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview" class="btn btn-primary mr-1 mb-2">Import Master</a>-->
                            <!-- END: Large Modal Toggle -->
                        {{-- </div> --}}
                        <!-- BEGIN: Large Modal Content -->
                        {{-- <div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
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
                        </div> --}}
                        <!-- END: Large Modal Content -->
                        <!--dropzone-->
                    </div>
                    <!-- BEGIN: HTML Table Data -->
                    <div class="intro-y box p-5 mt-5">
                        <!--User-->
                        <div class="intro-y flex flex-col sm:flex-row items-center mt-3 mb-3">
                            <div class="text-lg font-medium mr-auto">
                                <b>All User</b>
                            </div>
                            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                <a href="{{ url("addUser") }}" class="btn btn-primary shadow-md mr-2"><i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add User </a>
                            </div>
                        </div>

                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="display">
                                <thead class="table-light">
                                    <tr>
                                        <th class="whitespace-nowrap">ID</th>
                                        <th class="text-center whitespace-nowrap">Username</th>
                                        <th class="text-center whitespace-nowrap">Password</th>
                                        <th class="text-center whitespace-nowrap">Role_ID</th>
                                        <th class="text-center whitespace-nowrap"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex item-center justify-center">
                                                <p>1</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>admin</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>admin</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>1</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ url('addUser') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex item-center justify-center">
                                                <p>2</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>creator</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>creator</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>2</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ url('addUser') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex item-center justify-center">
                                                <p>3</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>user</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>user</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>3</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="{{ url('addUser') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-3">
                        <!--User-->

                        <!--Project-->
                        <div class="intro-y flex flex-col sm:flex-row items-center mt-3 mb-3">
                            <div class="text-lg font-medium mr-auto">
                                <b> All Project </b>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="display" id="myTb">
                                <thead class="table-light">
                                    <tr>
                                        <th class="whitespace-nowrap">ID</th>
                                        <th class="whitespace-nowrap">Brand</th>
                                        <th class="text-center whitespace-nowrap">Location</th>
                                        <th class="text-center whitespace-nowrap">Area</th>
                                        <th class="text-center whitespace-nowrap">Task</th>
                                        <th class="text-center whitespace-nowrap">IO</th>
                                        <th class="text-center whitespace-nowrap">Designer</th>
                                        <th class="text-center whitespace-nowrap"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex">
                                                <p>AA00000</p>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="font-medium whitespace-nowrap">flipflop</a>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Central Pinklao</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>109 ตร.ม</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Store</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>1234-5678</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Somchai Jaided</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                <a href="{{ url('addprojectBoq') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex">
                                                <p>AA00000</p>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="font-medium whitespace-nowrap">flipflop</a>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Central Pinklao</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>109 ตร.ม</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Store</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>1234-5678</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Somchai Jaided</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                <a href="{{ url('addprojectBoq') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40 text-center table-report__action">
                                            <div class="flex">
                                                <p>AA00000</p>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="font-medium whitespace-nowrap">flipflop</a>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Central Pinklao</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>109 ตร.ม</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Store</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>1234-5678</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex item-center justify-center">
                                                <p>Somchai Jaided</p>
                                            </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex items-center justify-center">
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                <a href="{{ url('addprojectBoq') }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mt-3">
                        <!--Project-->

                        <!--BOQ-->
                        <div class="intro-y flex flex-col sm:flex-row items-center mt-3 mb-3">
                            <div class="text-lg font-medium mr-auto">
                                <b> All BOQ </b>
                            </div>
                        </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="display">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="whitespace-nowrap">ID</th>
                                            <th class="whitespace-nowrap">Brand</th>
                                            <th class="whitespace-nowrap">BOQ_name</th>
                                            <th class="whitespace-nowrap">Location</th>
                                            <th class="text-center whitespace-nowrap">Status</th>
                                            <th class="text-center whitespace-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="intro-x">
                                            <td class="w-40 text-center table-report__action">
                                                <div class="flex">
                                                    <h3>AA00000</h3>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="font-medium whitespace-nowrap"> flipflop </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Master BOQ </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Central Pinklao </a>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="flex items-center justify-center"> Approved </div>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="btn-group text-center flex justify-center">
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td class="w-40 text-center table-report__action">
                                                <div class="flex">
                                                    <h3>AA00000</h3>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="font-medium whitespace-nowrap"> Levi's </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Master BOQ </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Central Pinklao </a>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="flex items-center justify-center"> Approved </div>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="btn-group text-center flex justify-center">
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Edit </a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="mt-3">
                            <!--BOQ-->
                            {{-- BOQ from Vender --}}
                        <div class="intro-y flex flex-col sm:flex-row items-center mt-3 mb-3">
                            <div class="text-lg font-medium mr-auto">
                                <b> BOQ from Vender </b>
                            </div>
                        </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="display">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="whitespace-nowrap">ID</th>
                                            <th class="whitespace-nowrap">Brand</th>
                                            <th class="whitespace-nowrap">BOQ_name</th>
                                            <th class="whitespace-nowrap">Location</th>
                                            <th class="text-center whitespace-nowrap">Status</th>
                                            <th class="text-center whitespace-nowrap">Vender</th>
                                            <th class="text-center whitespace-nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="intro-x">
                                            <td class="w-40 text-center table-report__action">
                                                <div class="flex">
                                                    <h3>AA00000</h3>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="font-medium whitespace-nowrap"> flipflop </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Master BOQ </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Central Pinklao </a>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="flex items-center justify-center"> Approved </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex items-center justify-center"> Vender A </div>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="btn-group text-center flex justify-center">
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td class="w-40 text-center table-report__action">
                                                <div class="flex">
                                                    <h3>AA00000</h3>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="font-medium whitespace-nowrap"> levi's </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Master BOQ </a>
                                            </td>
                                            <td>
                                                <a class="flex items-center justify-center font-medium whitespace-nowrap"> Central Pinklao </a>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="flex items-center justify-center"> Approved </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex items-center justify-center"> Vender B </div>
                                            </td>
                                            <td class="table-report__action">
                                                <div class="btn-group text-center flex justify-center">
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a>
                                                    <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="x" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- BOQ from Vender --}}
                    </div>



                </div>

                    <!-- END: HTML Table Data -->
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- END: Content -->

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <script>
            jQuery(document).ready(function () {
                jQuery('table.display').DataTable();
            });
        </script>
        <!-- END: JS Assets-->
    </body>
</html>
