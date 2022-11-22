<table>
    <thead>
        <tr>
            <th></th>
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
            <th style="width: 120px;"><b>โครงการ</b></th>
            <th colspan="1">{{ @$export_boq->project->brand_master->brand_name }}</th>
            <th style="width: 120px;"><b>ชื่อผู้เสนอราคา</b></th>
            <th style="text-align:right; background-color:burlywood" colspan="3"></th>
            <th style="width: 160px;"><b>OVERHEAD</b></th>
            <th>{{ $export_boq->overhead }}</th>
        </tr>
        <tr>
            <th style="width: 120px;"><b>สถานที่</b></th>
            <th colspan="1">{{ @$export_boq->project->location_master->location_name }}</th>
            <th style="width: 120px;"><b>ขนาดพื้นที่</b></th>
            <th colspan="3">{{ @$export_boq->project->area }} ตร.ม</th>
            <th style="width: 160px;"><b>COMMERCIAL DISCOUNT</b></th>
            <th>{{ $export_boq->discount }}</th>
        </tr>
        <tr>
            <th style="text-align:center; background-color:gray">รายการ</th>
            <th style="text-align:center; width:700px; background-color:gray">รายละเอียด</th>
            <th style="text-align:center; background-color:gray">กว้าง</th>
            <th style="text-align:center; background-color:gray">ยาว</th>
            <th style="text-align:center; background-color:gray">สูง</th>
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
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
            <th style="text-align:center; background-color:gray; width: 100px;">ค่าวัสดุ</th>
            <th style="text-align:center; background-color:gray; width: 100px;">ค่าแรง</th>
            <th style="text-align:center; background-color:gray; width: 100px;">รวม</th>
            <th style="background-color:gray"></th>
            <th style="background-color:gray"></th>
        </tr>
    </thead>
    <tbody>
        @php
            $number = 0;
            $chk_em = App\Models\Boq::where('template_boq_id', $export_boq->id)->get();
            $bq = App\Models\template_boqs::where('id', $export_boq->id)->get();
            // dd($bq);
        @endphp
        @foreach ( $catagorie  as $key => $cat )
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
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
                <td style="height: 30px;"></td>
            </tr>
            @foreach ( $chk_em as $keysub => $sub )
                @if ( $sub->main_id == $cat->id )
                    <tr>
                        <td style="text-align:center;">{{ $key + 1 }}.{{ $number += 1 }}</td>
                        <td>{{ @$sub->sub_cata->name }}</td>
                        <td style="text-align:center; height: 30px;">{{ $sub->width }}</td>
                        <td style="text-align:center; height: 30px;">{{ $sub->depth }}</td>
                        <td style="text-align:center; height: 30px;">{{ $sub->height }}</td>
                        <td style="text-align:center; height: 30px;">{{ $sub->amount }}</td>
                        <td style="text-align:center; height: 30px;">{{ @$sub->unit_u->unit_name }}</td>
                        <td style="text-align:center; height: 30px; background-color:burlywood">{{ $sub->wage_cost }}</td>
                        <td style="text-align:center; height: 30px; background-color:burlywood">{{ $sub->material_cost }}</td>
                        <td style="text-align:center; height: 30px; background-color:burlywood">{{ $sub->each_unit }}</td>
                        <td style="text-align:center; height: 30px; background-color:burlywood">{{ $sub->all_unit }}</td>
                        <td style="height: 30px;">{{ $sub->desc }}</td>
                    </tr>
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
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
                <td style="height: 30px; background-color:gray"></td>
            </tr>
            <tr>
                <td colspan="9"></td>
            </tr>
        @endforeach
    </tbody>
</table>
