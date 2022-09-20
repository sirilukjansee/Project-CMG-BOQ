<?php

namespace App\Imports;

use App\Models\Vender;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = Vender::where('name', $row['name'])->first();
        if ($chk) {
            Vender::where('id', $chk->id)->update([
                'name' => $row['name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new Vender([
                'name' => $row['name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
