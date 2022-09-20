<?php

namespace App\Exports;

use App\Models\catagory_sub;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategorySubsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return catagory_sub::select('catagory_id', 'name', 'brand_id', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'catagory_id',
            'name',
            'brand_id',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',
            'deleted_at',

        ];
    }
}
