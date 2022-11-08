<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\catagory_sub;
use App\Models\Unit;
use App\Models\Project;
use App\Models\Brand;
use App\Models\template_boqs;
use App\Models\Vender;
use Illuminate\Support\Facades\DB;

class FormboqController extends Controller
{
    public function index($id){

        $project = Project::find($id);
        $template_choose = template_boqs::get();
        // $template_boq = template_boqs::where('project_id', $id)->first();

        $catagories = catagory::where('is_active', "1")->orderBy('code', 'asc')->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $venders = Vender::where('is_active', "1")->get();
        $template_id = '';
        $_SESSION["projectID"] = '';

        // echo $catagories1;
        return view('boq.formBoq.addformBoq', compact('catagories','catagories2','brand_master','project','venders','template_choose','template_id'));

    }

    public function select_catagory()
    {
        return response()->json([
            'data' => catagory::where('is_active', "1")->get(),
            'dataSub' => catagory_sub::where('is_active', "1")->get(),
            'data_brands' => Brand::where('is_active', "1")->get()
        ]);
    }
}
