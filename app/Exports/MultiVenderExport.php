<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiVenderExport implements WithMultipleSheets
{
    use Exportable;

    protected $catagorie;
    protected $export_boq;

    function __construct($export_boq,$catagorie) {
        $this->catagorie = $catagorie;
        $this->export_boq = $export_boq;
    }

    public function sheets(): array
    {
        return[
            new VenderSecondExport($this->export_boq,$this->catagorie),
            new VenderFirstExport($this->export_boq,$this->catagorie),
        ];
    }
}
