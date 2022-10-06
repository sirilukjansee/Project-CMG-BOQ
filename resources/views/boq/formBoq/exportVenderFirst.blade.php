{{-- <th>
    <img src="public/logo/DRAFT.png" width="1000px" height="1000px" alt="">
</th> --}}
<table>
    <thead>
        <tr>
            <th><img src="public/logo/logo-cmg.jpg" width="63px" height="67px" alt=""></th>
            <th><b>CENTRAL TRADING CO.,LTD.</b></th>
        </tr>
        <tr>
            <th></th>
            <th>3388/26-27 SIRIRAT BUILDING 9-11th. FLOOR RAMA 4 ROAD,</th>
        </tr>
        <tr>
            <th></th>
            <th>KLONG-TON, KLONG-TOEY, BANGKOK 10110</th>
        </tr>
        <tr>
            <th></th>
            <th>TEL: 0-2229-7000, FAX: 0-2367-5414</th>
        </tr>
        <tr>
            <th colspan="2" style="height: 30px;"><b>เอกสารแจ้งสอบราคางานตกแต่งภายใน (Bill Of Quantity)</b></th>
        </tr>
    </thead>
</table>
<table style="border: 1px solid black; border-collapse: collapse;">
    <thead>
        <tr>
            <th><b>โครงการ</b></th>
            <th colspan="3">{{ @$export_boq->project->brand_master->brand_name }}</th>
            <th style="width: 120px;"><b>ชื่อผู้เสนอราคา</b></th>
            <th colspan="3">{{ @$export_boq->vender_name->name }}</th>
        </tr>
        <tr>
            <th><b>สถานที่</b></th>
            <th colspan="3">{{ @$export_boq->project->location_master->location_name }}</th>
            <th style="width: 120px;"><b>ขนาดพื้นที่</b></th>
            <th colspan="3">{{ @$export_boq->project->area }} ตร.ม</th>
        </tr>
        <tr>
            <th style="text-align:center; background-color:gray">รายการ</th>
            <th style="text-align:center; width:700px; background-color:gray">รายระเอียด</th>
            <th style="text-align:center; background-color:gray">จำนวน</th>
            <th style="text-align:center; background-color:gray">หน่วย</th>
            <th style="text-align:center; background-color:gray" colspan="3">ราคาต่อหน่วย</th>
            <th style="text-align:center; width:100px; background-color:gray">ราคารวม</th>
            <th style="text-align:center; width:200px; background-color:gray">หมายเหตุ</th>
        </tr>
        <tr>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
            <th style="text-align:center; background-color:gray">ค่าวัสดุ</th>
            <th style="text-align:center; background-color:gray">ค่าแรง</th>
            <th style="text-align:center; background-color:gray">รวม</th>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
        </tr>
    </thead>
    <tbody>

        @foreach ( $catagorie as $key => $cat )
            @php
                $number = 0;
                $total = 0;
            @endphp
            <tr>
                <td style="height: 30px; text-align:center;">{{ $key + 1 }}</td>
                <td style="height: 30px;"><b>{{ $cat->name }}</b></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
            </tr>
            @foreach ( $exp_detail as $keysub => $sub )
                @if ( $sub->main_id == $cat->id )
                    <tr>
                        <td style="text-align:center;">{{ $key + 1 }}.{{ $number += 1 }}</td>
                        <td>{{ @$sub->cat_sub->name }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->amount }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->unit_u->unit_name }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->wage_cost }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->material_cost }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->each_unit }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->all_unit }}</td>
                        <td style="height: 30px;">{{ $sub->desc }}</td>
                    </tr>
                    @php
                        $total += $sub->all_unit;
                    @endphp
                @endif
            @endforeach
            <tr>
                <td colspan="9"></td>
            </tr>
            <tr>
                <td style="background-color:gray"></td>
                <td style="height: 30px; background-color:gray; text-align:right;"><b>TOTAL {{ $cat->name }} WORK</b></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray; text-align:center;">{{ $total }}</td>
                <td style="height: 30px; background-color:gray"></td>
            </tr>
            <tr>
                <td colspan="9"></td>
            </tr>
        @endforeach
    </tbody>
</table>
