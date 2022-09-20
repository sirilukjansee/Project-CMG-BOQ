<?php

namespace App\Imports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LocationsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = Location::where('location_name', $row['location_name'])->first();
        if ($chk) {
            Location::where('id', $chk->id)->update([
                'location_name' => $row['location_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new Location([
                'location_name' => $row['location_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
