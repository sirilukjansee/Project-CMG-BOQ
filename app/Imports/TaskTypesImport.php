<?php

namespace App\Imports;

use App\Models\task_type;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskTypesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = task_type::where('task_type_name', $row['task_type_name'])->first();
        if ($chk) {
            task_type::where('id', $chk->id)->update([
                'task_type_name' => $row['task_type_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new task_type([
                'task_type_name' => $row['task_type_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
