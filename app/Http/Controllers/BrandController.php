<?php

namespace App\Http\Controllers;

use App\Exports\BrandsExport;
use App\Imports\BrandsImport;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $_SESSION["projectID"] = '';

        return view('boq.master.masterBrand', compact('brands'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $brand = new Brand;
        // $brand->code = $request->code;
        $brand->brand_name = $request->brand_name;
        $brand->create_by = 1;
        $brand->update_by = 1;
        $brand->save();

        return redirect()->back()->with('success', '!!! ADD DESIGNER/PM Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => Brand::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'unique:Brands'
        ],
        [
            'name.unique' => "error"
        ]);

        $design_pm = Brand::find($request->id)->update([
            // 'code' => $request->code,
            'brand_name' => $request->brand_name,
            'update_by' => 1
        ]);

        return back()->with('success', '!!! Edit DESIGNER/PM Complete !!!');
    }

    // public function softdelete($id)
    // {
    //     $delete = Brand::find($id)->delete();
    //     return redirect()->back()->with('success','!!! Delete-Complete !!!');
    // }

    public function changeStatus($id)
    {
        // return "dd";
        $data = Brand::find($id);

        if ($data->is_active == "1") {
            Brand::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            Brand::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function uploadBrand(Request $request)
    {
        // dd($request);
        Excel::import(new BrandsImport, $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new BrandsExport, 'brand.xlsx');
    }

    public function brandChk($data)
    {
        return response()->json([
            'dataChk' => Brand::get()
        ]);
    }
}
