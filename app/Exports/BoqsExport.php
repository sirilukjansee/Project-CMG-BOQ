<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\template_boqs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class BoqsExport implements FromView, WithTitle, WithEvents
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

    public function view(): View
    {
         return view('boq.formBoq.exportBoq', [
            'export_boq' => $this->export_boq,
            'catagorie' => $this->catagorie,
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
