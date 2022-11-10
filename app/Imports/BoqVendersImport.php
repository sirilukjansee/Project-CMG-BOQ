<?php

namespace App\Imports;

use App\Models\Import_vender;
use App\Models\template_boqs;
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

    // public function mapping(): array
    // {
    //     return [
    //         'OVERHEAD'  => 'H7',
    //         'DISCOUNT' => 'H8',
    //     ];
    // }

    public function model(array $row)
    {
        $cat_s = catagory_sub::where('name', $row[1])->first();

        if( is_numeric($row[0]) || floor($row[0]) == 1 )
        {
            $impvd = Import_vender::orderBy('id', 'desc')->first();
            $cat = catagory::where('name', $row[1])->first();
            $unt = Unit::where('unit_name', $row[6])->first();
            if( $impvd )
            {
                $_SESSION["idimp"] = $impvd->id ;
            }
            else{
                $_SESSION["idimp"] = 1;
                // $_SESSION["sum_p"] = Import_vender_detail::where('import_id', $_SESSION["idimp"])->sum('all_unit');
            }
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
                    'width' => $row[2],
                    'depth' => $row[3],
                    'height' => $row[4],
                    'amount' => $row[5],
                    'unit_id' => $unt->id,
                    'wage_cost' => $row[8],
                    'material_cost' => $row[7],
                    'each_unit' => $row[7] + $row[8],
                    'all_unit' => ($row[7] + $row[8]) * $row[5],
                    'desc' => $row[11],
                ]);

                $id_impvd = Import_vender::orderBy('id', 'desc')->first();
                $sum_p = Import_vender_detail::where('import_id', $id_impvd->id)->sum('all_unit');

                // $_SESSION["total"] += ($row[7] + $row[8]) * $row[5];
                // dd($_SESSION["total"]);
                Import_vender::where('id', $id_impvd->id)->update([
                    'budget' => $sum_p + $id_impvd->overhead - $id_impvd->discount,
                    // 'discount' => $row[7],
                ]);

            }
        }


        // dd($id_impvd->id);

        if( !is_null($row[7]) && $row[6] == "OVERHEAD" )
        {
            $impvd1 = Import_vender::orderBy('id', 'desc')->first();
            Import_vender::where('id', $impvd1->id)->update([
                'overhead' => $row[7],
                // 'discount' => $row[7],
            ]);
        }
        if( !is_null($row[7]) && $row[6] == "COMMERCIAL DISCOUNT" )
        {
            $impvd1 = Import_vender::orderBy('id', 'desc')->first();
            Import_vender::where('id', $impvd1->id)->update([
                // 'overhead' => $row[7],
                'discount' => $row[7],
            ]);
        }
    }
}
