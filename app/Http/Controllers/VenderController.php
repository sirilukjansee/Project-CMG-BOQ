<?php

namespace App\Http\Controllers;

use App\Exports\VendersExport;
use App\Imports\VendersImport;
use Illuminate\Http\Request;
use App\Models\Vender;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VenderController extends Controller
{
    public function  index()
    {
        $venders = Vender::all();
        $_SESSION["projectID"] = '';

        return view('boq.master.masterVender', compact('venders'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $vend = new vender;
        $vend->name = $request->name;
        $vend->is_active = "1";
        $vend->create_by = 1;
        $vend->update_by = 1;
        $vend->save();

        return redirect()->back()->with('success', '!!! ADD VENDER Complete !!!');
    }
    public function edit($id)
    {
        return response()->json([
            'dataEdit' => vender::find($id)
        ]);
    }
    public function update(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'task_type_name' => 'unique:task_types'
        // ],
        // [
        //     'task_type_name.unique' => "error"
        // ]);

        $venders = vender::find($request->id)->update([
            'name' => $request->name,
            'update_by' => 1
        ]);

        return back()->with('success', '!!! Edit VENDER Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = vender::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = vender::find($id);

        if ($data->is_active == "1") {
            vender::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            vender::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function uploadVender(Request $request)
    {
        // dd($request);
        Excel::import(new VendersImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new VendersExport, 'vender.xlsx');
    }

    public function venderChk($data)
    {
        return response()->json([
            'dataChk' => Vender::get()
        ]);
    }
}
