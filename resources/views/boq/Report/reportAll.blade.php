@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Report
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
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                        <div class="xl:flex sm:mr-auto" ></div>
                        <div class="flex mt-5 sm:mt-0 mb-5">
                            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-auto mt-8 sm:mt-0">
                        <table class="table table-hover table-auto sm:mt-2" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">Job no</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Concept</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Task Type</th>
                                    <th scope="col">Task Name</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Budget</th>
                                    <th scope="col">Job Finished Date</th>
                                    <th scope="col">Job in date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Cost Sqm</th>
                                    {{-- <th scope="col" style="text-align: center;">Active</th> --}}
                                </tr>
                                <tr>
                                    <th scope="col" class="filterhead">Job no</th>
                                    <th scope="col" class="filterhead">Brand</th>
                                    <th scope="col" class="filterhead">Concept</th>
                                    <th scope="col" class="filterhead">Location</th>
                                    <th scope="col" class="filterhead">Task Type</th>
                                    <th scope="col" class="filterhead">Task Name</th>
                                    <th scope="col" class="filterhead">Area</th>
                                    <th scope="col" class="filterhead">Budget</th>
                                    <th scope="col" class="filterhead">Job Finished Date</th>
                                    <th scope="col" class="filterhead">Job in date</th>
                                    <th scope="col" class="filterhead">Status</th>
                                    <th scope="col" class="filterhead">Cost Sqm</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr data-href="{{ url('reportAll-detail', 1) }}"> --}}
                                    @foreach ($projects as $value)
                                    <tr>
                                        <td>{{ $value->number_id }}</td>
                                        <td>{{ @$value->brand_master->brand_name }}</td>
                                        <td>{{ @$value->concept_master->name }}</td>
                                        <td>{{ @$value->location_master->location_name }}</td>
                                        <td>{{ @$value->task_type_master->task_type_name }}</td>
                                        <td>{{ @$value->task_name_master->task_name }}</td>
                                        <td>{{ $value->area }}</td>
                                        <td>{{ $value->budget }}</td>
                                        <td>{{ Carbon\Carbon::parse($value->finish_date)->format('d/m/Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($value->open_date)->format('d/m/Y') }}</td>
                                        <td>
                                            @if (@$value->project_id1->name == 'Master BOQ')
                                                @if (@$value->project_id1->status == '0')
                                                    Drafted
                                                @elseif (@$value->project_id1->status == '1')
                                                    Waiting Approval
                                                @elseif (@$value->project_id1->status == '2')
                                                    Approval
                                                @elseif (@$value->project_id1->status == '3')
                                                    Reject
                                                @elseif (@$value->project_id1->status == '4')
                                                    Rework
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $value->costSqm }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<script type="text/javascript">
    jQuery(document).ready(function() {
     var table = jQuery('#example').DataTable({
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

    //button href
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
