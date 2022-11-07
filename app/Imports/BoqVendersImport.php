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
            $unt = Unit::where('unit_name', $row[3])->first();
            if( $impvd )
            {
                $_SESSION["idimp"] = $impvd->id ;
            }
            else{
                $_SESSION["idimp"] = 1;
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
                    'amount' => $row[2],
                    'unit_id' => $unt->id,
                    'wage_cost' => number_format($row[4], 2),
                    'material_cost' => number_format($row[5], 2),
                    'each_unit' => number_format($row[4], 2) + number_format($row[5], 2),
                    'all_unit' => (number_format($row[4], 2) + number_format($row[5], 2)) * $row[2],
                    'desc' => $row[8],
                ]);
            }
        }
        // $_SESSION["value"] = 1;

        if( !is_null($row[7]) && $row[6] == "OVERHEAD" )
        {
            $impvd1 = Import_vender::orderBy('id', 'desc')->first();
            Import_vender::where('id', $impvd1->id)->update([
                'overhead' => number_format($row[7], 2),
                // 'discount' => $row[7],
            ]);
        }
        if( !is_null($row[7]) && $row[6] == "COMMERCIAL DISCOUNT" )
        {
            $impvd1 = Import_vender::orderBy('id', 'desc')->first();
            Import_vender::where('id', $impvd1->id)->update([
                // 'overhead' => $row[7],
                'discount' => number_format($row[7], 2),
            ]);
        }
    }

    // public function sheets(): array
    // {
    //     return[
    //         new BoqsExport(),
    //         new SheetsExport()
    //     ];
    // }
}
