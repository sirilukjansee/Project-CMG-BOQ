<?php

namespace App\Http\Controllers;

use App\Exports\LocationsExport;
use App\Imports\LocationsImport;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        $_SESSION["projectID"] = '';
        return view('boq.master.masterLocation', compact('locations'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $location = new Location;
        $location->location_name = $request->location_name;
        $location->is_active = "1";
        $location->create_by = 1;
        $location->update_by = 1;
        $location->save();

        return redirect()->back()->with('success', '!!! ADD DESIGNER/PM Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => Location::find($id)
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

        $location = Location::find($request->id)->update([
            'location_name' => $request->location_name,
            'update_by' => 1
        ]);

        return back()->with('success', '!!! Edit DESIGNER/PM Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = Location::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = Location::find($id);

        if ($data->is_active == "1") {
            Location::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            Location::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function uploadLocation(Request $request)
    {
        // dd($request);
        Excel::import(new LocationsImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new LocationsExport, 'location.xlsx');
    }

    public function locationChk($data)
    {
        return response()->json([
            'dataChk' => Location::get()
        ]);
    }
}
