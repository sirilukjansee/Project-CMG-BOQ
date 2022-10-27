<?php

namespace App\Http\Controllers;

use App\Exports\UnitsExport;
use App\Imports\UnitsImport;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        $_SESSION["projectID"] = '';
        return view('boq.master.masterUnit', compact('units'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $unit = new Unit;
        $unit->unit_name = $request->unit_name;
        $unit->create_by = Auth::user()->id;
        $unit->update_by = Auth::user()->id;
        $unit->save();

        return redirect()->back()->with('success', '!!! ADD DESIGNER/PM Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => Unit::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'unique:Locations'
        // ],
        // [
        //     'name.unique' => "error"
        // ]);

        $unit = Unit::find($request->id)->update([
            'unit_name' => $request->unit_name,
            'update_by' => Auth::user()->id
        ]);

        return back()->with('success', '!!! Edit DESIGNER/PM Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = Unit::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = Unit::find($id);

        if ($data->is_active == "1") {
            Unit::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => Auth::user()->id
            ]);
        }else {
            Unit::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => Auth::user()->id
            ]);
        }
        return response()->json();
    }

    public function uploadUnit(Request $request)
    {
        // dd($request);
        Excel::import(new UnitsImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new UnitsExport, 'unit.xlsx');
    }

    public function unitChk($data)
    {
        return response()->json([
            'dataChk' => Unit::get()
        ]);
    }
}
