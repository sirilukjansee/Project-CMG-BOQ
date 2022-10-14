<?php

namespace App\Exports;

use App\Models\Concept;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConceptExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Concept::select('name', 'is_active', 'create_by', 'update_by', 'update_by', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'name',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',

        ];
    }
}
