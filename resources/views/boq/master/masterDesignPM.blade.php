@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Master Designer/PM
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <div class="text-center">
                        <!-- BEGIN: Large Modal Toggle -->
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-import" class="btn btn-success mr-1 mb-2 text-white">
                            <i data-lucide="database" class="w-4 h-4 mr-2"></i> Import Designer/PM
                        </a>
                        <a href="{{ url('/export-designer')}}" class="btn btn-pending mr-1 mb-2 text-white">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export Designer/PM
                        </a>
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview_add" class="btn btn-primary mr-1 mb-2">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Designer/PM
                        </a>
                        <!-- END: Large Modal Toggle -->
                    </div>
                </div>
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
                                <th scope="col" style="text-align: center;">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="text-align: center;">Active</th>
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead">ID</th>
                                <th scope="col" class="filterhead">Name</th>
                                <th scope="col" class="filterhead">E-mail</th>
                                <th scope="col" class="filterhead">Telephone</th>
                                <th scope="col" class="filterhead">Status</th>
                                <th scope="col" class="filterhead"></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($design_and_pms as $key => $dp)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $dp->name }}</td>
                                <td>{{ $dp->email }}</td>
                                <td class="text-center">{{ $dp->tel }}</td>
                                <td>
                                    @if ($dp->is_active == "1")
                                        ON
                                    @else
                                        OFF
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- BEGIN: Large Modal Toggle -->
                                    <button class="btn btn-secondary mr-2 mb-2" onclick="edit_modal({{$dp->id}})" data-tw-toggle="modal"
                                        data-tw-target="#large-modal-size-preview_edit"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit</button>

                                    <a href="{{ url('/masterDesignPM/changeStatus', $dp->id) }}" class="btn btn-dark mr-2 mb-2"> <i data-lucide="power" class="w-4 h-4 mr-2"></i>On/Off</a>
                                    {{-- <a href="{{ url('/masterDesignPM/softdelete', $dp->id) }}" class="btn btn-dark gap-w"> Delete </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- BEGIN: Large Modal Content -->
                <div id="large-modal-size-preview_add" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="font-medium text-base mr-auto">Add Designer/PM</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/masterDesignPM/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                        <input type="text" class="form-control mb-2 chk_name" name="name" placeholder="Please add a Designer..." required>
                                        <p class="text-danger" id="comment"></p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                        <input type="email" class="form-control mb-2 chk_email" name="email" placeholder="Please add a Email..." required>
                                        <p class="text-danger" id="comment_email"></p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                        <input type="text" class="form-control mb-2 tel" name="tel" placeholder="Please add a Telephone..." required>
                                        <p class="text-danger" id="comment_tel"></p>
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
                                <h2 class="font-medium text-base mr-auto">Edit Designer/PM</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/masterDesignPM/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                        <input type="text" class="form-control mb-2 chk_name_edit" name="name" id="name" required>
                                        <p class="text-danger" id="edit_comment"></p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                        <input type="email" class="form-control mb-2 chk_email_edit" name="email" id="email" required>
                                        <p class="text-danger" id="edit_comment_email"></p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6 input-form mt-3">
                                        <input type="text" class="form-control mb-2" name="tel" id="tel" required>
                                        <p class="text-danger" id="edit_comment_tel"></p>
                                    </div>
                                    <input type="hidden" name="id" id="get_id">
                                </div>
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">ยกเลิก</button>
                                    <button type="submit" class="btn btn-primary w-20" id="btn_save_edit">บันทึก</button>
                                </div> <!-- END: Modal Footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: Large Modal Content -->
            </div>

            <!-- BEGIN: Large Modal Content -->
            <div id="large-modal-size-import" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Import Designer/PM</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form action="{{url('/import-designer')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-4 input-form mt-3">
                                        <input name="file" type="file" class="form-control-xl" required/>
                                    </div>
                            </div>
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-20 mr-1">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary w-20">บันทึก</button>
                            </div> <!-- END: Modal Footer -->
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Large Modal Content -->

<script type="text/javascript">
    jQuery(document).ready(function() {
     var table = jQuery('#example').DataTable({
         "bLengthChange": true,
         "iDisplayLength": 10,
         "ordering": false,
	   });

       jQuery(".filterhead").not(":eq(5)").each( function ( i ) {
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


    //edit main
    function edit_modal(id){
        $('#edit_comment_email').text('');
            $('#edit_comment').text('');
            document.getElementById('btn_save_edit').disabled = false;
        console.log(id);
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterDesignPM/edit/"+id+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                $('#get_id').val(data.dataEdit.id);
                $('#name').val(data.dataEdit.name);
                $('#email').val(data.dataEdit.email);
                $('#tel').val(data.dataEdit.tel);
                $('#update_by').val(data.dataEdit.update_by);
                jQuery('#Delete').children().remove().end();

            }
        });
    }

    //เช็คข้อมูลซ้ำ
    $('.chk_name').on('keyup', function() {
            var datakey = $(this).val();
            $('#comment').text('');
            document.getElementById('btn_save').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterDesignPM/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.name.toUpperCase() == datakey.toUpperCase()) {
                        $('#comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }
                    if (value.email.toUpperCase() == $('.chk_email').val().toUpperCase()) {
                        $('#comment_email').text("'" + value.email + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }
                });

            },
        });
    });

    $('.chk_email').on('keyup', function() {
            var datakey = $(this).val();
            $('#comment_email').text('');
            document.getElementById('btn_save').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterDesignPM/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.email.toUpperCase() == datakey.toUpperCase()) {
                        $('#comment_email').text("'" + value.email + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }if (value.name.toUpperCase() == $('.chk_name').val().toUpperCase()) {
                        $('#comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }

                });

            },
        });
    });

    $('.chk_name_edit').on('keyup', function() {
            var datakey = $(this).val();
            $('#edit_comment').text('');
            document.getElementById('btn_save').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterDesignPM/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.name.toUpperCase() == datakey.toUpperCase()) {
                        $('#edit_comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }
                    // if (value.email == $('.chk_email_edit').val()) {
                    //     $('#edit_comment_email').text("'" + value.email + "' มีอยูในระบบแล้ว !");
                    //     document.getElementById('btn_save').disabled = true;
                    // }
                });

            },
        });
    });

    $('.chk_email_edit').on('keyup', function() {
            var datakey = $(this).val();
            $('#edit_comment_email').text('');
            $('#edit_comment').text('');
            document.getElementById('btn_save_edit').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterDesignPM/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.email.toUpperCase() == datakey.toUpperCase()) {
                        $('#edit_comment_email').text("'" + value.email + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save_edit').disabled = true;
                    }if (value.name == $('.chk_name_edit').val()) {
                        $('#edit_comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save_edit').disabled = true;
                    }

                });

            },
        });
    });

</script>
<!-- END: JS Assets-->
@endsection
