@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   Task Type (Brand) Report
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
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mb-10">
                        <form action="{{url('report-task-type-ref-brand-search')}}" method="POST" enctype="multipart/form-data" id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                            @csrf
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Task Type</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-40 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="type_id">
                                    <option selected value="">All</option>
                                    @foreach ($task_type as $value)
                                        <option value="{{$value->id}}">{{$value->task_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Job in date (Year)</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-40 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="year">
                                    <option value="0">Select</option>
                                    <?php
                                        for ($y = 2000; $y <= date('Y'); $y++) { ?>
                                        <option value ="<?=$y?>"> <?=$y?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mt-2 xl:mt-0">
                                <button id="tabulator-html-filter-go" type="submit" class="btn btn-primary w-full sm:w-16" >Go</button>
                                <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                            </div>
                        </form>
                        <div class="flex mt-5 sm:mt-0">
                            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export </button>
                    </div>
                    </div>
                    <table class="table table-hover table-auto sm:mt-2" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Distinct count of Job no</th>
                                <th scope="col">Sum of Value</th>
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead">#</th>
                                <th scope="col" class="filterhead">Brand</th>
                                <th scope="col" class="filterhead"></th>
                                <th scope="col" class="filterhead"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $value)
                            @php
                                $total_cost = 0;
                                $sum = 0;
                            @endphp
                                @foreach ($data_projects as $project)
                                    @if($value->id == $project->brand)
                                        @php
                                        $total_cost = App\Models\template_boqs::where('project_id', $project->id)->sum('budget');
                                        $sum += 1;
                                        @endphp
                                    @endif
                                @endforeach
                                {{-- <tr data-href="{{ url('reportAll-detail', 1) }}"> --}}
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{ $value->brand_name }}</td>
                                        <td>{{ number_format( $sum) }}</td>
                                        <td>{{ number_format( $total_cost, 2) }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

<script type="text/javascript">
    jQuery(document).ready(function() {
     var table = jQuery('#example').DataTable({
         "bLengthChange": true,
         "iDisplayLength": 10,
         "ordering": false,
	   });

    $(".dataTables_length").hide();


       jQuery(".filterhead").not(':eq(2), :eq(3), :eq(4)').each( function ( i ) {
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
