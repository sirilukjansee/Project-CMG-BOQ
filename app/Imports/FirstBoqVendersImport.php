<?php

namespace App\Imports;

use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use App\Models\Vender;
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
            'row5' => 'E7',
            'row4' => 'E53',
            // 'OVERHEAD'  => 'E53',
            // 'DISCOUNT' => 'E54',
        ];
    }

    public function model(array $row)
    {

        if( $row['row5'] != null )
        {
            // $vds = Vender::where('name', $row['row5'] )->first();
            // if( $vds )
            // {
                // $_SESSION["vds"] = $vds->id;
                // if( is_numeric($row['row4']) )
                // {
                    // dd($_SESSION["vds"]);
                $_SESSION["imp"] = Import_vender::create([
                    'id_project' => $this->project_id,
                    'id_vender' => $this->vender_id,
                    // 'overhead' => $row[4],
                    // 'discount' => $row[4],
                ])->id;
                // }
            // }

        }
        // if( is_numeric($row['row4']) )
        // {
        //     // dd($row[4]);
        //     Import_vender::where('id', $_SESSION["imp"])->update([
        //         'overhead' => $row['OVERHEAD'],
        //         'discount' => $row['DISCOUNT'],
        //     ]);
        // }
        // $name = "BoqVendersImport";

        // new MultiSheetImport(78);
        // Excel::import(new MultiSheetImport(79), $this->file);

    }

    // public function sheets(): array
    // {
    //     return [
    //        'เอกสารแนบ' => new BoqVendersImport(1),
    //     //    'ใบปะหน้า' => new FirstBoqVendersImport($this->project_id),
    //     ];
    // }
}
