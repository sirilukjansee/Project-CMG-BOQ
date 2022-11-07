@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                        <ol class="breadcrumb breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('reportAll') }}">Report</a></li>
                            <li class="breadcrumb-item active"><a>Detail</a></li>
                        </ol>
                    </nav>
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0"></div>
            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <div class="xl:flex sm:mr-auto">
                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0"></div>
                    </div>
                    <div class="sm:flex items-center mt-2 xl:mt-0"></div>
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
                            <td class="table-report__action">
                                <div class="btn-group text-center flex justify-center">
                                    <a href="{{ url('/viewBoq', $tb->id) }}"
                                        class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i
                                            data-lucide="eye" class="w-4 h-4"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    <div class="xl:flex sm:mr-auto">
                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0 ml-5">
                           <b class="text-lg">BOQ from Vender</b>
                        </div>
                    </div>
                </div>
                <!--Import boq vender-->
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-hover table-auto sm:mt-2">
                        <thead class="table-light">
                            <tr>
                                <th class="whitespace-nowrap">ID</th>
                                <th class="whitespace-nowrap">ID_BOQ</th>
                                <th class="whitespace-nowrap">Vender</th>
                                <th class="text-center whitespace-nowrap">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $imp_boq as $key => $ib )
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

</script>
<!-- END: JS Assets-->
@endsection
