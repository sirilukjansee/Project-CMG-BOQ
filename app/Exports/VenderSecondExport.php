<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\template_boqs;
use App\Models\MasterTOR;
use App\Models\MasterTOR_Detail;
use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;

class VenderSecondExport implements FromView, WithTitle, WithEvents
{
    protected $export_boq;
    protected $catagorie;

    function __construct($export_boq,$catagorie) {
        $this->export_boq = $export_boq;
        $this->catagorie = $catagorie;
    }

    public function view(): View
    {
        $exp_tor = MasterTOR::where('is_active', "1")
        ->get();

        $exp_detail = Import_vender_detail::where('import_id', $this->export_boq->id)
        ->get();

         return view('boq.formBoq.exportVenderFirst', [
            'export_boq' => $this->export_boq,
            'catagorie' => $this->catagorie,
            'exp_tor' => $exp_tor,
            'exp_detail' => $exp_detail,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $workSheet = $event->sheet->getDelegate();
                $workSheet->freezePane('A11'); // freezing here
            },
        ];
    }

    public function title(): string
    {
        return 'เอกสารแนบ';
    }
}
