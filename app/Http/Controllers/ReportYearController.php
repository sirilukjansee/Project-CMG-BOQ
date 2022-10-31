<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportYearController extends Controller
{

    public function index()
    {
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-year');
    }

    public function index_brand()
    {
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type');
    }

    public function index_location()
    {
        $_SESSION["projectID"] = '';
        return view('boq.Report.report-task-type-ref-location');
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
