<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Boq;
use App\Models\template_boqs;
use App\Models\catagory;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Vender;
use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use Carbon\Carbon;
use App\Exports\BoqsExport;
use App\Exports\SheetsExport;
use App\Exports\MultipleBoqExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use function PHPUnit\Framework\isEmpty;

class BoqController extends Controller
{
    public function index($id)
    {
        $project = Project::leftjoin('brands','projects.brand','brands.brand_name')
        ->where('projects.id',$id)
        ->select('projects.*','brands.id as brand_id')
        ->first();

        $temp_boq = template_boqs::where('project_id', $id)
            ->get();

        $imp_boq = Import_vender::where('id_project', $id)
            ->get();

            $_SESSION["projectID"] = $id;

        return view('boq.allBoq', compact('project','temp_boq','imp_boq'));
    }

    public function choose_temp($templateid, $id)
    {
        // dd($templateid);
        $pro_brand = Project::where('id', $id)->first();
        $data_boq = Boq::where('template_boq_id', $templateid)->get();
        $catagories = catagory::where('is_active', "1")->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $ven_der = Vender::where('is_active', "1")->get();
        $edit_dis = Boq::where('template_boq_id', $id)->first();
        $project_id = template_boqs::where('id' , $templateid)->first();  // templateid คือ ID โครงการที่ Choose template มา ||  id คือ id ของ project ที่กำลังทำอยู่ !!!!!!

        // return $templateid;
        // dd($id);
        return view('boq.formBoq.addformBoq-template', compact('pro_brand','data_boq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis','templateid'));
    }



    public function store(Request $request)
    {
        // dd($request);
        if( $request->btn_send == "btn_send" )
        {
            $send_form = "1";
        }else
        {
            $send_form = "0";
        }

        $data_number = Project::where('id', $request->project_id)
            ->first();

        $data = template_boqs::where('project_id', $request->project_id)
            ->count();

            if($data >= 1)
            {
                $number_id = str_pad($data + 1, 4, '0', STR_PAD_LEFT);
                $template = template_boqs::create([
                    'vender_id' =>  $request->vender_id,
                    'number_id' => $data_number->number_id."-".$number_id,
                    'project_id' => $request->project_id,
                    'name'  =>  "Additional BOQ",
                    'date'  =>  Carbon::now(),
                    'status'    =>  $send_form,
                    'overhead'  =>  $request->overhead,
                    'discount'  =>  $request->discount,
                    'ref_template' => $request->ref_template,
                    'create_by' =>  1,
                    'update_by' =>  1
                ])->id;
            }else
            {
                $number_id2 = str_pad(1, 4, '0', STR_PAD_LEFT);
                $template = template_boqs::create([
                    'vender_id' =>  $request->vender_id,
                    'number_id' => $data_number->number_id."-".$number_id2,
                    'project_id' => $request->project_id,
                    'name'  =>  "Master BOQ",
                    'date'  =>  Carbon::now(),
                    'status'    =>  $send_form,
                    'overhead'  =>  $request->overhead,
                    'discount'  =>  $request->discount,
                    'ref_template' => $request->ref_template,
                    'create_by' =>  1,
                    'update_by' =>  1
                ])->id;
            }

            foreach($request->code_id as $key2 => $value2)
            {
                foreach($request->code_id[$key2] as $key3 => $value3)
                {
                    if($request->code_id[$key2][$key3])
                    {
                        foreach($request->amount[$key2] as $key4 => $value4)
                        {
                            foreach($request->unit_id[$key2] as $key5 => $value5)
                            {
                                foreach($request->desc[$key2] as $key6 => $value6)
                                {
                                    if ($request->wage_cost != '')
                                    {
                                        foreach($request->wage_cost[$key2] as $key7 => $value7)
                                        {
                                            foreach($request->material_cost[$key2] as $key8 => $value8)
                                            {
                                                foreach($request->each_unit[$key2] as $key9 => $value9)
                                                {
                                                    foreach($request->all_unit[$key2] as $key10 => $value10)
                                                    {
                                                        $boq = new Boq;
                                                        $boq->template_boq_id = $template;
                                                        // $boq->vender_id = ($request->vender_id);
                                                        $boq->main_id = ($key3);
                                                        $boq->sub_id = ($value3);
                                                        $boq->amount = $value4;
                                                        $boq->unit_id = $value5;
                                                        $boq->desc = $value6;
                                                        $boq->total = $request->total;
                                                        $boq->wage_cost = $value7;
                                                        $boq->material_cost = $value8;
                                                        $boq->each_unit = $value9;
                                                        $boq->all_unit = $value10;
                                                        $boq->status = $send_form;
                                                        $boq->comment = $request->comment;
                                                        $boq->create_by = 1;
                                                        $boq->update_by = 1;
                                                        $boq->save();
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $boq = new Boq;
                                            $boq->template_boq_id = $template;
                                            // $boq->vender_id = ($request->vender_id);
                                            $boq->main_id = ($key3);
                                            $boq->sub_id = ($value3);
                                            $boq->amount = $value4;
                                            $boq->unit_id = $value5;
                                            $boq->desc = $value6;
                                            $boq->total = $request->total;
                                            // $boq->wage_cost = $value7;
                                            // $boq->material_cost = $value8;
                                            $boq->status = $send_form;
                                            $boq->comment = $request->comment;
                                            $boq->create_by = 1;
                                            $boq->update_by = 1;
                                            $boq->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }


        return redirect(route('allBoq', ['id' => $request->project_id]))->with('success', '!!! ADD BOQ Complete !!!');
    }
    public function edit($id)
    {
        $pro_brand = Project::where('id', $id)->first();
        $editboq = Boq::where('template_boq_id', $id)->get();
        $catagories = catagory::where('is_active', "1")->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $ven_der = Vender::where('is_active', "1")->get();
        $edit_dis = Boq::where('template_boq_id', $id)->first();
        $project_id = template_boqs::where('id' , $id)->first();
        $_SESSION["projectID"] = '';

        // dd($id);
        return view('boq.formBoq.editformBoq', compact('pro_brand','editboq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis'));
    }
    public function update(Request $request)
    {
        // dd($request);

        if( $request->btn_send == "btn_send" )
        {
            $send_form = "1";
        }else
        {
            $send_form = "0";
        }

        template_boqs::where('id', $request->id)->update([
            'status' => $send_form,
            'vender_id' => $request->vender_id,
            'overhead'  =>  $request->overhead,
            'discount'  =>  $request->discount
        ]);

        Boq::where('template_boq_id', $request->id)->delete();      //*******************จะลบข้อมูลเดิมมออกก่อน แล้วค่อยเพิ่มใหม่************************

                foreach($request->code_id as $key2 => $value2)
                {
                    foreach($request->code_id[$key2] as $key3 => $value3)
                    {

                        if($request->code_id[$key2][$key3])
                        {
                            foreach($request->amount[$key2] as $key4 => $value4)
                            {

                                foreach($request->unit_id[$key2] as $key5 => $value5)
                                {

                                    foreach($request->desc[$key2] as $key6 => $value6)
                                    {
                                        if( $request->wage_cost != '')
                                        {
                                            foreach($request->wage_cost[$key2] as $key7 => $value7)
                                            {
                                                foreach($request->material_cost[$key2] as $key8 => $value8)
                                                {
                                                    foreach($request->each_unit[$key2] as $key9 => $value9)
                                                    {
                                                        foreach($request->all_unit[$key2] as $key10 => $value10)
                                                        {
                                                            $boq = new Boq;
                                                            $boq->template_boq_id = $request->id;
                                                            // $boq->vender_id = ($request->vender_id);
                                                            $boq->main_id = ($key3);
                                                            $boq->sub_id = ($value3);
                                                            $boq->amount = $value4;
                                                            $boq->unit_id = $value5;
                                                            $boq->desc = $value6;
                                                            $boq->total = $request->total;
                                                            $boq->wage_cost = $value7;
                                                            $boq->material_cost = $value8;
                                                            $boq->each_unit = $value9;
                                                            $boq->all_unit = $value10;
                                                            $boq->status = $send_form;
                                                            $boq->comment = $request->comment;
                                                            $boq->create_by = 1;
                                                            $boq->update_by = 1;
                                                            $boq->save();
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            $boq = new Boq;
                                            $boq->template_boq_id = $request->id;
                                            // $boq->vender_id = ($request->vender_id);
                                            $boq->main_id = ($key3);
                                            $boq->sub_id = ($value3);
                                            $boq->amount = $value4;
                                            $boq->unit_id = $value5;
                                            $boq->desc = $value6;
                                            $boq->total = $request->total;
                                            // $boq->wage_cost = $value7;
                                            // $boq->material_cost = $value8;
                                            // $boq->each_unit = $value9;
                                            // $boq->all_unit = $value10;
                                            $boq->status = $send_form;
                                            $boq->comment = $request->comment;
                                            $boq->create_by = 1;
                                            $boq->update_by = 1;
                                            $boq->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

        return redirect(route('allBoq', ['id' => $request->project_id]))->with('success', '!!! Edit BOQ Complete !!!');
    }

    public function change_status_boq(Request $request)
    {
        $data = template_boqs::find($request->boq_id);
        // dd($request);
        template_boqs::where('id', $request->boq_id)->update([
            'status' => "1"
        ]);

        Project::where('id', $data->project_id)->update([
            'updated_at'  =>  Carbon::now()
        ]);

        return back()->with('Yay');

    }

    public function view_boq($id)
    {
        $editboq = Boq::where('template_boq_id', $id)->get();
        $catagories = catagory::where('is_active', "1")->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $ven_der = Vender::where('is_active', "1")->get();
        $edit_dis = Boq::where('template_boq_id', $id)->first();
        $project_id = template_boqs::where('id' ,$id)->first();
        $_SESSION["projectID"] = '';

        return view('boq.formBoq.viewBoq', compact('editboq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis'));
    }

    public function export_boq($id)
    {
        $editboq = Boq::where('template_boq_id', $id)->get();
        $catagories = catagory::where('is_active', "1")->get();
        $brand_master = Brand::where('is_active', "1")->get();
        $catagories2 = Unit::where('is_active', "1")->get();
        $ven_der = Vender::where('is_active', "1")->get();
        $edit_dis = Boq::where('template_boq_id', $id)->first();
        $project_id = template_boqs::where('id' ,$id)->first();
        $_SESSION["projectID"] = '';

        return view('boq.formBoq.viewBoq', compact('editboq','catagories','brand_master','catagories2','id','project_id','ven_der','edit_dis'));
    }

    public function export($id)
    {
        $export_boq = template_boqs::where('id', $id)
            // ->where('project_id', $id)
            ->first();
        $catagorie = catagory::where('is_active', "1")
            ->get();
        // $number = 0;
        // return Excel::download(new BoqsExport($export_boq,$catagorie), 'BOQ-'.(@$export_boq->project->brand_master->brand_name).'-'.(@$export_boq->project->task_type_master->task_type_name).'-'.(@$export_boq->project->location_master->location_name).'-'.(@$export_boq->project->number_id).'.xlsx');
        return Excel::download(new MultipleBoqExport($export_boq,$catagorie), ''.(@$export_boq->name).'-'.(@$export_boq->project->task_type_master->task_type_name).'-Concept-'.(@$export_boq->project->task_type_master->task_type_name).'-'.(@$export_boq->project->location_master->location_name).'-'.(@$export_boq->project->number_id).'.xlsx');
    }

    public function store_aj(Request $request)
    {
        // dd($request);
        if( $request->btn_send == "btn_send" )
        {
            $send_form = "1";
        }else
        {
            $send_form = "0";
        }

        $data_number = Project::where('id', $request->project_id)
            ->first();

        $data = template_boqs::where('project_id', $request->project_id)
            ->count();

        $chk_temp = template_boqs::find($request->temp_id);

        if( $chk_temp == '' )
        {
            if($data >= 1)
            {
                $number_id = str_pad($data + 1, 4, '0', STR_PAD_LEFT);
                $template = template_boqs::create([
                    'vender_id' =>  $request->vender_id,
                    'number_id' => $data_number->number_id."-".$number_id,
                    'project_id' => $request->project_id,
                    'name'  =>  "Additional BOQ",
                    'date'  =>  Carbon::now(),
                    'status'    =>  $send_form,
                    'overhead'  =>  $request->overhead,
                    'discount'  =>  $request->discount,
                    'ref_template' => $request->ref_template,
                    'create_by' =>  Auth::user()->id,
                    'update_by' =>  Auth::user()->id
                ])->id;
            }else{
                $number_id2 = str_pad(1, 4, '0', STR_PAD_LEFT);
                $template = template_boqs::create([
                    'vender_id' =>  $request->vender_id,
                    'number_id' => $data_number->number_id."-".$number_id2,
                    'project_id' => $request->project_id,
                    'name'  =>  "Master BOQ",
                    'date'  =>  Carbon::now(),
                    'status'    =>  $send_form,
                    'overhead'  =>  $request->overhead,
                    'discount'  =>  $request->discount,
                    'ref_template' => $request->ref_template,
                    'create_by' =>  Auth::user()->id,
                    'update_by' =>  Auth::user()->id
                ])->id;
            }
            $template_id = $template;
        }else{
                template_boqs::where('id', $chk_temp->id)->update([
                    'vender_id' =>  $request->vender_id,
                    'date'  =>  Carbon::now(),
                    'status'    =>  $send_form,
                    'overhead'  =>  $request->overhead,
                    'discount'  =>  $request->discount,
                    'update_by' =>  Auth::user()->id
                ]);

            $template_id = $request->temp_id;
            $template = $request->temp_id;
        }

            foreach($request->code_id as $key2 => $value2)
            {
                foreach($request->code_id[$key2] as $key3 => $value3)
                {
                    if($request->code_id[$key2][$key3])
                    {
                        foreach($request->amount[$key2] as $key4 => $value4)
                        {
                            foreach($request->unit_id[$key2] as $key5 => $value5)
                            {
                                foreach($request->desc[$key2] as $key6 => $value6)
                                {
                                    if ($request->wage_cost != '')
                                    {
                                        foreach($request->wage_cost[$key2] as $key7 => $value7)
                                        {
                                            foreach($request->material_cost[$key2] as $key8 => $value8)
                                            {
                                                foreach($request->each_unit[$key2] as $key9 => $value9)
                                                {
                                                    foreach($request->all_unit[$key2] as $key10 => $value10)
                                                    {
                                                        $chk_boq = Boq::where('template_boq_id', $template)->where('main_id', $key3)->where('sub_id', $value3)->first();
                                                        if( $chk_boq )
                                                        {
                                                            $boq = Boq::where('id', $chk_boq->id)->first();
                                                            $boq->template_boq_id = $template;
                                                            // $boq->vender_id = ($request->vender_id);
                                                            $boq->main_id = ($key3);
                                                            $boq->sub_id = ($value3);
                                                            $boq->amount = $value4;
                                                            $boq->unit_id = $value5;
                                                            $boq->desc = $value6;
                                                            $boq->total = $request->total;
                                                            $boq->wage_cost = $value7;
                                                            $boq->material_cost = $value8;
                                                            $boq->each_unit = $value9;
                                                            $boq->all_unit = $value10;
                                                            $boq->status = $send_form;
                                                            $boq->comment = $request->comment;
                                                            $boq->create_by = 1;
                                                            $boq->update_by = 1;
                                                            $boq->update();
                                                        }else{
                                                            $boq = new Boq;
                                                            $boq->template_boq_id = $template;
                                                            // $boq->vender_id = ($request->vender_id);
                                                            $boq->main_id = ($key3);
                                                            $boq->sub_id = ($value3);
                                                            $boq->amount = $value4;
                                                            $boq->unit_id = $value5;
                                                            $boq->desc = $value6;
                                                            $boq->total = $request->total;
                                                            $boq->wage_cost = $value7;
                                                            $boq->material_cost = $value8;
                                                            $boq->each_unit = $value9;
                                                            $boq->all_unit = $value10;
                                                            $boq->status = $send_form;
                                                            $boq->comment = $request->comment;
                                                            $boq->create_by = 1;
                                                            $boq->update_by = 1;
                                                            $boq->save();
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }else{
                                        $chk_boq = Boq::where('template_boq_id', $template)->where('main_id', $key3)->where('sub_id', $value3)->first();
                                        if( $chk_boq )
                                        {
                                            $boq = Boq::where('id', $chk_boq->id)->first();
                                            $boq->template_boq_id = $template;
                                            // $boq->vender_id = ($request->vender_id);
                                            $boq->main_id = ($key3);
                                            $boq->sub_id = ($value3);
                                            $boq->amount = $value4;
                                            $boq->unit_id = $value5;
                                            $boq->desc = $value6;
                                            $boq->total = $request->total;
                                            // $boq->wage_cost = $value7;
                                            // $boq->material_cost = $value8;
                                            $boq->status = $send_form;
                                            $boq->comment = $request->comment;
                                            $boq->create_by = 1;
                                            $boq->update_by = 1;
                                            $boq->update();
                                        }else{
                                            $boq = new Boq;
                                            $boq->template_boq_id = $template;
                                            // $boq->vender_id = ($request->vender_id);
                                            $boq->main_id = ($key3);
                                            $boq->sub_id = ($value3);
                                            $boq->amount = $value4;
                                            $boq->unit_id = $value5;
                                            $boq->desc = $value6;
                                            $boq->total = $request->total;
                                            // $boq->wage_cost = $value7;
                                            // $boq->material_cost = $value8;
                                            $boq->status = $send_form;
                                            $boq->comment = $request->comment;
                                            $boq->create_by = 1;
                                            $boq->update_by = 1;
                                            $boq->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }


        return response()->json([
            'temp' => $template_id
        ]);
    }


}
