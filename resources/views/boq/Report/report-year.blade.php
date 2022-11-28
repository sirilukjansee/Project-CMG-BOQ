@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   Year Report
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
                        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Job no</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-40 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                                    <option value="">All</option>
                                    <option value="category">220001</option>
                                    <option value="remaining_stock">220002</option>
                                </select>
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
                                <th scope="col">Year</th>
                                <th scope="col">Job Finished Date</th>
                                <th scope="col">SQM</th>
                                <th scope="col">Sum of Value</th>
                                <th scope="col">Count of Job no</th>
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead">#</th>
                                <th scope="col" class="filterhead">Year</th>
                                <th scope="col" class="filterhead"></th>
                                <th scope="col" class="filterhead"></th>
                                <th scope="col" class="filterhead"></th>
                                <th scope="col" class="filterhead"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $grand_total = 0;
                                $jobs = 0;
                            @endphp
                            @foreach($dataProjects as $key => $value)
                                @php
                                    $total_cost = App\Models\template_boqs::whereYear('created_at', $value->year)->sum('budget');
                                    $grand_total += $total_cost;
                                    $jobs += $value->jobs;
                                @endphp
                                {{-- <tr data-href="{{ url('reportAll-detail', 1) }}"> --}}
                                    <tr>
                                        <td>{{ $key + 1}}</td>
                                        <td>{{ $value->year }}</td>
                                        <td></td>
                                        <td>{{ $value->sqm }}</td>
                                        <td>{{ number_format( @$total_cost, 2) }}</td>
                                        <td>{{ $value->jobs }}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="font-weight:bold;">
                                <td colspan="2" style="text-align: center;">Grand Total</td>
                                <td></td>
                                <td></td>
                                <td>{{ number_format( $grand_total, 2) }}</td>
                                <td>{{ number_format( $jobs) }}</td>
                            </tr>
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
	   });

    $(".dataTables_length").hide();


       jQuery(".filterhead").not(':eq(4), :eq(5)').each( function ( i ) {
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

    //edit
    function edit_modal(id){

        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('users/edit/"+id+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(response) {
                $('#get_id').val(response.dataEdit.id);
                $('#name').val(response.dataEdit.name);
                $('#email').val(response.dataEdit.email);
                $('#permision').val(response.dataEdit.permision);
                // $('#update_by').val(data.dataEdit.update_by);
                jQuery('#permision').children().remove().end();
                if (response.dataEdit.permision == 0 ) {
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-4" class="form-check-input" type="radio" name="permision" value="0" checked><label class="form-check-label" for="radio-switch-4">User</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-5" class="form-check-input" type="radio" name="permision" value="1"><label class="form-check-label" for="radio-switch-4">Manager</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-6" class="form-check-input" type="radio" name="permision" value="2"><label class="form-check-label" for="radio-switch-4">Admin</label></div>');
                    }if (response.dataEdit.permision == 1 ) {
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-4" class="form-check-input" type="radio" name="permision" value="0" ><label class="form-check-label" for="radio-switch-4">User</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-5" class="form-check-input" type="radio" name="permision" value="1" checked><label class="form-check-label" for="radio-switch-4">Manager</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-6" class="form-check-input" type="radio" name="permision" value="2"><label class="form-check-label" for="radio-switch-4">Admin</label></div>');
                    }if (response.dataEdit.permision == 2 ) {
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-4" class="form-check-input" type="radio" name="permision" value="0" ><label class="form-check-label" for="radio-switch-4">User</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-5" class="form-check-input" type="radio" name="permision" value="1" ><label class="form-check-label" for="radio-switch-4">Manager</label></div>');
                        $('#permision').append('<div class="form-check mr-2"><input id="radio-switch-6" class="form-check-input" type="radio" name="permision" value="2" checked><label class="form-check-label" for="radio-switch-4">Admin</label></div>');
                    }

            }
        });
    }

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
