<?php

namespace App\Imports;

use App\Models\taskname;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskNamesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = taskname::where('task_name', $row['task_name'])->first();
        if ($chk) {
            taskname::where('id', $chk->id)->update([
                'task_name' => $row['task_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }else{
            return new taskname([
                'task_name' => $row['task_name'],
                'create_by' => 2,
                'update_by' => 2,
            ]);
        }
    }
}
