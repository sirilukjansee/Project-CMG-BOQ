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

                    <table class="table table-hover table-auto sm:mt-2" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Job no</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Project</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Task Type</th>
                                <th scope="col">Task Name</th>
                                <th scope="col">Area</th>
                                <th scope="col">Budget</th>
                                <th scope="col">B. Location</th>
                                <th scope="col">Job Finished Date</th>
                                <th scope="col">Job in date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Objective</th>
                                <th scope="col">PR No</th>
                                <th scope="col">PR Date</th>
                                <th scope="col">PR Status</th>
                                <th scope="col">PO No</th>
                                <th scope="col">PO Date</th>
                                <th scope="col">PO Date</th>
                                <th scope="col">Cost Sqm</th>
                                {{-- <th scope="col" style="text-align: center;">Active</th> --}}
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead">Job no</th>
                                <th scope="col" class="filterhead">Brand</th>
                                <th scope="col" class="filterhead">Cost</th>
                                <th scope="col" class="filterhead">Project</th>
                                <th scope="col" class="filterhead">Venue</th>
                                <th scope="col" class="filterhead">Task Type</th>
                                <th scope="col" class="filterhead">Task Name</th>
                                <th scope="col" class="filterhead">Area</th>
                                <th scope="col" class="filterhead">Budget</th>
                                <th scope="col" class="filterhead">B. Location</th>
                                <th scope="col" class="filterhead">Job Finished Date</th>
                                <th scope="col" class="filterhead">Job in date</th>
                                <th scope="col" class="filterhead">Status</th>
                                <th scope="col" class="filterhead">Objective</th>
                                <th scope="col" class="filterhead">PR No</th>
                                <th scope="col" class="filterhead">PR Date</th>
                                <th scope="col" class="filterhead">PR Status</th>
                                <th scope="col" class="filterhead">PO No</th>
                                <th scope="col" class="filterhead">PO Date</th>
                                <th scope="col" class="filterhead">PO Date</th>
                                <th scope="col" class="filterhead">Cost Sqm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-href="{{ url('reportAll-detail', 1) }}" class="tooltip intro-x cursor-pointer">
                                <td>220001</td>
                                <td>Casio</td>
                                <td>110161</td>
                                <td>GFactory</td>
                                <td>Siam Center</td>
                                <td>Kiosk</td>
                                <td>1001:New</td>
                                <td>38.15</td>
                                <td>1149125</td>
                                <td>No Location</td>
                                <td>15/3/17</td>
                                <td>10/2/17</td>
                                <td>Approve</td>
                                <td>New location</td>
                                <td>12062797</td>
                                <td>10/2/17</td>
                                <td>Completed</td>
                                <td>102042843</td>
                                <td>22/2/2017</td>
                                <td>733305</td>
                                <td>19221.63</td>
                            </tr>
                            <tr data-href="{{ url('reportAll-detail', 1) }}">
                                <td>220002</td>
                                <td>Casio</td>
                                <td>110161</td>
                                <td>GFactory</td>
                                <td>Siam Center</td>
                                <td>Kiosk</td>
                                <td>1001:New</td>
                                <td>38.15</td>
                                <td>1149125</td>
                                <td>No Location</td>
                                <td>15/3/17</td>
                                <td>10/2/17</td>
                                <td>Approve</td>
                                <td>New location</td>
                                <td>12062797</td>
                                <td>10/2/17</td>
                                <td>Completed</td>
                                <td>102042843</td>
                                <td>22/2/2017</td>
                                <td>733305</td>
                                <td>19221.63</td>
                            </tr>
                            <tr data-href="{{ url('reportAll-detail', 1) }}">
                                <td>220003</td>
                                <td>Lee</td>
                                <td>110166</td>
                                <td>GFactory</td>
                                <td>Lee SIS</td>
                                <td>C.Zen</td>
                                <td>1001:New</td>
                                <td>38.15</td>
                                <td>1149125</td>
                                <td>No Location</td>
                                <td>15/3/17</td>
                                <td>10/2/17</td>
                                <td>Approve</td>
                                <td>New location</td>
                                <td>12062797</td>
                                <td>10/2/17</td>
                                <td>Completed</td>
                                <td>102042843</td>
                                <td>22/2/2017</td>
                                <td>733305</td>
                                <td>19221.63</td>
                            </tr>
                            {{-- @foreach ($users as $key => $urs)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $urs->name }}</td>
                                <td>{{ $urs->email }}</td>
                                <td>
                                    @if ($urs->permision == "0")
                                        User
                                    @elseif ($urs->permision == "1")
                                        Manager
                                    @elseif ($urs->permision == "2")
                                        Admin
                                    @endif
                                </td>
                                <td>
                                    @if ($urs->status == "1")
                                        ON
                                    @else
                                        OFF
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- BEGIN: Large Modal Toggle -->
                                    <button class="btn btn-secondary mr-2 mb-2" onclick="edit_modal({{$urs->id}})" data-tw-toggle="modal"
                                        data-tw-target="#large-modal-size-preview_edit"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit</button>
                                    <a href="{{ url('/changeStatus_user', $urs->id) }}" class="btn btn-dark mr-2 mb-2"> <i data-lucide="power" class="w-4 h-4 mr-2"></i> On/Off</a>
                                </td>
                            </tr>
                            @endforeach --}}
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
