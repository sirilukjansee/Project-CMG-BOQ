<table>
    <thead>
        @php
            $pro_a = App\Models\Project::where('id', $id)->first();
            // dd($pro_a);
        @endphp
        <tr>
            <th colspan="19" style="text-align: center; height: 75px;"><b>Capex {{@$pro_a->task_type_master->task_type_name}} : {{ @$pro_a->brand_master->brand_name }} - {{ @$pro_a->location_master->location_name }}</b></th>
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
            <th colspan="3" style="text-align:center; height: 30px;">Remark</th>
        </tr>
    </thead>
    <tbody>
    @foreach ( $cat_x as $key => $ctx )
        <tr>
            <th style="text-align: center;">{{ $key + 1 }}</th>
            <td colspan="12" style="height: 30px;">{{ $ctx->catagory->name }}</td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($ctx->total, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;">{{ $ctx->remark }}</td>
        </tr>
    @endforeach
    @php
        $cpx = App\Models\Capex::where('project_id', $id)->get();
        $tt = $cpx->sum('total');

        $tot1 = App\Models\Capex::where('project_id', $id)
                ->whereIn('code_cat', ['Cat01','Cat02','Cat03','Cat04','Cat05','Cat06','Cat07','Cat08','Cat09','Cat10',
                                       'Cat11','Cat12','Cat13','Cat14','Cat15','Cat16','Cat17','Cat18','Cat20','Cat21']) // code ของ catagory
                ->sum('total');

        // dd($tt);
    @endphp
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Construction</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tot1, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Cost/Sq.m</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tot1 /$pro_a->area, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Investment</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tt, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Cost/Sq.m</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tt /$pro_a->area, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Investment Including VAT 7%</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format(($tt *7/100) + $tt, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
    </tbody>
</table>
