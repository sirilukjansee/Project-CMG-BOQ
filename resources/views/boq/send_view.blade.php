<table style="border-collapse: collapse;">
    <thead>
        <tr>
            <th><b>IO|Task Type|Brand name|Task Name|Location|Open date Project|SQM|Designer|Project status</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $export_project as $key => $exp )
            <tr>
                <td>{{ $exp->io }}|{{ @$exp->task_type_master->task_type_name }}|
                    {{ @$exp->brand_master->brand_name }}|{{ @$exp->task_name_master->task_name }}|{{ $exp->open_date }}|
                    {{ $exp->area }}|{{ @$exp->designer_master->name }}|
                    @if (@$exp->project_id1->name == "Master BOQ")
                        @if (@$exp->project_id1->status == '0')
                            Drafted
                        @elseif (@$exp->project_id1->status == '1')
                            Waiting Approval
                        @elseif (@$exp->project_id1->status == '2')
                            Approval
                        @elseif (@$exp->project_id1->status == '3')
                            Reject
                        @elseif (@$exp->project_id1->status == '4')
                            Rework
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
