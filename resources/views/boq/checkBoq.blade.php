@extends('layout.masterLayout')

@section('content-data')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Manager
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
            <table class="table table-hover sm:mt-2">
                <thead class="table-light">
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="text-center whitespace-nowrap">Brand</th>
                        <th class="text-center whitespace-nowrap">Location</th>
                        <th class="text-center whitespace-nowrap">Task Name</th>
                        <th class="text-center whitespace-nowrap">Task Type</th>
                        <th class="text-center whitespace-nowrap">Designer</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Send_date</th>
                        <th class="text-center whitespace-nowrap"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($boq_chk as $bchk)
                        <tr class="intro-x">
                            <td class="w-40 table-report__action">
                                <div class="flex">
                                    <h3>{{ @$bchk->number_id }}</h3>
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">{{ @$bchk->project->brand_master->brand_name }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">
                                    {{ @$bchk->project->location_master->location_name }}</div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">
                                    {{ @$bchk->project->task_name_master->task_name }}</div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">
                                    {{ @$bchk->project->task_type_master->task_type_name }}</div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">{{ @$bchk->project->designer_master->name }}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex items-center justify-center">
                                    @if (@$bchk->status == '0')
                                        Drafted
                                    @elseif (@$bchk->status == '1')
                                        Waiting Approval
                                    @elseif (@$bchk->status == '2')
                                        Approval
                                    @elseif (@$bchk->status == '3')
                                        Reject
                                    @elseif (@$bchk->status == '4')
                                        Rework
                                    @endif
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                @if ( $bchk->updated_at == null)
                                <div class="flex items-center justify-center">{{ Carbon\Carbon::parse(@$bchk->date)->format('d M y') }}</div>
                                @else
                                <div class="flex items-center justify-center">{{ Carbon\Carbon::parse(@$bchk->updated_at)->format('d M y') }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group flex text-center justify-center ">
                                    <a href="{{ url('/viewBoq', $bchk->id) }}"
                                        class="btn btn-outline-secondary w-full sm:w-auto mr-2" aria-expanded="false"> <i
                                            data-lucide="eye" class="w-4 h-4"></i></a>
                                    <!-- BEGIN: Modal Toggle -->
                                    <div class="text-center">
                                        @if ($bchk->status == '2')
                                            <button id="btn_approve" value="{{ $bchk->id }}" data-tw-toggle="modal"
                                                data-tw-target="#large-modal-size-preview" class="btn btn-secondary"
                                                disabled><i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit</button>
                                        @else
                                            <button id="btn_approve" value="{{ $bchk->id }}" data-tw-toggle="modal"
                                                data-tw-target="#large-modal-size-preview" class="btn btn-secondary"><i
                                                    data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit</button>
                                        @endif
                                    </div>
                                    <!-- END: Modal Toggle -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- END: HTML Table Data -->

    <!-- BEGIN: Modal Content -->
    <div id="large-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <a data-tw-dismiss="modal" href="javascript:;">
                    <i data-lucide="x" class="w-8 h-8 text-slate-400"></i>
                </a>
                <div class="modal-body p-10">
                    <form action="{{ url('/approve_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-3">
                            <label class="">Status</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="status"
                                        value="2">
                                    <label class="form-check-label" for="radio-switch-4">Approve</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-6" class="form-check-input" type="radio" name="status"
                                        value="3">
                                    <label class="form-check-label" for="radio-switch-6">Reject</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="status"
                                        value="4">
                                    <label class="form-check-label" for="radio-switch-5">Rework</label>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto form-input mt-3">
                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Comment
                            </label>
                            <div class="text-center">
                                <textarea class="form-control form-control-sm" name="comment" id="comment" rows="3" class=""
                                    placeholder="ถ้ามี..."></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="boq_id" name="boq_id">
                        <div class="grid justify-items-end mt-3">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).on('click', '#btn_approve', function() {
            var boq_id = $(this).val();
            $('#boq_id').val(boq_id);
            jQuery('#large-modal-size-preview').show();
        });
    </script>
@endsection
