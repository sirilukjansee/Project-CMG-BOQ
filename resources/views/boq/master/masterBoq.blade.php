@extends('layout.masterLayout')

@section('content-data')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Master BOQ
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="text-center">
            <!-- BEGIN: Large Modal Toggle -->
            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-import" class="btn btn-success mr-1 mb-2 text-white">
                <i data-lucide="database" class="w-4 h-4 mr-2"></i> Import Category
            </a>
            <a href="{{ url('/export-category')}}" class="btn btn-pending mr-1 mb-2 text-white">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export Category
            </a>
            <a href="javascript:;" id="btn_add" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview_add" class="btn btn-primary mr-1 mb-2">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Master
            </a>
            <!-- END: Large Modal Toggle -->
        </div>
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
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
    </div>
    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
        <table class="table table-hover table-auto sm:mt-2" id="example">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;">ID</th>
                    <th scope="col">Code</th>
                    <th scope="col">งานหลัก</th>
                    <th scope="col" style="text-align: center;">Active</th>
                </tr>
                <tr>
                    <th scope="col" class="filterhead" style="text-align: center;">ID</th>
                    <th scope="col" class="filterhead">Codde</th>
                    <th scope="col" class="filterhead">งานหลัก</th>
                    <th scope="col" class="filterhead" style="text-align: center;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catagories as $key => $cat)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $cat->code }}</td>
                        <td>{{ $cat->name }}</td>
                        <td class="text-center">
                            <a href="{{ url('sub_masterBoq', $cat->id) }}" class="btn btn-primary mr-2 mb-2"> <i
                                    data-lucide="list" class="w-4 h-4 mr-2"></i> Detail</a>
                            <!-- BEGIN: Large Modal Toggle -->
                            <button class="btn btn-secondary mr-2 mb-2" onclick="edit_modal({{ $cat->id }})"
                                data-tw-toggle="modal" data-tw-target="#large-modal-size-preview_edit"> <i
                                    data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit</button>

                            @if ($cat->is_active == "1")
                                <span class="form-switch">
                                    <input id="" class="form-check-input status" type="checkbox" value="{{$cat->id}}" checked>
                                    <label class="form-check-label message_status{{$cat->id}}" for="checkbox-switch-7">ON</label>
                                </span>
                            @else
                                <span class="form-switch">
                                    <input id="" class="form-check-input status" type="checkbox" value="{{$cat->id}}">
                                    <label class="form-check-label message_status{{$cat->id}}" for="checkbox-switch-7">OFF</label>
                                </span>
                            @endif
                            {{-- <a href="{{ url('/master/softdelete', $cat->id) }}" class="btn btn-dark gap-w"> Delete </a> --}}
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
                    <h2 class="font-medium text-base mr-auto">Add Job</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form action="{{ url('/masterBoq/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                            <input type="text" class="form-control mb-2 chk_code" name="code" placeholder="Please add a Code..." required>
                            <p class="text-danger" id="comment_code"></p>
                        </div>
                        <div class="col-span-12 sm:col-span-12 input-form mt-3">
                            <input type="text" class="form-control mb-2 chk_name" name="name" placeholder="Please add a job..." required>
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
                    <h2 class="font-medium text-base mr-auto">Edit Job</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form action="{{ url('/masterBoq/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-6 input-form mt-3">
                            <input type="text" class="form-control mb-2 chk_code" name="code" id="code" required>
                            <p class="text-danger" id="edit_comment_code"></p>
                        </div>
                        <div class="col-span-12 sm:col-span-12 input-form mt-3">
                            <input type="text" class="form-control mb-2 chk_name" name="name" id="name" required>
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
<!-- END: HTML Table Data -->

<!-- BEGIN: Large Modal Content -->
<div id="large-modal-size-import" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Import Category</h2>
            </div> <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <form action="{{url('/import-category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                        <div class="col-span-12 sm:col-span-4 input-form mt-3">
                            <input name="file" type="file" class="form-control-xl"/>
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

    // Change Status
    $('.status').on('click', function() {
        var id = $(this).val();
        // console.log($(this).val());
        if($(this).is(':checked') )
            {
                $('.message_status'+$(this).val()).text("ON");
                jQuery.ajax({
                type:   "GET",
                url:    "{!! url('/masterBoq/changeStatus/"+id+"') !!}",
                datatype:   "JSON",
                async:  false,
                    success: function() {}
                });
            }else{
                $('.message_status'+$(this).val()).text("OFF");

                jQuery.ajax({
                type:   "GET",
                url:    "{!! url('/masterBoq/changeStatus/"+id+"') !!}",
                datatype:   "JSON",
                async:  false,
                    success: function() {}
                });
            }
	});

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
    function edit_modal(id) {
        $('#edit_comment').text('');
        $('#edit_comment_code').text('');
        document.getElementById('btn_save_edit').disabled = false;
        // console.log(id);
        jQuery.ajax({
            type: "GET",
            url: "{!! url('master/edit/"+id+"') !!}",
            datatype: "JSON",
            async: false,
            success: function(data) {
                $('#get_id').val(data.dataEdit.id);
                $('#code').val(data.dataEdit.code);
                $('#name').val(data.dataEdit.name);
                $('#update_by').val(data.dataEdit.update_by);
                jQuery('#Delete').children().remove().end();

            }
        });
    }

    //เช็คข้อมูลซ้ำ
    $('#btn_add').on('click', function() {
            $('#comment').text('');
            $('#edit_comment').text('');
            $('#comment_code').text('');
            $('#edit_comment_code').text('');
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
            url:    "{!! url('masterBoq/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.name.toUpperCase() == datakey.toUpperCase()) {
                        $('#comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        $('#edit_comment').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                        document.getElementById('btn_save_edit').disabled = true;
                    }
                });

            },
        });
    });

    $('.chk_code').on('keyup', function() {
            var datakey = $(this).val();
            $('#comment_code').text('');
            $('#edit_comment_code').text('');
            document.getElementById('btn_save').disabled = false;
            document.getElementById('btn_save_edit').disabled = false;
            console.log(datakey);
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('masterBoq/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.code == datakey) {
                        $('#comment_code').text("'" + value.code + "' มีอยูในระบบแล้ว !");
                        $('#edit_comment_code').text("'" + value.code + "' มีอยูในระบบแล้ว !");
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
