<?php

namespace App\Imports;

use App\Models\MasterTOR;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TorsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = MasterTOR::where('message', $row['message'])->first();
        if ($chk) {
            MasterTOR::where('id', $chk->id)->update([
                'message' => $row['message'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new MasterTOR([
                'message' => $row['message'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
