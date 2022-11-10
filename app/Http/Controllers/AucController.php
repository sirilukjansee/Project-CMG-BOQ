<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Boq;
use App\Models\catagory;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Vender;
use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use App\Models\template_boqs;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Exports\AucExport;
use App\Models\ExportAuc;

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
        $auc_ven = Import_vender::where('id_project', $id)->get();
        $_SESSION["projectID"] = $id;

        return view('boq.AUC.auc', compact('editboq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis','auc_temp','auc_pro','auc_ven'));
    }

    public function export(Request $request)
    {
        ExportAuc::where('project_id', $request->project_id)->delete();

        if( isset($request->chk_m) )
        {
            foreach ( $request->chk_m as $key => $ckm )
            {
                foreach ( $ckm as $key2 => $ckm_a)
                {
                    ExportAuc::create([
                        'project_id' => $request->project_id,
                        'template_id' => $key,
                        'main_id' => $ckm_a,
                        'remark' => "All",
                    ]);
                }
            }
            if ( isset($request->chk_s) ){
                foreach ( $request->chk_s as $key => $cks )
                {
                    foreach ( $cks as $key2 => $cks_a )
                    {
                        ExportAuc::create([
                            'project_id' => $request->project_id,
                            'template_id' => $key,
                            'boq_id' => $cks_a,
                            'remark' => "sub",
                        ]);
                    }
                }
            }

            return Excel::download(new AucExport($request->project_id), 'AUC.xlsx');
        }elseif ( isset($request->chk_s) ){
            foreach ( $request->chk_s as $key => $cks )
            {
                foreach ( $cks as $key2 => $cks_a )
                {
                    ExportAuc::create([
                        'project_id' => $request->project_id,
                        'template_id' => $key,
                        'boq_id' => $cks_a,
                        'remark' => "sub",
                    ]);
                }
            }

            return Excel::download(new AucExport($request->project_id), 'AUC.xlsx');
        }else{
            return back()->with('success', '!!! Please Check Some Box !!!');
        }

    }

    public function send_chhk($id)
    {
        return response()->json([
            'chk_data' => catagory::where('is_active', "1")->get(),
            'chk_box' => template_boqs::where('project_id', $id)->get(),
            'id2' => $id
        ]);
    }

    public function select_auc($id, $temp_id)
    {
        // dd($temp_id);
        Import_vender::where('id', $id)->update([
            'template_id' => $temp_id,
        ]);

        $auc_tem = Import_vender::where('id', $id)->first();

        template_boqs::where('id', $temp_id)->update([
            'vender_id' => $auc_tem->id_vender,
            'budget' => $auc_tem->budget,
        ]);

        return back();
    }

    public function send_ven(Request $request)
    {
        // dd($request->width);
        $store_auc = Import_vender::create([
            'id_project' => $request->id,
            'template_id' => $request->boq_id,
            'id_vender' => $request->id_vender,
        ])->id;

        $ovh_dis = template_boqs::where('id', $request->boq_id)->first();
            // dd($ovh_dis);
        Import_vender::where('id', $store_auc)->update([
            'overhead' => $ovh_dis->overhead,
            'discount' => $ovh_dis->discount,
        ]);

        $data_detail = Boq::where('template_boq_id', $request->boq_id)->get();
        // $auc_tem_d = Import_vender_detail::where('template_id', $request->boq_id)->first();
        // echo $data_detail;

        foreach($data_detail as $key => $value)
        {
            // dd($value);
            // echo $value;
            $boq = new Import_vender_detail;
            $boq->import_id = $store_auc;
            $boq->main_id = $value->main_id;
            $boq->sub_id = $value->sub_id;
            $boq->width = $value->width;
            $boq->depth = $value->depth;
            $boq->height = $value->height;
            $boq->amount = $value->amount;
            $boq->unit_id = $value->unit_id;
            $boq->desc = $value->desc;
            $boq->wage_cost = $value->wage_cost;
            $boq->material_cost = $value->material_cost;
            $boq->each_unit = $value->each_unit;
            $boq->all_unit = $value->all_unit;
            $boq->save();
        }

        template_boqs::where('id', $request->boq_id)->update([
            'vender_id' => $request->id_vender,
        ]);

        return back();
    }
}
