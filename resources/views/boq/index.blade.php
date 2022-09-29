@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Project
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ url('addprojectBoq') }}" class="btn btn-primary shadow-md mr-2"><i data-lucide="plus"
                    class="w-4 h-4 mr-2"></i> Add Project </a>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        @if (session('success'))
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
                        <tr data-href="{{ url('allBoq', $pro->id) }}" class="tooltip intro-x cursor-pointer" title="Update At {{ Carbon\Carbon::parse(@$pro->project_id1->approve_at)->format('d M y') }}">
                            <td class="text-center table-report__action">{{ $key + 1 }}</td>
                            <td class="w-40 text-center table-report__action">
                                <h3>{{ @$pro->number_id }}
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
            </table>
        </div>
    </div>
    <!-- END: HTML Table Data -->


    <!-- BEGIN: JS Assets-->
    <script>
        //data table
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
@endsection
