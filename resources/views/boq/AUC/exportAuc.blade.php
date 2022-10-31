<table>
    <thead>
        @php
            $pro_a = App\Models\Project::where('id', $project_id)->first();
        @endphp
        <tr>
            <th colspan="11" style="text-align: center; height: 75px;"><b>{{@$pro_a->task_type_master->task_type_name}} : {{ @$pro_a->brand_master->brand_name }} - {{ @$pro_a->location_master->location_name }}</b></th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th></th>       {{-- empty --}}
            <th></th>       {{-- empty --}}
            <th style="text-align:center; height: 30px; width:700px;">รายการ</th>
            <th style="text-align:center; height: 30px; width:100px;">จำนวน</th>
            <th style="text-align:center; width: 100px;">หน่วย</th>
            <th style="text-align:center; height: 30px; width:100px;">ค่าวัสดุ</th>
            <th style="text-align:center; height: 30px; width:100px;">ค่าแรง</th>
            <th style="text-align:center; height: 30px; width:100px;">รวมต่อหน่วย</th>
            <th style="text-align:center; height: 30px; width:100px;">รวม</th>
            <th style="text-align:center; height: 30px; width:300px;">หมายเหตุ</th>
            <th style="text-align:center; height: 30px; width:100px;">Remark</th>
            <th style="text-align:center; height: 30px; width:100px;">Vender</th>
        </tr>
    </thead>
    <tbody>
        @php
            $main_a = App\Models\catagory::where('is_active', "1")->get();
            $auc_m = App\Models\ExportAuc::where('project_id', $project_id)->get();
        @endphp
        @foreach ( $auc_m as $key => $acm )
            @if ( $acm->remark == "All" )
                @php
                    $sub = App\Models\Boq::where('template_boq_id', $acm->template_id)
                    ->where('main_id', $acm->main_id)
                    ->first();
                    $chk_unq[] = $sub->main_id;
                @endphp
            @else
            @php
                $sub2 = App\Models\Boq::where('template_boq_id', $acm->template_id)
                ->where('main_id', $acm->boq_a->main_id)
                ->first();
                $chk_unq[] = $sub2->main_id;
            @endphp
            @endif
        @endforeach
        @php
            $uniq = array_unique($chk_unq);
        @endphp
        @foreach ( $main_a as $key => $main )
            @foreach ( $uniq as $u )
                @if ( $u == $main->id)
                    <tr>
                        <td></td>
                        <td colspan="2" style="height: 35px;"><b>{{$main->name}}</b></td>
                    </tr>
                @endif
            @endforeach
            @foreach ( $auc_m as $key => $auc )
                @if ( $auc->main_id == $main->id || @$auc->boq_a->main_id == $main->id )
                    @if ( $auc->remark == "All" )
                        @php
                            $sub = App\Models\Boq::where('template_boq_id', $auc->template_id)
                            ->where('main_id', $auc->main_id)
                            ->get();
                        @endphp
                        @foreach ( $sub as $key => $sb )
                            @if ($sb->template->name == "Master BOQ")
                            <tr>
                                {{-- check all master --}}
                                <td style="height: 30px;"></td>      {{-- empty --}}
                                <td style="height: 30px;"></td>      {{-- empty --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->cat_sub->name}}</td>
                                <td style="height: 30px; text-align:center;">{{@$sb->template->vender_auc->vender_d->amount}}</td>   {{-- จำนวน --}}
                                <td style="height: 30px; text-align:center;">{{@$sb->template->vender_auc->vender_d->unit_u->unit_name}}</td>   {{-- หน่วย --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->material_cost}}</td>   {{-- ค่าวัสดุ --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->wage_cost}}</td>   {{-- ค่าแรง --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->each_unit}}</td>   {{-- ต่อหน่วย --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->all_unit}}</td>   {{-- รวม --}}
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_d->desc}}</td>   {{-- หมายเหตุ --}}
                                <td style="height: 30px; text-align:center;">{{@$sb->template->name}}</td>
                                <td style="height: 30px;">{{@$sb->template->vender_auc->vender_name->name}}</td>
                            </tr>
                            @else
                            <tr>
                                {{-- check all addi --}}
                                <td style="height: 30px;"></td>      {{-- empty --}}
                                <td style="height: 30px;"></td>      {{-- empty --}}
                                <td style="height: 30px;">{{@$sb->sub_cata->name}}</td>
                                <td style="height: 30px; text-align:center;">{{@$sb->amount}}</td>   {{-- จำนวน --}}
                                <td style="height: 30px; text-align:center;">{{@$sb->unit_u->unit_name}}</td>   {{-- หน่วย --}}
                                <td style="height: 30px;">{{@$sb->material_cost}}</td>   {{-- ค่าวัสดุ --}}
                                <td style="height: 30px;">{{@$sb->wage_cost}}</td>   {{-- ค่าแรง --}}
                                <td style="height: 30px;">{{@$sb->each_unit}}</td>   {{-- ต่อหน่วย --}}
                                <td style="height: 30px;">{{@$sb->all_unit}}</td>   {{-- รวม --}}
                                <td style="height: 30px;">{{@$sb->desc}}</td>   {{-- หมายเหตุ --}}
                                <td style="height: 30px; text-align:center;">{{@$sb->template->name}}</td>
                                <td style="height: 30px;">{{@$sb->auc_t->vender_name->name}}</td>
                            </tr>
                            @endif
                        @endforeach
                        @elseif ( $auc->boq_a->template->name == "Master BOQ" )
                        <tr>
                            {{-- check sub master --}}
                            <td style="height: 30px;"></td>      {{-- empty --}}
                            <td style="height: 30px;"></td>      {{-- empty --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->cat_sub->name}}</td>
                            <td style="height: 30px; text-align:center;">{{@$auc->boq_a->template->vender_auc->vender_d->amount}}</td>   {{-- จำนวน --}}
                            <td style="height: 30px; text-align:center;">{{@$auc->boq_a->template->vender_auc->vender_d->unit_u->unit_name}}</td>   {{-- หน่วย --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->material_cost}}</td>   {{-- ค่าวัสดุ --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->wage_cost}}</td>   {{-- ค่าแรง --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->each_unit}}</td>   {{-- ต่อหน่วย --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->all_unit}}</td>   {{-- รวม --}}
                            <td style="height: 30px;">{{@$auc->boq_a->template->vender_auc->vender_d->desc}}</td>   {{-- หมายเหตุ --}}
                            <td style="height: 30px; text-align:center;">{{@$auc->temp_a->name}}</td>
                            <td style="height: 30px;">{{@$auc->pro_a->vender_name->name}}</td>
                        </tr>
                        @else
                        <tr>
                            {{-- check sub addi --}}
                            <td style="height: 30px;"></td>      {{-- empty --}}
                            <td style="height: 30px;"></td>      {{-- empty --}}
                            <td style="height: 30px;">{{@$auc->boq_a->sub_cata->name}}</td>
                            <td style="height: 30px; text-align:center;">{{@$auc->boq_a->amount}}</td>   {{-- จำนวน --}}
                            <td style="height: 30px; text-align:center;">{{@$auc->boq_a->unit_u->unit_name}}</td>   {{-- หน่วย --}}
                            <td style="height: 30px;">{{@$auc->boq_a->material_cost}}</td>   {{-- ค่าวัสดุ --}}
                            <td style="height: 30px;">{{@$auc->boq_a->wage_cost}}</td>   {{-- ค่าแรง --}}
                            <td style="height: 30px;">{{@$auc->boq_a->each_unit}}</td>   {{-- ต่อหน่วย --}}
                            <td style="height: 30px;">{{@$auc->boq_a->all_unit}}</td>   {{-- รวม --}}
                            <td style="height: 30px;">{{@$auc->boq_a->desc}}</td>   {{-- หมายเหตุ --}}
                            <td style="height: 30px; text-align:center;">{{@$auc->temp_a->name}}</td>
                            <td style="height: 30px;">{{@$auc->temp_a->vender_auc2->vender_name->name}}</td>
                        </tr>
                    @endif
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>
