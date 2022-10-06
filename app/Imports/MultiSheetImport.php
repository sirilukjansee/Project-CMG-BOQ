<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetImport implements WithMultipleSheets
{
    protected $project_id;
    // protected $name;

    function __construct($project_id)
    {
        $this->project_id = $project_id;
        // $this->name = $name;
    }

    public function sheets(): array
    {
        // if( $this->name == "BoqVendersImport" )
        // {
        //     return [
        //            'เอกสารแนบ' => new BoqVendersImport($this->project_id),
        //             // 'ใบปะหน้า' => new FirstBoqVendersImport($this->project_id),
        //         ];
        // }else{
            return [
                 'เอกสารแนบ' => new BoqVendersImport($this->project_id),
                //  'ใบปะหน้า' => new FirstBoqVendersImport($this->project_id),
                ];
        // }
    }
}
