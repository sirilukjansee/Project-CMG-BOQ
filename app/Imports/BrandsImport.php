<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = Brand::where('brand_name', $row['brand_name'])->first();
        if ($chk) {
            Brand::where('id', $chk->id)->update([
                // 'code' => $row['code'],
                'brand_name' => $row['brand_name'],
                // "is_active" => $row['is_active'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new Brand([
                // 'code' => $row['code'],
                'brand_name' => $row['brand_name'],
                // "is_active" => $row['is_active'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }

    }
}
