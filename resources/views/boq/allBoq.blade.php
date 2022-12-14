@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                <ol class="breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index') }}">Project</a></li>
                    <li class="breadcrumb-item active"><a></a>{{ $project->brand_master->brand_name }} at
                        {{ $project->location_master->location_name }}</li>
                </ol>
            </nav>
        </h2>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5 comment">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <div class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <a class="btn btn-instagram mr-2" href="{{ url('/editprojectBoq', $project->id) }}">
                        <i data-lucide="settings" class="w-4 h-4 mr-2"></i>Edit Project</a>
                </div>
            </div>
            <div class="sm:flex items-center mt-2 xl:mt-0">
                @php
                    $data_chk = App\Models\template_boqs::where('project_id', $project->id)
                        ->where('name', 'Master BOQ')
                        ->first();
                @endphp
                @if ($data_chk)
                    @if ($data_chk->status == '2')
                        <a href="{{ url('/createformBoq', $project->id) }}" class="btn btn-primary mr-2">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>New BOQ</a>
                    @else
                        <a href="#" class="btn btn-secondary mr-2">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>NewBOQ</a>
                    @endif
                @else
                    <a href="{{ url('/createformBoq', $project->id) }}" class="btn btn-primary mr-2">
                        <i data-lucide="plus"class="w-4 h-4 mr-2"></i>New BOQ</a>
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
                        <th class="text-center whitespace-nowrap">Vendor</th>
                        <th class="text-center whitespace-nowrap">Budget</th>
                        <th class="text-center whitespace-nowrap">Remark</th>
                        <th class="text-center whitespace-nowrap"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $temp_boq as $tb )
                    {{-- @foreach ( $imp_boq as $imp ) --}}
                    {{-- @if ( $imp->template_id == $tb->id ) --}}
                    <input type="hidden" id="show_remark" value="{{$tb->remark}}">
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
                            <div class="flex items-center justify-center">{{ Carbon\Carbon::parse($tb->date)->format('d-m-Y') }}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex items-center justify-center">
                                @if ($tb->status == '0')
                                    Drafted
                                @elseif ($tb->status == '1')
                                    Waiting Approval
                                @elseif ($tb->status == '2')
                                    Approval
                                @elseif ($tb->status == '3')
                                    Reject
                                @elseif ($tb->status == '4')
                                    Rework
                                @endif
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex items-center justify-center">
                                {{ @$tb->vender_name->name }}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex items-center justify-center">
                                {{number_format($tb->budget, 2)}}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex items-center justify-center">
                                {{$tb->remark}}
                            </div>
                        </td>
                        <td class="table-report__action">
                            <div class="btn-group text-center flex justify-center">
                                <a href="{{ url('/viewBoq', $tb->id) }}"
                                    class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i
                                        data-lucide="eye" class="w-4 h-4"></i></a>
                                {{-- remark --}}
                                <button data-tw-toggle="modal" value="{{$tb->id}}" onclick="showremark({{$tb->id}})" data-tw-target="#remark-modal-size-import" class="btn btn-outline-secondary w-full sm:w-auto mr-2 id_template" aria-expanded="false"> <i
                                    data-lucide="pen-tool" class="w-4 h-4" ></i></button>
                                @if ($tb->status == '1' || $tb->status == '2' || $tb->status == '3')
                                    <button class="btn btn-outline-secondary w-full sm:w-auto mr-2" disabled><i
                                            data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </button>
                                @else
                                    <a href="{{ url('/editFormBoq/edit', $tb->id) }}"
                                        class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
                                        <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                                @endif

                                @if ($tb->name == 'Master BOQ')
                                    @if ($tb->status == '1' || $tb->status == '2' || $tb->status == '3')
                                        <button type="button" id="change_status_boq" value="{{ $tb->id }}"
                                            class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                            aria-expanded="false" data-tw-toggle="modal"
                                            data-tw-target="#send-modal-preview" disabled>
                                            <i data-lucide="send" class="w-4 h-4 mr-2"></i> Send </button>
                                    @else
                                        <button type="button" id="change_status_boq" value="{{ $tb->id }}"
                                            class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                            aria-expanded="false" data-tw-toggle="modal"
                                            data-tw-target="#send-modal-preview">
                                            <i data-lucide="send" class="w-4 h-4 mr-2"></i> Send </button>
                                    @endif
                                @endif

                                @if ($tb->name != 'Master BOQ')
                                <button type="button" id="change_status_boq" value="{{ $tb->id }}"
                                    class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                    aria-expanded="false" data-tw-toggle="modal"
                                    data-tw-target="#vendor-modal-preview">
                                    <i data-lucide="user" class="w-4 h-4 mr-2"></i> Vendor </button>
                                @endif

                                @if ($tb->status == '3')
                                    <button class="btn btn-outline-secondary w-full sm:w-auto mr-2"
                                        aria-expanded="false"> <i data-lucide="corner-right-up"
                                            class="w-4 h-4 mr-2"></i> Export </button>
                                @elseif ($tb->name == "Master BOQ" && $tb->status != "2")
                                    <a href="{{ url('projects/export', $tb->id) }}"
                                        class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
                                    <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export</a>
                                @elseif ($tb->name == "Additional BOQ" && $tb->status != "2")
                                    <a href="{{ url('projects/export', $tb->id) }}"
                                        class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
                                    <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export</a>
                                @else
                                <a href="{{ url('projects/export_no', $tb->id) }}"
                                    class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
                                <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    {{-- @endif --}}
                    {{-- @endforeach --}}
                    @endforeach
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="table-report__action w-56">
                        <div class="flex items-center justify-center">
                            Total
                        </div>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex items-center justify-center">
                            {{number_format($temp_boq->sum('budget'), 2)}}
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tbody>
            </table>
        </div>
        <!-- BEGIN: Large Modal Content -->
        <div id="remark-modal-size-import" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Remark</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->

                    <form action="{{ route('add_cm') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="temp_remark_id" id="temp_remark_id">
                        {{-- <label for="horizontal-form-1" class="form-label ml-4 mt-3"><b> Vendor </b> : </label> --}}
                        <div class="ml-4 mr-4 mt-4 mb-4">
                            <input type="text" class="w-full" name="remark" id="remark">
                        </div>
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1">??????????????????</button>
                            <button type="submit" class="btn btn-primary w-20">??????????????????</button>
                        </div>
                        <!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Large Modal Content -->

        <!-- BEGIN: Large Modal Content -->
        <div id="large-modal-size-import" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Import Boq Form Vendor</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form action="{{ url('/import-boqvender') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $project->id }}">
                        <label for="horizontal-form-1" class="form-label ml-4 mt-3"><b> Vendor </b><span style="color: red">*</span> : </label>
                        <div class="ml-4">
                        <select id="id_vender" name="id_vender" class="tom-select w-72" placeholder="Select Vender..." required>
                            <option selected value=""></option>
                            @foreach ( $vend_imp as $vd )
                            <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                            @endforeach
                        </select>
                        <span class="mt-2" style="color:red;">** ?????????????????????????????? Vendor </span>
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                            <div class="col-span-12 sm:col-span-4 input-form mt-3">
                                <input name="file" type="file" class="form-control" required/>
                            </div>
                        </div>
                        </div>
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1">??????????????????</button>
                            <button type="submit" class="btn btn-primary w-20">??????????????????</button>
                        </div> <!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Large Modal Content -->

        <!-- BEGIN: Modal Content -->
        <div id="send-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('/change_status_boq') }}" method="post">
                            @csrf
                            <div class="p-5 text-center">
                                <i data-lucide="send" class="w-16 h-16 text-warning mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Send to Manager</div>
                                <div class="text-slate-500 mt-2">!! ???????????????????????????????????????????????????????????????????????????????????????????????? !!<br>????????? BOQ ????????? Approve ?????????????????????????????????????????????????????????????????????</div>
                            </div>
                            <input type="hidden" id="boq_id" name="boq_id">
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="submit" name="send" class="btn btn-primary w-28" onclick="myFunction()">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
        <!-- BEGIN: Modal Content vendor-->
        <div id="vendor-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <form action="{{ url('/select-boqvender') }}" method="post">
                            @csrf
                            <div class="p-5 text-center">
                                <div class="text-3xl mt-5">Select Vendor</div>
                                <div class="text-slate-500 mt-2">
                                    <select id="id_vender" name="id_vender" class="tom-select w-full" placeholder="Select Vender...">
                                        <option selected value=""></option>
                                        @foreach ( $vend_imp as $vd )
                                        <option value="{{ $vd->id }}">{{ $vd->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="boq_id" name="boq_id">
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                <button type="submit" name="send" class="btn btn-primary w-28">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Modal Content -->
    </div>
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <div class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0 ml-5">
                   <b class="text-lg">BOQ from Vendor</b>
                </div>
            </div>
            <div class="sm:flex items-center mt-2 xl:mt-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-import"
                class="btn btn-success mr-1 mb-2 text-white">
                <i data-lucide="database"class="w-4 h-4 mr-2"></i>Import BOQ from Vendor</a>
            </div>
        </div>
        <!--Import boq Vendor-->
        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
            <table class="table table-hover table-auto sm:mt-2">
                <thead class="table-light">
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">ID_BOQ</th>
                        <th class="whitespace-nowrap">Vendor</th>
                        <th class="text-center whitespace-nowrap">Date</th>
                        <th class="text-center whitespace-nowrap"></th>
                        <th class="text-center whitespace-nowrap">Budget</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $imp_boq as $key => $ib )
                    @if ( @$ib->template_d == "" || @$ib->template_d->name == "Master BOQ" )
                    <tr class="intro-x">
                        <td class="w-40 table-report__action">
                            <div class="flex">
                                <h3>{{ $key + 1 }}</h3>
                            </div>
                        </td>
                        <td>
                            <a class="font-medium whitespace-nowrap">{{ @$ib->template_d->number_id }}
                            @if( @$ib->template_d->name == "Master BOQ" )
                                (M)
                            @elseif (@$ib->template_d->name == "Additional BOQ")
                                (A)
                            @endif
                            </a>
                        </td>
                        <td>
                            <a class="font-medium whitespace-nowrap">{{ @$ib->vender_name->name }}</a>
                        </td>
                        <td class="table-report__action w">
                            <div class="flex items-center justify-center">{{ Carbon\Carbon::parse(@$ib->created_at)->format('d-m-Y') }}</div>
                        </td>
                        <td class="table-report__action">
                            <div class="btn-group text-center flex justify-center">
                                {{-- <a href="" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i data-lucide="eye" class="w-4 h-4"></i></a> --}}
                                <div class="dropdown">
                                    <button class="dropdown-toggle btn btn-secondary w-full sm:w-auto mr-2" aria-expanded="false" data-tw-toggle="dropdown">Select BOQ</button>
                                    {{-- <input type="text" value="{{ $ib->id }}"> --}}
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            @foreach ( $temp_boq as $key => $tbp )
                                            @if ($tbp->name == "Master BOQ")
                                            <li>
                                                <a href="{{ url('/select-to-auc', [$ib->id, $tbp->id] ) }}" class="dropdown-item">{{ $tbp->number_id }}
                                                @if( $tbp->name == "Master BOQ" )
                                                    (M)
                                                @else
                                                    (A)
                                                @endif
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{ url('/export-vender', $ib->id) }}" class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false">
                                <i data-lucide="corner-right-up" class="w-4 h-4 mr-2"></i> Export</a>
                            </div>
                        </td>
                        <td class="table-report__action">
                            <div class="btn-group text-center flex justify-center">
                                {{number_format($ib->budget, 2)}}
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Content -->

    <script type="text/javascript">
        jQuery(document).on('click', '#change_status_boq', function() {
            var boq_id = $(this).val();
            $('#boq_id').val(boq_id);
            jQuery('#send-modal-preview').show();
        });

        jQuery(".id_template").on("click", function(){
            $("#temp_remark_id").val($(this).val());

        });

        function showremark(id)
        {
            jQuery(document).ready(function() {

                jQuery.ajax({
                    type:   "GET",
                    url:    "{!! url('/show_remark/"+id+"') !!}",
                    datatype:   "JSON",
                    async:  false,
                    success: function(data) {
                        $('#remark').val(data.remarkShow.remark);
                    }
                });
            });
        }



        // $('.comment').on("click", function(){
        //     var remark = $('#remark').val();
        //     console.log(remark);
        //     jQuery.ajax({
        //         type: "POST",
        //         url: "{{ route('add_cm') }}",
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //         data: remark,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(response){
        //             // $('#temp_id').val(response.temp);
        //             console.log(response);
        //         }
        //     });
        // });

    </script>
@endsection
