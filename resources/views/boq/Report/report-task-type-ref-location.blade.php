@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   Task Type (Location) Report
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
                                <label class="w-full sm:w-32 2xl:w-full mr-2">Task Type</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-40 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                                    <option value="">All</option>
                                    <option value="category">SIS</option>
                                    <option value="remaining_stock">Office</option>
                                </select>
                            </div>
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-full sm:w-32 2xl:w-full mr-2">Job in date (Year)</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-40 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                                    <option value="">2559</option>
                                    <option value="category">2560</option>
                                    <option value="remaining_stock">2561</option>
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
                                <th scope="col">Location</th>
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
                            {{-- <tr data-href="{{ url('reportAll-detail', 1) }}"> --}}
                                <tr>
                                <td>1</td>
                                <td>All one, Chaing Mai</td>
                                <td>1</td>
                                <td>714,924.32</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Asiatique</td>
                                <td>1</td>
                                <td>739,621.06</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- BEGIN: Large Modal Content -->
                <div id="large-modal-size-preview_add" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Add User</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/users/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                            <label for="radio" class="col-md-4 col-form-label text-md-end">{{ __('สิทธิการใช้งาน') }}</label>
                                                <div class="flex flex-col sm:flex-row mt-2">
                                                    <div class="form-check mr-2">
                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="permision" value="0">
                                                        <label class="form-check-label" for="radio-switch-4">User</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="permision" value="1">
                                                        <label class="form-check-label" for="radio-switch-5">Manager</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="radio-switch-6" class="form-check-input" type="radio" name="permision" value="2">
                                                        <label class="form-check-label" for="radio-switch-6">Admin</label>
                                                    </div>
                                                </div>
                                        </div>

                                </div>
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary w-20" id="btn_save">บันทึก</button>
                                </div> <!-- END: Modal Footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: Large Modal Content -->

                <!-- BEGIN: Large Modal Content -->
                <div id="large-modal-size-preview_edit" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Edit Brand</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/users/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="get_id">
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                            <label for="radio" class="col-md-4 col-form-label text-md-end">{{ __('สิทธิการใช้งาน') }}</label>
                                                <div class="flex flex-col sm:flex-row mt-2" id="permision">
                                                </div>
                                        </div>

                                </div>
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary w-20" id="btn_save">บันทึก</button>
                                </div> <!-- END: Modal Footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: Large Modal Content -->
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
