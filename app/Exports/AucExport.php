<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\catagory;
use App\Models\template_boqs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class AucExport implements FromView, WithTitle
{
    protected $project_id;

    function __construct($project_id) {
        $this->project_id = $project_id;
    }


    // public function collection()
    // {
    //     foreach( $this->chk_m as $key => $chkm )
    //     {
    //         $boq_a = Boq::
    //         dd($key);
    //     }
    //     return Boq::all();
    // }

    public function view(): View
    {
        return view('boq.AUC.exportAuc',[
            'project_id' => $this->project_id,
        ]);
    }

    public function title(): string
    {
        return 'AUC';
    }
}
