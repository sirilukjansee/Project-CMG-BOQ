<?php

namespace App\Imports;

use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use App\Models\Vender;
use App\Models\template_boqs;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BoqVendersImport;

class FirstBoqVendersImport implements ToModel, WithMappedCells
{
    protected $project_id;
    protected $vender_id;

    function __construct($project_id,$vender_id)
    {
        $this->project_id = $project_id;
        $this->vender_id = $vender_id;
    }

    public function mapping(): array
    {
        return [
            'row5' => 'D7',
        ];
    }

    public function model(array $row)
    {

            if( $row['row5'] != null )
        {

            $_SESSION["imp"] = Import_vender::create([
                'id_project' => $this->project_id,
                'id_vender' => $this->vender_id,
            ])->id;
        }else{
            // return back()->with('error', "eee");
        }


    }
}
