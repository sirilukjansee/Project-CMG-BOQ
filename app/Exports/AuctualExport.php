<?php

namespace App\Exports;

use App\Models\auctuals;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AuctualExport implements FromView
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('boq.auctual.exportAuctual',[
            'id' => $this->id,
        ]);
    }
}
