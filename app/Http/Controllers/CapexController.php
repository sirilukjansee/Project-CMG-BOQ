<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\catagory;
use App\Models\Capex;
use App\Models\template_boqs;
use App\Models\Boq;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CapexController extends Controller
{

    public function index($id)
    {
        $data_categorys = catagory::where('is_active', "1")->get();
        $project_id = Project::where('id', $id)->first();
        $template_id = template_boqs::where('project_id', $id)->first();
        $cpx = Capex::where('project_id', $id)
            // ->('')
            ->get();
        $_SESSION["projectID"] = $id;

        return view('boq.Capex.capex', compact('data_categorys','project_id','template_id','cpx'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        foreach( $request->boq_id as $key => $value )
        {
            // foreach( $request->total[$key] as $key1 => $value1 )
            // {
                $cap = new Capex;
                $cap->project_id = $request->project_id;
                $cap->template_id = $request->template_id;
                $cap->boq_id = ($value);
                $cap->total = ($request->total[$key]);
                $cap->remark = $request->remark;
                $cap->create_by = 1;
                $cap->update_by = 1;
                $cap->created_at = Carbon::now();
                $cap->save();
            // }
        }


        return redirect()->back();
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
