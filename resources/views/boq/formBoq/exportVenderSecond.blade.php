<table>
    <thead>
        <tr></tr>
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
            <th style="width: 120px;">{{ @$export_boq->project->brand_master->brand_name }}</th>
            <th></th>
            <th></th>
            <th style="width: 120px;"><b>Vender</b></th>
            <th style="width: 120px;">{{ @$export_boq->vender_name->name }}</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th style="width: 120px;"><b>Location</b></th>
            <th colspan="3">{{ @$export_boq->project->location_master->location_name }}</th>
            <th style="width: 120px;"><b>Area</b></th>
            <th colspan="3">{{ @$export_boq->project->area }} ตร.ม</th>
        </tr>
        <tr>
            <th style="width: 120px;"><b>Task Name</b></th>
            <th colspan="3">{{ @$export_boq->project->task_name_master->task_name }}</th>
            <th style="width: 120px;"><b>Task Type</b></th>
            <th colspan="3">{{ @$export_boq->project->task_type_master->task_type_name }}</th>
        </tr>
        <tr>
            <th style="width: 120px;"><b>วันที่เข้าทำงาน</b></th>
            <th colspan="3">{{ Carbon\Carbon::parse(@$export_boq->project->start_date)->format('d M y') }}</th>
            <th style="width: 120px;"><b>วันที่ส่งมอบร้าน</b></th>
            <th colspan="3">{{ Carbon\Carbon::parse(@$export_boq->project->open_date)->format('d M y') }}</th>
        </tr>
        <tr>
            <th style="width: 120px;"><b>DESIGNER/PM</b></th>
            <th colspan="3">{{ @$export_boq->project->designer_master->name }}.{{ @$export_boq->project->designer_master->email }}.{{ @$export_boq->project->designer_master->tel }}</th>
            <th style="width: 120px;"><b>เวลาทำงาน</b></th>
            <th colspan="3">{{ @$export_boq->project->all_date }} Day</th>
        </tr>
    </thead>
    <thead>
        <tr>
            <th style="text-align:center; height: 30px;"><b>ข้อกำหนด: </b></th>
            <th colspan="4"><b></b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $exp_tor as $key => $ex )
            @php
                $number = 0;
            @endphp
            <tr>
                <td style="text-align:center; height: 30px;">{{ $key + 1 }}</td>
                <td colspan="4"style="height: 30px;"><b>{{ Str::substr(@$ex->message, 0, 101) }}</b></td>
            </tr>
            @if ( $ex->id == "3" )
                <tr>
                    <td></td>
                    <td colspan="4"style="height: 30px;"><b>{{ Str::substr(@$ex->message, 101) }}</b></td>
                </tr>
            @endif
                @foreach ( $ex->tor as $keytor => $ext )
                    @if ( $ext->is_active == "1" )
                        @if ( $ext->tor_id == $ex->id )
                            <tr>
                                <td style="height: 30px;"></td>
                                <td colspan="4" style="height: 30px;">{{ $key + 1 }}.{{ $number += 1 }} {{ Str::substr(@$ext->message, 0, 100) }}</td>
                            </tr>
                            @if ( $ext->id == "1" || $ext->id == "7" )
                                <tr>
                                    <td></td>
                                    <td colspan="4" style="height: 30px;">{{ Str::substr(@$ext->message, 100) }}</td>
                                </tr>
                            @endif
                        @endif
                    @endif

                @endforeach
        @endforeach
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;" colspan="2">ติดต่อ PM. ผู้ดูแลโครงการ {{ @$export_boq->project->designer_master->name }}</td>
            <td style="height: 30px;">โทร {{ @$export_boq->project->designer_master->tel }}</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td></td>
            <td style="height: 30px;" colspan="2">ลงชื่อ...............</td>
            <td style="height: 30px;">ลงชื่อ...............</td>
        </tr>
        <tr>
            <td></td>
            <td style="height: 30px;" colspan="1">ผู้จัดทำ BOQ - IDC<td>
            <td style="height: 30px;">Manager - IDC</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th style="background-color:gray; height: 30px;">รายการ</th>
            <th style="width:700px; background-color:gray; height: 30px;">รายระเอียด</th>
            <th style="text-align:center; background-color:gray; height: 30px;">จำนวน</th>
            <th style="text-align:center; background-color:gray; height: 30px;">หน่วย</th>
            <th style="text-align:center; background-color:gray; height: 30px;" colspan="3">ราคารวม</th>
            <th style="background-color:gray; height: 30px;"></th>
        </tr>
    </thead>
    <tbody>
        @php
        $total_p = 0;
        $sub_t = 0;
        $vat = 0;

        @endphp
        @foreach ( $catagorie as $key => $cat )
            @php
                $number = 0;
                $counts = 0;
                $total = 0;

                foreach ( $exp_detail as $exc ) {
                  $total = App\Models\Import_vender_detail::where('import_id', $export_boq->id)
                    ->where('main_id', $cat->id)
                    ->sum('all_unit');
                    if ( $exc->main_id == $cat->id ){
                        $counts = 1;
                    }
                }
                $total_p += $total;

            @endphp
                <tr>
                    <td style="height: 30px; text-align:center;">{{ $key + 1 }}</td>
                    <td style="height: 30px;"><b>{{ @$cat->name }}</b></td>
                    <td style="text-align:center; height: 30px;"><b>{{ number_format($counts, 2) }}</b></td>
                    <td style="text-align:center; height: 30px;">งาน</td>
                    <td style="text-align:center; height: 30px;" colspan="3">{{ number_format($total, 2) }}</td>
                    <td style="height: 30px;"></td>
                    <td style="height: 30px;"></td>
                    <td style="height: 30px;"></td>
                    <td style="height: 30px;"></td>
                    <td style="height: 30px;"></td>
                    <td style="height: 30px;"></td>
                </tr>
        @endforeach
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
            <td style="text-align:right; height: 30px;" colspan="3"><b>TOTAL PRICE</b></td>
            <td style="text-align:center; height: 30px;" colspan="3">{{ number_format($total_p, 2) }}</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
            <td style="text-align:right; height: 30px;" colspan="3"><b>OVER HEAD</b></td>
            <td style="text-align:center; height: 30px;" colspan="3">{{ number_format(@$export_boq->overhead, 2) }}</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
            <td style="text-align:right; height: 30px;" colspan="3"><b>COMMERCIAL DISCOUNT</b></td>
            <td style="text-align:center; height: 30px;" colspan="3">{{ number_format(@$export_boq->discount, 2) }}</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
            <td style="text-align:right; height: 30px;" colspan="3"><b>SUB TOTAL</b></td>
            <td style="text-align:center; height: 30px;" colspan="3">{{ number_format($sub_t = $total_p + $export_boq->overhead - $export_boq->discount, 2)}}</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
            <td style="text-align:right; height: 30px;" colspan="3"><b>VAT 7%</b></td>
            <td style="text-align:center; height: 30px;" colspan="3">{{ number_format($vat = $sub_t * 7 / 100, 2) }}</td>
        </tr>
        <tr>
            <td contenteditable="true" style="text-align:right; background-color:gray; height: 30px;" colspan="4"><b>GRAND TOTAL</b></td>
            <td style="text-align:center; background-color:gray; height: 30px;" colspan="3">{{ number_format($vat + $sub_t, 2) }}</td>
            <td style="background-color:gray; height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
        <tr>
            <td></td>
            <td style="height: 30px;" colspan="2">ลงชื่อ...............</td>
            <td style="height: 30px;">ลงชื่อ...............</td>
        </tr>
        <tr>
            <td></td>
            <td style="height: 30px;" colspan="1">ผู้จัดทำ BOQ - IDC<td>
            <td style="height: 30px;">Manager - IDC</td>
        </tr>
        <tr>
            <td style="height: 30px;"></td>
        </tr>
    </tbody>
</table>
