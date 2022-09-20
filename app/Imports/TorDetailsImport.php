<?php

namespace App\Imports;

use App\Models\MasterTOR_detail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TorDetailsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = MasterTOR_detail::where('message', $row['message'])->where('tor_id', $row['tor_id'])->first();
        if ($chk) {
            MasterTOR_detail::where('id', $chk->id)->update([
                'message' => $row['message'],
                'tor_id' => $row['tor_id'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new MasterTOR_detail([
                'message' => $row['message'],
                'tor_id' => $row['tor_id'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
