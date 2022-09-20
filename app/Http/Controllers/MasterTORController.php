<?php

namespace App\Http\Controllers;

use App\Exports\TORExport;
use App\Imports\TorDetailsImport;
use App\Imports\TorsImport;
use App\Models\catagory_sub;
use App\Models\MasterTOR;
use App\Models\MasterTOR_detail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MasterTORController extends Controller
{
    public function index()
    {
        $masterTor = MasterTOR::get();

        return view('boq.master.masterTor', compact('masterTor'));
    }

    public function store(Request $request)
    {
        MasterTOR::create([
            'message'   =>  $request->tor,
            'is_active'    =>  "1",
            'created_by'    =>  "1",
        ]);

        return redirect()->back()->with('success', '!!! ADD Tor Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => MasterTOR::find($id)
        ]);
    }

    public function update(Request $request)
    {
        $update = MasterTOR::where('id', $request->id)->update([
            'message' => $request->tor,
            'update_by' => 1,
        ]);

        return back()->with('success', '!!! Edit Complete !!!');
    }

    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        // return "dd";
        $data = MasterTOR::find($id);

        if ($data->is_active == "1") {
            MasterTOR::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
            MasterTOR_detail::where('tor_id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            MasterTOR::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
            MasterTOR_detail::where('tor_id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function create_detail($id)
    {
        $masterTor_detail = MasterTOR_detail::where('tor_id', $id)->get();
        $nameTor = MasterTOR::find($id);

        return view('boq.master.masterTor_detail', compact('masterTor_detail', 'id', 'nameTor'));
    }

    public function store_detail(Request $request)
    {
        MasterTOR_detail::create([
            'tor_id'    => $request->tor_id,
            'message'   =>  $request->tor,
            'is_active'    =>  "1",
            'created_by'    =>  "1",
        ]);

        return redirect()->back()->with('success', '!!! ADD Tor Complete !!!');
    }

    public function edit_detail($id)
    {
        return response()->json([
            'dataEdit' => MasterTOR_detail::find($id)
        ]);
    }

    public function update_detail(Request $request)
    {
        $update = MasterTOR_detail::where('id', $request->id)->update([
            'message' => $request->tor,
            'update_by' => 1,
        ]);

        return back()->with('success', '!!! Edit Complete !!!');
    }

    public function changeStatus_detail($id)
    {
        // return "dd";
        $data = MasterTOR_detail::find($id);

        if ($data->is_active == "1") {
            MasterTOR_detail::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            MasterTOR_detail::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function uploadTor(Request $request)
    {
        // dd($request);
        Excel::import(new TorsImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new TORExport, 'tor.xlsx');
    }

    public function uploadTorDetail(Request $request)
    {
        // dd($request);
        Excel::import(new TorDetailsImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function torChk($data)
    {
        return response()->json([
            'dataChk' => MasterTOR::get()
        ]);
    }

    public function torDetailChk($data)
    {
        return response()->json([
            'dataChk' => MasterTOR_detail::get()
        ]);
    }
}
