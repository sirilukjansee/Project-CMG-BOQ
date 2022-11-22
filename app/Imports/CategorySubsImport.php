<?php

namespace App\Imports;

use App\Models\catagory_sub;
use App\Models\catagory;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
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
        if (strtoupper($row['brand']) == "COMMON") {
            $chk_brand = '';
        }else{
            $chk_brand = Brand::where('brand_name', $row['brand'])->select('id')->first();
        }

        if ($row['name']) {
            if ($chk) {
                // dd($chk->code);

                    catagory_sub::where('id', $chk->id)->update([
                        'code_cat' => $row['code_cat'],
                        'code' => $row['code'],
                        // 'catagory_id' => $chk->id,
                        'name' => $row['name'],
                        'brand_id' => $chk_brand,
                        'is_active' => "1",
                        'code_criteria' => $row['code_criteria'],
                        'update_by' => Auth::user()->id,
                    ]);
                }else{
                    $chk2 = catagory::where('code', $row['code_cat'])->first();
                    $chk_brand2 = Brand::where('brand_name', $row['brand'])->first();
                    if ($chk_brand2) {
                        $brand = $chk_brand2->id;
                    }else {
                        $brand = "";
                    }
                    // dd($row['name']);
                    return new catagory_sub([
                        'code_cat' => $row['code_cat'],
                        'code' => $row['code'],
                        'code_criteria' => $row['code_criteria'],
                        'catagory_id' => $chk2->id,
                        'name' => $row['name'],
                        'brand_id' => $brand,
                        'is_active' => "1",
                        'create_by' => Auth::user()->id,
                        'update_by' => Auth::user()->id,
                    ]);
                }
        }
    }
}
