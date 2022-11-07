<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\template_boqs;
use App\Models\Import_vender;

class ReportAllController extends Controller
{

    public function index()
    {
        $data['projects'] = Project::orderBy('id', 'desc')->get();

        $_SESSION["projectID"] = '';
        return view('boq.Report.reportAll', $data);
    }

    public function index_detail($id)
    {
        $data['temp_boq'] = template_boqs::where('project_id', $id)->get();

        $data['imp_boq'] = Import_vender::where('id_project', $id)->get();

        $_SESSION["projectID"] = '';
        return view('boq.Report.reportAll-detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
