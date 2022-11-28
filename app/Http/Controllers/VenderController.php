<?php

namespace App\Http\Controllers;


use App\Exports\VendersExport;
use App\Exports\MultiVenderExport;
use App\Imports\VendersImport;
use Illuminate\Http\Request;
use App\Models\Vender;
use App\Models\Project;
use App\Models\Import_vender;
use App\Models\template_boqs;
use App\Models\catagory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


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
        $vend->create_by = Auth::user()->id;
        $vend->update_by = Auth::user()->id;
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
            'update_by' => Auth::user()->id
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
                'update_by' => Auth::user()->id
            ]);
        }else {
            vender::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => Auth::user()->id
            ]);
        }
        return response()->json();
    }

    public function uploadVender(Request $request)
    {
        // dd($request);
        Excel::import(new VendersImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export($id)
    {
        $pro = Project::where('id', $id)->first();
        $im_v = Import_vender::where('id', $id)->first();
        $export_boq = template_boqs::where('id', $id)
            ->first();
        $catagorie = catagory::where('is_active', "1")
            ->get();
        // dd($im_v);
        return Excel::download(new MultiVenderExport($export_boq,$catagorie), ''.(@$im_v->vender_name->name).'-'.(@$im_v->project->brand_master->brand_name).'-'.(@$im_v->project->location_master->location_name).'.xlsx');
    }

    public function export_master()
    {

        return Excel::download(new VendersExport(), 'Vendor.xlsx');
    }

    public function venderChk($data)
    {
        return response()->json([
            'dataChk' => Vender::get()
        ]);
    }
}
