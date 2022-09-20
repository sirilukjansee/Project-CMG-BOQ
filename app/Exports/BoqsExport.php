<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\template_boqs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class BoqsExport implements FromView
{
    protected $export_boq;
    protected $catagorie;

    function __construct($export_boq,$catagorie) {
        $this->export_boq = $export_boq;
        $this->catagorie = $catagorie;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Boq::select('template_boq_id','main_id','sub_id',
    //     'amount','unit_id','desc','wage_cost','material_cost')->get();
    // }
    public function view(): View
    {
         return view('boq.formBoq.exportBoq', [
            'export_boq' => $this->export_boq,
            'catagorie' => $this->catagorie,
            // 'trip_sel_date' => $this->trip_sel_date,
            // 'user_head' => $this->user_head,
        ]);
    }

    // public function headings(): array
    // {
    //     return [
    //         'ID',
    //         'main_id',
    //         'sub_id',
    //         'amount',
    //         'unit_id',
    //         'desc',
    //         'wage_cost',
    //         'material_cost'
    //     ];
    // }

}
