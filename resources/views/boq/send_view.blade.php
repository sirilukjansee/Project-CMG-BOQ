<table style="border-collapse: collapse;">
    <thead>
        <tr>
            <th><b>IO|Task Type|Brand name|Task Name|Location|Open date Project|SQM|Designer|Project status|Flag</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $export_project as $key => $exp )
        @if (Carbon\Carbon::parse($exp->created_at)->format('d-m-Y') == Carbon\Carbon::today()->format('d-m-Y'))
        <tr>
            <td>{{ $exp->io }}|{{ @$exp->task_type_master->task_type_name }}|
                {{ @$exp->brand_master->brand_name }}|{{ @$exp->task_name_master->task_name }}|{{ @$exp->location_master->location_name }}|{{ Carbon\Carbon::parse($exp->open_date)->format('d.m.Y') }}|
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
                @endif|New
            </td>
        </tr>
        @elseif ( Carbon\Carbon::parse($exp->updated_at)->format('d-m-Y') == Carbon\Carbon::today()->format('d-m-Y') )
        <tr>
            <td>{{ $exp->io }}|{{ @$exp->task_type_master->task_type_name }}|
                {{ @$exp->brand_master->brand_name }}|{{ @$exp->task_name_master->task_name }}|{{ @$exp->location_master->location_name }}|{{ Carbon\Carbon::parse($exp->open_date)->format('d.m.Y') }}|
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
                @endif|Update
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
