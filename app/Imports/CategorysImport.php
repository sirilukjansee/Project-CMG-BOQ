<?php

namespace App\Imports;

use App\Models\catagory;
use Illuminate\Support\Facades\Auth;
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
        $chk = catagory::where('name', $row['name'])->orWhere('code', $row['code'])->first();
        if ($chk) {
            catagory::where('id', $chk->id)->update([
                'code' => $row['code'],
                'name' => $row['name'],
                'create_by' => Auth::user()->id,
                'update_by' => Auth::user()->id,
            ]);
        }else{
            return new catagory([
                'code' => $row['code'],
                'name' => $row['name'],
                'create_by' => Auth::user()->id,
                'update_by' => Auth::user()->id,
            ]);
        }
    }
}
