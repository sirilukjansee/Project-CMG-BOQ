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

    protected $category_id;

    function __construct($category_id) {
        $this->cat_id = $category_id;
    }

    public function collection()
    {
        return catagory_sub::where('catagory_id', $this->cat_id)->select('code_cat', 'name', 'brand_id', 'is_active', 'create_by',
         'update_by', 'created_at', 'updated_at', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'code_cat',
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
