<?php

namespace App\Imports;

use App\Models\catagory_sub;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategorySubsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = catagory_sub::where('code', $row['code'])->first();
        if ($chk) {
            catagory_sub::where('id', $chk->id)->update([
                'code' => $row['code'],
                'catagory_id' => $row['category'],
                'name' => $row['name'],
                'brand_id' => $row['brand'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new catagory_sub([
                'code' => $row['code'],
                'catagory_id' => $row['category'],
                'name' => $row['name'],
                'brand_id' => $row['brand'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
