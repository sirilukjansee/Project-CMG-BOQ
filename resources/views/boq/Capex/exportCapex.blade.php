<table>
    <thead>
        @php
            $pro_a = App\Models\Project::where('id', $id)->first();
        @endphp
        <tr>
            <th colspan="16" style="text-align: center; height: 75px;"><b>{{@$pro_a->task_type_master->task_type_name}} : {{ @$pro_a->brand_master->brand_name }} - {{ @$pro_a->location_master->location_name }}</b></th>
        </tr>
    </thead>
{{-- </table> --}}
@php
    $cat_x = App\Models\Capex::where('project_id', $id)->get();
    // $main_a = App\Models\catagory::where('is_active', "1")->get();
@endphp
{{-- <table> --}}
    <thead>
        <tr>
            <th></th>
            <th colspan="12" style="text-align:center; height: 30px;">ชื่อหมวด</th>
            <th colspan="3" style="text-align:center; height: 30px;">จำนวนเงิน</th>
        </tr>
    </thead>
    <tbody>
    @foreach ( $cat_x as $key => $ctx )
        <tr>
            <th style="text-align: center;">{{ $key + 1 }}</th>
            <td colspan="12" style="height: 30px;">{{ $ctx->catagory->name }}</td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($ctx->total, 2) }}</td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($cat_x->sum('total'), 2) }}</td>
        </tr>
    </tbody>
</table>
