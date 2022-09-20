@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Master TOR
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <div class="text-center">
                        <!-- BEGIN: Large Modal Toggle -->
                        <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-import" class="btn btn-success mr-1 mb-2 text-white">
                            <i data-lucide="database" class="w-4 h-4 mr-2"></i> Import TOR
                        </a>
                        <a href="{{ url('/export-tor')}}" class="btn btn-pending mr-1 mb-2 text-white">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export TOR
                        </a>
                        <a href="javascript:;" id="btn_add" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview_add" class="btn btn-primary mr-1 mb-2">
                            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add TOR
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
                                <th scope="col">TOR</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="text-align: center;">Active</th>
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead" style="text-align: center;">ID</th>
                                <th scope="col" class="filterhead">TOR</th>
                                <th scope="col" class="filterhead">Status</th>
                                <th scope="col" class="filterhead" style="text-align: center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masterTor as $key => $tor)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $tor->message }}</td>
                                <td>
                                    @if ($tor->is_active == "1")
                                        ON
                                    @else
                                        OFF
                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- BEGIN: Large Modal Toggle -->
                                    <a href="{{ url('/masterTOR/detail', $tor->id) }}" class="btn btn-primary mr-2 mb-2"> <i
                                        data-lucide="list" class="w-4 h-4 mr-2"></i> Detail</a>

                                    <button class="btn btn-secondary mr-2 mb-2" onclick="edit_modal({{$tor->id}})" data-tw-toggle="modal"
                                        data-tw-target="#large-modal-size-preview_edit"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit</button>

                                    <a href="{{ url('/masterTOR/changeStatus', $tor->id) }}" class="btn btn-dark mr-2 mb-2"> <i data-lucide="power" class="w-4 h-4 mr-2"></i> On/Off</a>
                                    {{-- <a href="{{ url('/masterVender/softdelete', $tor->id) }}" class="btn btn-dark gap-w"> Delete </a> --}}
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
                                <h2 class="font-medium text-base mr-auto">Add Tor</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/masterTOR/add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                        <input type="text" class="form-control mb-2 chk_name" name="tor" placeholder="Please add a Tor..." required>
                                        <p class="text-danger" id="comment"></p>
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
                                <h2 class="font-medium text-base mr-auto">Edit Tor</h2>
                            </div> <!-- END: Modal Header -->
                            <!-- BEGIN: Modal Body -->
                            <form action="{{ url('/masterTOR/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                        <input type="text" class="form-control mb-2 chk_name" name="tor" id="get_tor" required>
                                        <p class="text-danger" id="edit_comment"></p>
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
                            <h2 class="font-medium text-base mr-auto">Import TOR</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form action="{{url('/import-tor')}}" method="post" enctype="multipart/form-data">
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

        jQuery(".filterhead").not(":eq(3)").each( function ( i ) {
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
        $('#edit_comment').text('');
        document.getElementById('btn_save_edit').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterTOR/edit/"+id+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                $('#get_id').val(data.dataEdit.id);
                $('#get_tor').val(data.dataEdit.message);
                jQuery('#Delete').children().remove().end();

            }
        });
    }

    //เช็คข้อมูลซ้ำ
    $('#btn_add').on('click', function() {
            $('#comment').text('');
            $('#edit_comment').text('');
            document.getElementById('btn_save').disabled = false;
            document.getElementById('btn_save_edit').disabled = false;
        });

        $('.chk_name').on('keyup', function() {
            var datakey = $(this).val();
            $('#comment').text('');
            $('#edit_comment').text('');
            document.getElementById('btn_save').disabled = false;
            document.getElementById('btn_save_edit').disabled = false;
            jQuery.ajax({
                type:   "GET",
                url:    "{!! url('masterTOR/chk/"+datakey+"') !!}",
                datatype:   "JSON",
                async:  false,
                success: function(data) {
                    // $('#chk_code').val(data.dataChk.code);
                    jQuery.each(data.dataChk, function(key, value){
                        if (value.message.toUpperCase() == datakey.toUpperCase()) {
                            $('#comment').text("'" + value.message + "' มีอยูในระบบแล้ว !");
                            $('#edit_comment').text("'" + value.message + "' มีอยูในระบบแล้ว !");
                            document.getElementById('btn_save').disabled = true;
                            document.getElementById('btn_save_edit').disabled = true;
                        }
                    });

                },
            });
    });

</script>
<!-- END: JS Assets-->
@endsection
