<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleBoqExport_1 implements WithMultipleSheets
{
    use Exportable;

    protected $catagorie;
    protected $export_boq;
    protected $exp_tor;

    function __construct($export_boq,$catagorie) {
        $this->export_boq = $export_boq;
        $this->catagorie = $catagorie;
    }

    public function sheets(): array
    {
        return[
            new BoqsExport_1($this->export_boq,$this->catagorie),
            new SheetsExport_1($this->catagorie,$this->export_boq,$this->exp_tor),
        ];
    }

}
