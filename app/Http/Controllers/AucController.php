<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Boq;
use App\Models\catagory;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Vender;
use App\Models\template_boqs;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AucExport;

class AucController extends Controller
{
    public function index($id)
    {
        $editboq = Boq::where('template_boq_id', $id)->get();
        $catagories = catagory::where('is_active', "1")->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $ven_der = Vender::where('is_active', "1")->get();
        $edit_dis = Boq::where('template_boq_id', $id)->first();
        $project_id = template_boqs::where('id' ,$id)->first();
        $auc_temp = template_boqs::where('project_id', $id)->get();
        $auc_pro = Project::where('id' ,$id)->first();
        $_SESSION["projectID"] = $id;

        return view('boq.AUC.auc', compact('editboq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis','auc_temp','auc_pro'));
    }

    public function export(Request $request)
    {
        // dd($request);
        // $data = array();
        // $data['chk_m'] = $request->chk_m;
        // $data['chk_s'] = $request->chk_s;
        foreach( $request->chk_m as $chk )
        {
            if( $chk ){
                $data = array();
                $data[] = ['main_id']$request->chk_m;
            }
        }


        return Excel::download(new AucExport($request->chk_m), 'AUC.xlsx');
        // return Excel::download(new AucExport($data), 'AUC.xlsx');
    }
}
