<?php

namespace App\Exports;

use App\Models\design_and_pm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DesignsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return design_and_pm::select('name', 'email', 'tel', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'tel',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',
            'deleted_at',

        ];
    }
}
