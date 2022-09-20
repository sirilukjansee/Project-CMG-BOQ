<?php

namespace App\Imports;

use App\Models\design_and_pm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DesignersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = design_and_pm::where('name', $row['name'])->first();
        if ($chk) {
            design_and_pm::where('id', $chk->id)->update([
                'name' => $row['name'],
                'email' => $row['email'],
                'tel' => $row['tel'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new design_and_pm([
                'name' => $row['name'],
                'email' => $row['email'],
                'tel' => $row['tel'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
