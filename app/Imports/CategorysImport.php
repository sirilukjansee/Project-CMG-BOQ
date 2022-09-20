<?php

namespace App\Imports;

use App\Models\catagory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategorysImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = catagory::where('name', $row['name'])->first();
        if ($chk) {
            catagory::where('id', $chk->id)->update([
                'name' => $row['name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new catagory([
                'name' => $row['name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
