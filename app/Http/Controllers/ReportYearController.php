<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportYearController extends Controller
{

    public function index()
    {
        $data['dataProjects'] = Project::select(DB::raw('YEAR(created_at) as year, count(id) as jobs, sum(area) as sqm'))
        ->groupBy('year')->get();
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-year', $data);
    }
}
