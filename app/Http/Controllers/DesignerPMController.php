<?php

namespace App\Http\Controllers;

use App\Exports\DesignsExport;
use App\Imports\DesignersImport;
use Illuminate\Http\Request;
use App\Models\design_and_pm;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class DesignerPMController extends Controller
{
    public function index()
    {
        $design_and_pms = design_and_pm::all();
        $_SESSION["projectID"] = '';

        return view('boq.master.masterDesignPM', compact('design_and_pms'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $design_pm = new design_and_pm;
        $design_pm->name = $request->name;
        $design_pm->email = $request->email;
        $design_pm->tel = $request->tel;
        $design_pm->is_active = "1";
        $design_pm->create_by = 1;
        $design_pm->update_by = 1;
        $design_pm->save();

        return redirect()->back()->with('success', '!!! ADD DESIGNER/PM Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => design_and_pm::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'unique:design_and_pms'
        // ],
        // [
        //     'name.unique' => "error"
        // ]);

        $design_pm = design_and_pm::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'update_by' => 1
        ]);

        return back()->with('success', '!!! Edit DESIGNER/PM Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = design_and_pm::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = design_and_pm::where('id', $id)->first();

        if ($data->is_active == "1") {
            design_and_pm::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => Auth::user()->id
            ]);
        }else {
            design_and_pm::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => Auth::user()->id
            ]);
        }
        return response()->json();
    }

    public function uploadDesigner(Request $request)
    {
        // dd($request);
        Excel::import(new DesignersImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new DesignsExport, 'designandPM.xlsx');
    }

    public function designChk($data)
    {
        return response()->json([
            'dataChk' => design_and_pm::get()
        ]);
    }
}
