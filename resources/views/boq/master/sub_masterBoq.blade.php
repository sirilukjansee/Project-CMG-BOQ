@extends('layout.masterLayout')

@section('content-data')

            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    {{-- Master Data > {{ $catagories->name }} --}}
                    <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
                        <ol class="breadcrumb breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('masterBoq') }}">Master BOQ</a></li>
                            <li class="breadcrumb-item active"><a>{{ $catagories->name }}</a></li>
                        </ol>
                    </nav>
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <!-- BEGIN: Large Modal Toggle -->
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-import" class="btn btn-success mr-1 mb-2 text-white">
                        <i data-lucide="database" class="w-4 h-4 mr-2"></i> Import Detail
                    </a>
                    <a href="{{url('export-category_sub', $catagories->id)}}" class="btn btn-pending mr-1 mb-2 text-white">
                        <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export Detail
                    </a>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#large-modal-size-preview_add_sub" class="btn btn-primary mr-1 mb-2">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Detail
                    </a>
                    <!-- END: Large Modal Toggle -->
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
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mb-5"></div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-hover table-auto sm:mt-2 allWork" id="example">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">งานย่อย</th>
                                <th scope="col">Brand</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                            <tr>
                                <th scope="col" class="filterhead">Code</th>
                                <th scope="col" class="filterhead">งานย่อย</th>
                                <th scope="col" class="filterhead">Brand</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catagories3 as $key => $cat)
                            <tr class="intro-x">
                                @php
                                    $brand = explode(',', $cat->brand_id);
                                @endphp
                                <td>{{ $cat->code }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>
                                @foreach ($brand as $keyb => $b)
                                    @php
                                        $b_name = App\Models\Brand::where('id', $b)->first();
                                    @endphp
                                        @if ($b_name)
                                            @if (count($brand) > $keyb + 1)
                                                {{ $b_name->brand_name }}, <br>
                                            @else
                                                {{ $b_name->brand_name }}
                                            @endif
                                        @endif
                                @endforeach
                                </td>
                                <td class="text-center" style="width: 30%;">
                                    <!-- BEGIN: Large Modal Toggle -->
                                    <button class="btn btn-secondary mr-2 mb-2" onclick="edit_modal_sub({{$cat->id}})" data-tw-toggle="modal"
                                        data-tw-target="#large-modal-size-preview_edit_sub"> <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit</button>
                                    <!-- END: Large Modal Toggle -->

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
                                    {{-- x<a href="{{ url('/sub_masterBoq/softdelete', $cat->id) }}" class="btn btn-pending gap-w"><i data-lucide="activity" class="w-4 h-4 mr-2"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Large Modal Content -->
            <div id="large-modal-size-preview_add_sub" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Add Detail</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form action="{{ url('/sub_masterBoq/add_sub') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="catagory_id" value="{{$catagories->id}}">
                            <input type="hidden" class="form-control" name="catagory_code" value="{{$catagories->code}}">
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                    <input type="text" class="form-control" name="name" placeholder="{{ $catagories->name }}" disabled>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code" name="code1" minlength="2" maxlength="2" placeholder="Ex: GG" required>
                                    <p class="text-danger" id="comment"></p>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code2" name="code2" minlength="3" maxlength="3" placeholder="Ex: 001" required>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code3" name="code3" minlength="2" maxlength="2" placeholder="- -">
                                </div>
                                <div class="col-span-12 sm:col-span-12">
                                    <input type="text" class="form-control chk_name" name="name" placeholder="Name">
                                    <p class="text-danger" id="comment2"></p>
                                </div>
                                <div class="col-span-12 sm:col-span-12 input-form">
                                    <select id="" class="form-control select_brand" name="brand_id[]" multiple placeholder="Select Brand">
                                        @foreach ($data_brand as $value)
                                            <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                                        @endforeach
                                    </select>
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
            <div id="large-modal-size-preview_edit_sub" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Edit Detail</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form action="{{ url('/sub_masterBoq/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="catagory_code" value="{{$catagories->code}}">
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12 sm:col-span-12 input-form mt-3">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $catagories->name }}" disabled>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code_edit" id="get_code1" name="code1" minlength="2" maxlength="2" required>
                                    <p class="text-danger" id="edit_comment"></p>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code_edit2" id="get_code2" name="code2" minlength="3" maxlength="3" required>
                                </div>
                                <div class="col-span-12 sm:col-span-4">
                                    <input type="text" class="form-control chk_code_edit3" id="get_code3" placeholder="- -" name="code3" minlength="2" maxlength="2">
                                </div>
                                <div class="col-span-12 sm:col-span-12">
                                    <input type="text" class="form-control chk_name_edit" id="sub_name" name="name">
                                    <p class="text-danger" id="edit_comment2"></p>
                                </div>
                                <div class="col-span-12 sm:col-span-12 input-form">
                                    <select id="get_brand_edit" class="form-control select_brand" name="brand_id[]" multiple placeholder="Select Brand">
                                        {{-- @foreach ($data_brand as $value)
                                            <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                <input type="hidden" name="id" id="id">
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

            <!-- BEGIN: Large Modal Content -->
            <div id="large-modal-size-import" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Import Sub</h2>
                        </div> <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <form action="{{url('/import-category-sub')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">

                                    <div class="col-span-12 sm:col-span-4 input-form mt-3">
                                        <input name="file_data" type="file" class="form-control-xl"/>
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


<!-- BEGIN: JS Assets-->
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
                url:    "{!! url('/sub_masterBoq/changeStatus/"+id+"') !!}",
                datatype:   "JSON",
                async:  false,
                    success: function() {}
                });
            }else{
                $('.message_status'+$(this).val()).text("OFF");

                jQuery.ajax({
                type:   "GET",
                url:    "{!! url('/sub_masterBoq/changeStatus/"+id+"') !!}",
                datatype:   "JSON",
                async:  false,
                    success: function() {}
                });
            }
	});

    jQuery(document).ready(function() {
        jQuery(".select_brand").select2({
            multiple: true,
            placeholder: 'Select Brand'
        });

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

    //edit sub
    function edit_modal_sub(id){
        $('#comment2').text('');
        $('#edit_comment2').text('');
        document.getElementById('btn_save_edit').disabled = false;
        // console.log(id);
        var x = document.getElementById("get_brand_edit");
        var option = document.createElement("option");
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('sub_masterBoq/edit/"+id+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                $('#id').val(data.dataEdit.id);
                var text = data.dataEdit.code;
                var result1 = text.substring(0, 2);
                var result2 = text.substring(2, 5);
                var result3 = text.substring(5, 7);
                $('#get_code1').val(result1);
                $('#get_code2').val(result2);
                if (result3 != '') {
                    $('#get_code3').val(result3);
                }

                $('#sub_name').val(data.dataEdit.name);
                $('#update_by').val(data.dataEdit.update_by);
                jQuery('#Delete').children().remove().end();
                jQuery('#get_brand_edit').children().remove().end();
                // console.log(data.dataBrand);

                var x = 0;

                if (data.dataEdit.brand_id) {
                    let rows_tags = data.dataEdit.brand_id.split(",");
                    // jQuery.each(rows_tags, function(tkey, tvalue){
                        jQuery.each(data.dataBrand, function(key, value){
                            jQuery.each(rows_tags, function(tkey, tvalue){
                        if(value.id == rows_tags[tkey]){
                            // console.log(rows_tags[tkey]);
                            $('#get_brand_edit').append('<option value='+value.id+' selected>'+value.brand_name+'</option>');
                        }
                        });
                        // jQuery.each(rows_tags, function(tkey, tvalue){
                        // if(rows_tags[key]){
                            if(value.id != rows_tags[x]){
                                console.log(rows_tags[x]);
                                x++;
                            // console.log(key+'.'+value.id);
                            $('#get_brand_edit').append('<option value='+value.id+'>'+value.brand_name+'</option>');
                            }
                        // }
                        // });
                    });
                }
                else{
                    jQuery.each(data.dataBrand, function(key, value){
                        $('#get_brand_edit').append('<option value='+value.id+'>'+value.brand_name+'</option>');
                    });
                }
            }
        });
    }

    //เช็คข้อมูลซ้ำ
    $('.chk_name').on('click', function() {
            var datakey = $('.chk_code').val() + $('.chk_code2').val() + $('.chk_code3').val();
            $('#comment').text('');
            document.getElementById('btn_save').disabled = false;
            jQuery.ajax({
                type:   "GET",
                url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
                datatype:   "JSON",
                async:  false,
                success: function(data) {
                    // $('#chk_code').val(data.dataChk.code);
                    jQuery.each(data.dataChk, function(key, value){
                        if (value.code.toUpperCase() == datakey.toUpperCase()) {
                            $('#comment').text("'" + value.code + "' มีอยูในระบบแล้ว !");
                            document.getElementById('btn_save').disabled = true;

                        }
                    });

                },
            });
    });

    $('.chk_code_edit').on('keyup', function() {
            var datakey = $('.chk_code_edit').val() + $('.chk_code_edit2').val() + $('.chk_code_edit3').val();
            $('#edit_comment').text('');
            document.getElementById('btn_save_edit').disabled = false;
            jQuery.ajax({
                type:   "GET",
                url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
                datatype:   "JSON",
                async:  false,
                success: function(data) {
                    // $('#chk_code').val(data.dataChk.code);
                    jQuery.each(data.dataChk, function(key, value){
                        if (value.code == datakey) {
                            $('#edit_comment').text("'" + value.code + "' มีอยูในระบบแล้ว !");
                            document.getElementById('btn_save_edit').disabled = true;
                        }
                    });

                },
            });
    });

    $('.chk_code_edit2').on('keyup', function() {
            var datakey = $('.chk_code_edit').val() + $('.chk_code_edit2').val() + $('.chk_code_edit3').val();
            $('#edit_comment').text('');
            document.getElementById('btn_save_edit').disabled = false;
            jQuery.ajax({
                type:   "GET",
                url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
                datatype:   "JSON",
                async:  false,
                success: function(data) {
                    // $('#chk_code').val(data.dataChk.code);
                    jQuery.each(data.dataChk, function(key, value){
                        if (value.code == datakey) {
                            $('#edit_comment').text("'" + value.code + "' มีอยูในระบบแล้ว !");
                            document.getElementById('btn_save_edit').disabled = true;
                        }
                    });

                },
            });
    });

    $('.chk_code_edit3').on('keyup', function() {
            var datakey = $('.chk_code_edit').val() + $('.chk_code_edit2').val() + $('.chk_code_edit3').val();
            $('#edit_comment').text('');
            document.getElementById('btn_save_edit').disabled = false;
            jQuery.ajax({
                type:   "GET",
                url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
                datatype:   "JSON",
                async:  false,
                success: function(data) {
                    // $('#chk_code').val(data.dataChk.code);
                    jQuery.each(data.dataChk, function(key, value){
                        if (value.code == datakey) {
                            $('#edit_comment').text("'" + value.code + "' มีอยูในระบบแล้ว !");
                            document.getElementById('btn_save_edit').disabled = true;
                        }
                    });

                },
            });
    });

    $('.chk_name').on('keyup', function() {
            var datakey = $(this).val();
            $('#comment2').text('');
            // console.log($('#comment').text());
            if ($('#comment').text()) {
                document.getElementById('btn_save').disabled = true;
            }else{
                document.getElementById('btn_save').disabled = false;
            }

        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.name.toUpperCase() == datakey.toUpperCase()) {
                        $('#comment2').text("'" + value.name + "' มีอยูในระบบแล้ว !");
                        document.getElementById('btn_save').disabled = true;
                    }
                });

            },
        });
    });

    $('.chk_name_edit').on('keyup', function() {
            var datakey = $(this).val();
            $('#edit_comment2').text('');
            document.getElementById('btn_save_edit').disabled = false;
        jQuery.ajax({
            type:   "GET",
            url:    "{!! url('sub_masterBoq/chk/"+datakey+"') !!}",
            datatype:   "JSON",
            async:  false,
            success: function(data) {
                // $('#chk_code').val(data.dataChk.code);
                jQuery.each(data.dataChk, function(key, value){
                    if (value.name.toUpperCase() == datakey.toUpperCase()) {
                        $('#edit_comment2').text("'" + value.name + "' มีอยูในระบบแล้ว !");
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
