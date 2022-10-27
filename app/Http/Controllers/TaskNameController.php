<?php

namespace App\Http\Controllers;

use App\Exports\TaskNamesExport;
use App\Imports\TaskNamesImport;
use Illuminate\Http\Request;
use App\Models\taskname;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class TaskNameController extends Controller
{
    public function  index()
    {
        $tasknames = taskname::all();
        $_SESSION["projectID"] = '';
        return view('boq.master.task_name', compact('tasknames'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $taskname = new taskname;
        $taskname->task_name = $request->task_name;
        $taskname->create_by = Auth::user()->id;
        $taskname->update_by = Auth::user()->id;
        $taskname->save();

        return redirect()->back()->with('success', '!!! ADD TASK_NAME Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => taskname::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'task_name' => 'unique:tasknames'
        ],
        [
            'task_name.unique' => "error"
        ]);

        $taskname = taskname::find($request->id)->update([
            'task_name' => $request->task_name,
            'update_by' => Auth::user()->id
        ]);

        return back()->with('success', '!!! Edit TASK NAME Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = taskname::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = taskname::find($id);

        if ($data->is_active == "1") {
            taskname::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => Auth::user()->id
            ]);
        }else {
            taskname::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => Auth::user()->id
            ]);
        }
        return response()->json();
    }

    public function uploadTaskName(Request $request)
    {
        // dd($request);
        Excel::import(new TaskNamesImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new TaskNamesExport, 'taskName.xlsx');
    }

    public function taskNameChk($data)
    {
        return response()->json([
            'dataChk' => taskname::get()
        ]);
    }

}
