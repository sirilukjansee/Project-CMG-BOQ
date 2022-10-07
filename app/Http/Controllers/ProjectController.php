<?php

namespace App\Http\Controllers;

use App\Exports\ProjectExport;
use App\Exports\VendersExport;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Brand;
use App\Models\Location;
use App\Models\task_type;
use App\Models\taskname;
use App\Models\design_and_pm;
use App\Models\template_boqs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    public function index(){
        $project = Project::orderBy('id', 'desc')
            ->get();

            $_SESSION["projectID"] = '';

        return view('boq.index', compact('project'));
    }

    public function adminView(){
        $project_ad = Project::orderBy('id', 'desc')->get();

        return view('boq.adminBoq', compact('project_ad'));
    }

    public function create()
    {
        $project = Project::all();
        $project1 = Brand::where('is_active', "1")->get();
        $project2 = Location::where('is_active', "1")->get();
        $project3 = task_type::where('is_active', "1")->get();
        $project4 = taskname::where('is_active', "1")->get();
        $project5 = design_and_pm::where('is_active', "1")->get();

        return view('boq.addprojectBoq', compact('project','project1','project2','project3','project4','project5'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'brand' => 'required',
            'location' => 'required',
            'area' => 'required',
            'task' => 'required',
            'task_n' => 'required',
            'startDate' => 'required',
            'finishDate' => 'required',
            'openDate' => 'required',
            'ds_name' => 'required'
        ]);

        $project = new Project;
        $project->brand = $request->brand;
        $project->location = $request->location;
        $project->area = $request->area;
        $project->unit = $request->unit;
        $project->io = $request->io;
        $project->task = $request->task;
        $project->task_n = $request->task_n;
        $project->start_date = $request->startDate;
        $project->finish_date = $request->finishDate;
        $project->all_date = $request->alldate;
        $project->open_date = $request->openDate;
        $project->designer_name = $request->ds_name;
        $project->project_manager = $request->pm_name;
        $project->created_at = Carbon::now();
        $project->save();

        $project_y = Carbon::today()->format('Y');
        $project_y_cut = substr($project_y, -2);
        $number_id = $project_y_cut.str_pad($project->id, 4, '0', STR_PAD_LEFT);
        // return $number_id;

        Project::find($project->id)->update([
            'number_id' => $number_id
        ]);

        // return $project->id;
        return redirect(route('allBoq', ['id' => $project->id]))->with('success', '!!! Add Project Complete !!!');
    }

    public function chk_id($id)
    {
        return response()->json([
            'chk_io' => Project::where('io', $id)
                            ->select('brand', 'io')
                            // ->groupBy('brand')
                            ->get()


        ]);
    }

    public function sendFile()
    {
        $list = Excel::store(new ProjectExport, '/export/project'. date('Ymd').'.csv');


        $filename = 'storage/app/export/project'. date('Ymd').'.csv';

        Storage::disk('sftp')->put('project'. date('Ymd').'.csv', file_get_contents($filename)); //ได้แล้วแต่ยังไม่สมบูรณ์
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $project1 = Brand::where('is_active', "1")->get();
        $project2 = Location::where('is_active', "1")->get();
        $project3 = task_type::where('is_active', "1")->get();
        $project4 = taskname::where('is_active', "1")->get();
        $project5 = design_and_pm::where('is_active', "1")->get();

        return view('boq.editprojectBoq', compact('project','project1','project2','project3','project4','project5'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $pro_data = Project::where('id', $request->id)->update([
            'brand' => $request->brand,
            'location' => $request->location,
            'area' => $request->area,
            'unit' => $request->unit,
            'io' => $request->io,
            'task' => $request->task,
            'task_n' => $request->task_n,
            'start_date' => $request->startDate,
            'finish_date' => $request->finishDate,
            'all_date' => $request->alldate,
            'open_date' => $request->openDate,
            'designer_name' => $request->ds_name,
        ]);

        return redirect(route('allBoq', ['id' => $request->id]))->with('success', '!!! Add Project Complete !!!');
    }

}
