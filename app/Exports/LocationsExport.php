<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Location::select('location_name', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'location_name',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',
            'deleted_at',

        ];
    }
}
