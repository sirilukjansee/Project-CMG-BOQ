<?php

namespace App\Http\Controllers;

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

class ProjectController extends Controller
{
    public function index(){
        $project = Project::orderBy('id', 'desc')
            ->get();


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
}
