<?php

namespace App\Imports;

use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use App\Models\catagory;
use App\Models\catagory_sub;
use App\Models\Unit;
use App\Models\Vender;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;


class BoqVendersImport implements ToModel
{
    protected $project_id;

    function __construct($project_id)
    {
        $this->project_id = $project_id;
    }

    public function model(array $row)
    {
        // $vds = Vender::where('name', $row[5] )->first();
        // if( $vds && $row[5] != null )
        // {
        //     $_SESSION["vds"] = $vds->id;
        //     // dd($vds);
        //         $imp = Import_vender::create([
        //             'id_project' => $this->project_id,
        //             'id_vender' => $_SESSION["vds"],
        //             // 'overhead' => $row[4],
        //             // 'discount' => $row[4],
        //         ]);
        // }

        $cat_s = catagory_sub::where('name', $row[1])->first();

        if( is_numeric($row[0]) || floor($row[0]) == 1 )
        {
            $impvd = Import_vender::orderBy('id', 'desc')->first();
            $cat = catagory::where('name', $row[1])->first();
            $unt = Unit::where('unit_name', $row[3])->first();
            // dd($impvd);
            if( $impvd )
            {
                $_SESSION["idimp"] = $impvd->id ;
            }
            // else{
            //     $_SESSION["idimp"] = 1;
            // }
            if( $cat )
            {
                $_SESSION["cat"] = $cat->id;
            }
            if( $row[2] != null && $cat_s != null )
            {
                $chk = Import_vender_detail::create([
                    'import_id' => $_SESSION["idimp"],
                    'main_id' => $_SESSION["cat"],
                    'sub_id' => $cat_s->id,
                    'amount' => $row[2],
                    'unit_id' => $unt->id,
                    'wage_cost' => $row[4],
                    'material_cost' => $row[5],
                    'each_unit' => $row[6],
                    'all_unit' => $row[7],
                    'desc' => $row[8],
                ]);
            }
        }

        // $vds = Vender::where('name', $row[5] )->first();
        // if( $vds && $row[5] != null)
        // {
        //     $_SESSION["vds"] = $vds->id;
        //     // dd($vds);

        //     return new Import_vender([
        //         'id_project' => $this->project_id,
        //         'id_vender' => $_SESSION["vds"],
        //         // 'remark' => $row['a3'],
        //         // 'create_by' => 2,
        //     ]);
        // }

    }

    // public function sheets(): array
    // {
    //     return[
    //         new BoqsExport(),
    //         new SheetsExport()
    //     ];
    // }
}
