<?php

namespace App\Http\Controllers;

use App\Exports\CategorysExport;
use App\Exports\CategorySubsExport;
use App\Imports\CategorysImport;
use App\Imports\CategorySubsImport;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\catagory_sub;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class MasterController extends Controller
{
    public function index()
    {
        $catagories = catagory::orderBy('code','asc')->get();
        $_SESSION["projectID"] = '';

        return view('boq.master.masterBoq', compact('catagories'));
    }

    public function index_sub($id)
    {
        $data = array(
            'catagories' => catagory::find($id),
            'catagories3' => catagory_sub::where('catagory_id', $id)->get(),
            'data_brand' => Brand::get(),
            $_SESSION["projectID"] = ''
        );

        return view('boq.master.sub_masterBoq', $data);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'unique:catagories'
        // ],
        // [
        //     'name.unique' => "error"
        // ]);

        // dd($request);
        $data = array();
        $data['code'] = $request->code;
        $data['name'] = $request->name;
        $data['create_by'] = 1;
        $data['update_by'] = 1;
        $data['is_active'] = "1";

        DB::table('catagories')->insert($data);

        return redirect()->back()->with('success', '!!! ADD Complete !!!');
    }

    // public function edit($id){
    //     $catagory = catagory::find($id);
    //     return response()->json([$catagory]);
    // }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => catagory::find($id)
        ]);

    }

    public function update(Request $request)
    {
        // dd($request->id);
        // $request->validate([
        //     'name' => 'unique:catagories'
        // ],
        // [
        //     'name.unique' => "error"
        // ]);

        $update = DB::table('catagories')->where('id', $request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'update_by' => 1,
        ]);

        return back()->with('success', '!!! Edit Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = catagory::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = catagory::find($id);

        if ($data->is_active == "1") {
            catagory::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
            catagory_sub::where('catagory_id', $data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            catagory::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
            catagory_sub::where('catagory_id', $data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return response()->json();
    }

    public function store_sub(Request $request)
    {
        // dd($request);
       $catagory_sub = new catagory_sub;
       $catagory_sub->code = $request->code1.$request->code2.$request->code3;
       $catagory_sub->catagory_id = $request->catagory_id;
       $catagory_sub->name = $request->name;
       $catagory_sub->code_cat = $request->catagory_code;
       $catagory_sub->create_by = Auth::user()->id;
       $catagory_sub->update_by = Auth::user()->id;
       $catagory_sub->is_active = "1";
       $catagory_sub->save();

       if ($request->brand_id) {
            catagory_sub::where('id', $catagory_sub->id)->update([
                'brand_id' => implode( ',', $request->brand_id)
        ]);
       }

        return redirect()->back()->with('success', '!!! ADD_SUB Complete !!!');
    }

    public function edit_sub($id)
    {
        $id2 = catagory_sub::find($id);

        return response()->json([
            'dataEdit' => $id2,
            'dataBrand' => Brand::get()
        ]);

    }

    public function update_sub(Request $request)
    {
        if ($request->brand_id) {
            $update_sub = catagory_sub::find($request->id)->update([
                'code' => $request->code1.$request->code2.$request->code3,
                'name' => $request->name,
                'brand_id' => implode( ',', $request->brand_id),
                'code_cat' => $request->catagory_code,
                'update_by' => 1
            ]);
        }else{
        $update_sub = catagory_sub::find($request->id)->update([
            'code' => $request->code1.$request->code2.$request->code3,
            'name' => $request->name,
            'code_cat' => $request->catagory_code,
            'update_by' => 1
        ]);
    }
        return back()->with('success', '!!! Edit_SUB Complete !!!');
    }

    // public function softdelete_sub($id)
    // {
    //     $delete = catagory_sub::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus_sub($id)
    {
        $data = catagory_sub::find($id);

        if ($data->is_active == "1") {
            catagory_sub::find($data->id)->update([
                'is_active' => "0",
                'update_by' => Auth::user()->id
            ]);
        }else {
            catagory_sub::find($data->id)->update([
                'is_active' => "1",
                'update_by' => Auth::user()->id
            ]);
        }
        return response()->json();
    }

    public function uploadCategory(Request $request)
    {
        // dd($request);
        $data = $request->file;
        if ($data->getClientOriginalName() == "category-import.xlsx") {
            Excel::import(new CategorysImport, $request->file);

            return back()->with('success','!!! Import File Complete !!!');
        }else{
            return back()->with('success','!!! Failed to upload file !!!');
        }

    }

    public function uploadCategory_sub(Request $request)
    {
        // dd($request->file_data);
        $data = $request->file_data;
        if ($data->getClientOriginalName() == "categorySub-import.xlsx") {
            Excel::import(new CategorySubsImport, $request->file_data);

            return back()->with('success','!!! Import File Complete !!!');
        }else{
            return back()->with('success','!!! Failed to upload file !!!');
        }
    }

    public function export()
    {
        return Excel::download(new CategorysExport, 'category.xlsx');
    }

    public function export_sub($cat_id)
    {
        return Excel::download(new CategorySubsExport($cat_id), 'category_sub.xlsx');
    }

    public function masterBoqChk($data)
    {
        return response()->json([
            'dataChk' => catagory::get()
        ]);
    }

    public function subMasterBoqChk($data)
    {
        return response()->json([
            'dataChk' => catagory_sub::get()
        ]);
    }

}
