<?php

namespace App\Exports;

use App\Models\Unit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnitsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Unit::select('unit_name', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'unit_name',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',
            'deleted_at',

        ];
    }
}
