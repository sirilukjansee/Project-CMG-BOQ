@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                        <ol class="breadcrumb breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('report-designer') }}">Designer/PM Report</a></li>
                            <li class="breadcrumb-item active"><a>{{$designers->name}} ({{ $monthy }})</a></li>
                        </ol>
                    </nav>
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0"></div>
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
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-hover table-auto sm:mt-2" id="example">
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
                        </thead>
                        <tbody>
                            @foreach ($projects as $key => $pro)
                            <tr>
                                {{-- @if (@$pro->project_id1->approve_at)
                            {{ Carbon\Carbon::parse(@$pro->project_id1->approve_at)->format('d M y') }}
                            @endif --}}
                            <td class="text-center table-report__action">{{ $key + 1 }}</td>
                            <td class="w-40 text-center table-report__action">
                                <h3>{{ @$pro->number_id }}</h3>
                            </td>
                            <td class="table-report__action w-56">{{ @$pro->brand_master->brand_name }}</td>
                            <td class="table-report__action w-56">{{ @$pro->location_master->location_name }}</td>
                            <td class="text-center table-report__action w-56">{{ @$pro->area }}</td>
                            <td class="text-center table-report__action w-56">{{ @$pro->task_type_master->task_type_name }}
                            </td>
                            <td class="text-center table-report__action w-56">{{ @$pro->task_name_master->task_name }}</td>
                            <td class="text-center table-report__action w-56">
                                {{ Carbon\Carbon::parse($pro->open_date)->format('d M y') }}</td>
                            <td class="text-center table-report__action w-56">{{ @$pro->designer_master->name }}</td>
                            <td class="text-center table-report__action w-56">
                                @if (@$pro->project_id1->name == 'Master BOQ')
                                    @if (@$pro->project_id1->status == '0')
                                        Drafted
                                    @elseif (@$pro->project_id1->status == '1')
                                        Waiting Approval
                                    @elseif (@$pro->project_id1->status == '2')
                                        Approval
                                    @elseif (@$pro->project_id1->status == '3')
                                        Reject
                                    @elseif (@$pro->project_id1->status == '4')
                                        Rework
                                    @endif
                                @endif
                            </td>
                            <td class="text-center table-report__action w-56">{{ $pro->io }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{-- <tr style="font-weight:bold;">
                                <td colspan="2" style="text-align: center;">Grand Total</td>
                                <td>{{$sumMonth1}}</td>
                                <td>{{$sumMonth2}}</td>
                                <td>{{$sumMonth3}}</td>
                                <td>{{$sumMonth4}}</td>
                                <td>{{$sumMonth5}}</td>
                                <td>{{$sumMonth6}}</td>
                                <td>{{$sumMonth7}}</td>
                                <td>{{$sumMonth8}}</td>
                                <td>{{$sumMonth9}}</td>
                                <td>{{$sumMonth10}}</td>
                                <td>{{$sumMonth11}}</td>
                                <td>{{$sumMonth12}}</td>
                                <td>{{ count(App\Models\Project::get()) }}</td>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
            </div>

<script type="text/javascript">
    jQuery(document).ready(function() {
     var table = jQuery('#example').DataTable({
         "bLengthChange": true,
         "iDisplayLength": 10,
         "ordering": false,
         "bFilter": false
	   });

    $(".dataTables_length").hide();

    });
</script>
<!-- END: JS Assets-->
@endsection
