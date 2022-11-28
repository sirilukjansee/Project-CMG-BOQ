<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\design_and_pm;
use App\Models\Project;
use App\Models\Brand;

class ReportDesignerController extends Controller
{

    public function index()
    {
        $data['designers'] = design_and_pm::get();
        $data['brands'] = Brand::get();
        $data['year'] = '';

        $_SESSION["projectID"] = '';
        return view('boq.Report.report-designer', $data);
    }

    public function index_detail($id, $month)
    {
        $data['designers'] = design_and_pm::where('id', $id)->first();

        $data['projects'] = Project::whereMonth('open_date', $month)->where('designer_name', $id)->get();

        switch ($month)
        {
            case 1 : $data['monthy']="มกราคม"; break;
            case 2 : $data['monthy']="กุมภาพันธ์"; break;
            case 3 : $data['monthy']="มีนาคม"; break;
            case 4 : $data['monthy']="เมษายน"; break;
            case 5 : $data['monthy']="พฤษภาคม"; break;
            case 6 : $data['monthy']="มิถุนายน"; break;
            case 7 : $data['monthy']="กรกฎาคม"; break;
            case 8 : $data['monthy']="สิงหาคม"; break;
            case 9 : $data['monthy']="กันยายน"; break;
            case 10 : $data['monthy']="ตุลาคม"; break;
            case 11 : $data['monthy']="พฤศจิกายน"; break;
            case 12 : $data['monthy']="ธันวาคม"; break;
            case 13 : $data['monthy']="ทั้งหมด"; break;
        }

        $_SESSION["projectID"] = '';
        return view('boq.Report.report-designer-detail', $data);
    }

    public function search(Request $request)
    {
        // dd($request);

        if ($request->brand_id) {
            $data['designers'] = design_and_pm::leftjoin('projects', 'design_and_pms.id', 'projects.designer_name')
            ->where('projects.brand', $request->brand_id)
            ->select('design_and_pms.*')->distinct()->get();
        }elseif ($request->year) {
            $data['designers'] = design_and_pm::leftjoin('projects', 'design_and_pms.id', 'projects.designer_name')
            ->whereYear('projects.open_date', $request->year)
            ->select('design_and_pms.*')->distinct()->get();
        }elseif ($request->name) {
            $data['designers'] = design_and_pm::leftjoin('projects', 'design_and_pms.id', 'projects.designer_name')
            ->where('design_and_pms.name', 'LIKE', '%'.$request->name.'%')
            ->select('design_and_pms.*')->distinct()->get();
        }else {
            $data['designers'] = design_and_pm::get();
        }

        $data['brands'] = Brand::get();
        $data['year'] = $request->year;

        $_SESSION["projectID"] = '';
        return view('boq.Report.report-designer', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
