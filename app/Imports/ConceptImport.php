<?php

namespace App\Imports;

use App\Models\Concept;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class ConceptImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $chk = Concept::where('name', $row['name'])->first();
        if ($chk) {
            Concept::where('id', $chk->id)->update([
                'name' => $row['name'],
                'update_by' => Auth::user()->id,
            ]);
        }else{
            return new Concept([
                'name' => $row['name'],
                'create_by' => Auth::user()->id,
            ]);
        }
    }
}
