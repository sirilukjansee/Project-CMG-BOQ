<?php

namespace App\Imports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = Unit::where('unit_name', $row['unit_name'])->first();
        if ($chk) {
            Unit::where('id', $chk->id)->update([
                'unit_name' => $row['unit_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new Unit([
                'unit_name' => $row['unit_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
