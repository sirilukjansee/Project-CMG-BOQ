<?php

namespace App\Http\Controllers;

use App\Exports\TaskTypesExport;
use App\Imports\TaskTypesImport;
use Illuminate\Http\Request;
use App\Models\task_type;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TaskTypeController extends Controller
{
    public function  index()
    {
        $task_types = task_type::all();
        $_SESSION["projectID"] = '';

        return view('boq.master.task_type', compact('task_types'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $tasktype = new task_type;
        $tasktype->task_type_name = $request->task_type_name;
        $tasktype->create_by = 1;
        $tasktype->update_by = 1;
        $tasktype->save();

        return redirect()->back()->with('success', '!!! ADD TASK_TYPE Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => task_type::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'task_type_name' => 'unique:task_types'
        ],
        [
            'task_type_name.unique' => "error"
        ]);

        $tasktype = task_type::find($request->id)->update([
            'task_type_name' => $request->task_type_name,
            'update_by' => 1
        ]);

        return back()->with('success', '!!! Edit TASK NAME Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = task_type::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = task_type::find($id);

        if ($data->is_active == "1") {
            task_type::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            task_type::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function uploadTaskType(Request $request)
    {
        // dd($request);
        Excel::import(new TaskTypesImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new TaskTypesExport, 'taskType.xlsx');
    }

    public function taskTypeChk($data)
    {
        return response()->json([
            'dataChk' => task_type::get()
        ]);
    }
}
