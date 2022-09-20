<?php

namespace App\Exports;

use App\Models\MasterTOR;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TORExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterTOR::select('message', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'message',
            'is_active',
            'create_by',
            'update_by',
            'created_at',
            'updated_at',
            'deleted_at',

        ];
    }
}
