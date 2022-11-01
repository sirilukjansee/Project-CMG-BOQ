<?php

namespace App\Exports;

use App\Models\Capex;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class CapexExport implements FromView
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('boq.Capex.exportCapex',[
            'id' => $this->id,
        ]);
    }
}
