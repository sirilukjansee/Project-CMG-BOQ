<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Location;
use App\Models\Project;
use App\Models\task_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportTaskTypeController extends Controller
{

    public function index()
    {
        $data['task_type'] = task_type::get();
        $data['brands'] = Brand::get();
        $data['data_projects'] = Project::get();
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type', $data);
    }

    public function search(Request $request)
    {
        // dd($request);

        if ($request->type_id && $request->year) {
            $data['task_type'] = task_type::get();
            $data['brands'] = Brand::join('projects', 'brands.id', 'projects.brand')
            ->where('projects.task', $request->type_id)
            ->whereYear('projects.created_at', $request->year)
            ->select('brands.*')->distinct()->get();

            $arr = '';
            foreach ($data['brands'] as $key => $value) {
                $arr = [$value->id];
            }

            $data['data_projects'] = Project::where('task', $request->type_id)
            ->whereYear('created_at', $request->year)->get();

        }elseif ($request->type_id) {
            $data['task_type'] = task_type::get();
            $data['brands'] = Brand::join('projects', 'brands.id', 'projects.brand')
            ->where('projects.task', $request->type_id)
            ->select('brands.*')->distinct()->get();

            $data['data_projects'] = Project::get();

        }
        elseif ($request->year) {
            $data['task_type'] = task_type::get();
            $data['brands'] = Brand::join('projects', 'brands.id', 'projects.brand')
            ->whereYear('projects.created_at', $request->year)
            ->select('brands.*')->distinct()->get();

            $data['data_projects'] = Project::get();
            }
            else
            {
            $data['task_type'] = task_type::get();
            $data['brands'] = Brand::get();
            $data['data_projects'] = Project::get();
        }

        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type', $data);
    }

    public function index_location()
    {
        $data['task_type'] = task_type::get();
        $data['locations'] = Location::get();
        $data['data_projects'] = Project::get();
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type-ref-location', $data);
    }

    public function search_location(Request $request)
    {
        // dd($request);
        if ($request->type_id && $request->year) {
            $data['task_type'] = task_type::get();
            $data['locations'] = Location::join('projects', 'locations.id', 'projects.location')
            ->where('projects.task', $request->type_id)
            ->whereYear('projects.created_at', $request->year)
            ->select('locations.*')->distinct()->get();

            $arr = '';
            foreach ($data['locations'] as $key => $value) {
                $arr = [$value->id];
            }

            $data['data_projects'] = Project::where('task', $request->type_id)
            ->whereYear('created_at', $request->year)->get();

        }elseif ($request->type_id) {
            $data['task_type'] = task_type::get();
            $data['locations'] = Location::join('projects', 'locations.id', 'projects.location')
            ->where('projects.task', $request->type_id)
            ->select('locations.*')->distinct()->get();

            $data['data_projects'] = Project::get();

        }
        elseif ($request->year) {
            $data['task_type'] = task_type::get();
            $data['locations'] = Location::join('projects', 'locations.id', 'projects.location')
            ->whereYear('projects.created_at', $request->year)
            ->select('locations.*')->distinct()->get();

            $data['data_projects'] = Project::get();
            }
            else
            {
            $data['task_type'] = task_type::get();
            $data['locations'] = Location::get();
            $data['data_projects'] = Project::get();
        }

        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type-ref-location', $data);
    }
}
