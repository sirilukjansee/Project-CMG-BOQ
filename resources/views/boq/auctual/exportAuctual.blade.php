<table>
    <thead>
        @php
            $pro_a = App\Models\Project::where('id', $id)->first();
            // dd($pro_a);
        @endphp
        <tr>
            <th colspan="19" style="text-align: center; height: 75px;"><b>Auctual {{@$pro_a->task_type_master->task_type_name}} : {{ @$pro_a->brand_master->brand_name }} - {{ @$pro_a->location_master->location_name }}</b></th>
        </tr>
    </thead>
{{-- </table> --}}
@php
    $aut_x = App\Models\Auctual::where('project_id', $id)->get();
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
    @foreach ( $aut_x as $key => $atx )
        <tr>
            <th style="text-align: center;">{{ $key + 1 }}</th>
            <td colspan="12" style="height: 30px;">{{ $atx->catagory->name }}</td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($atx->total, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;">{{ $atx->remark }}</td>
        </tr>
    @endforeach
    @php
        $atx = App\Models\Auctual::where('project_id', $id)->get();
        $tt = $atx->sum('total');

        $tot1 = App\Models\Auctual::where('project_id', $id)
                ->whereIn('boq_id', ['7','1']) // id ของ catagory
                ->sum('total');
        // dd($tt);
    @endphp
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
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Contruction</b></td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Contruction</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tot1, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="12" style="height: 30px; text-align:right;"><b>Total Cost/Sq.m</b></td>
            <td colspan="3" style="height: 30px; text-align: right;">{{ number_format($tot1 /$pro_a->area, 2) }}</td>
            <td colspan="3" style="height: 30px; text-align:right;"></td>
        </tr>
    </tbody>
</table>
