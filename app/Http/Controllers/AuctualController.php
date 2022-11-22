<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\catagory;
use App\Models\Capex;
use App\Models\template_boqs;
use App\Models\Boq;
use App\Models\Auctual;
use App\Exports\AuctualExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AuctualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_categories = catagory::where('is_active', "1")->orderBy('code', 'asc')->get();

        $project_id = Project::where('id', $id)->first();
        $aut = Auctual::where('project_id', $id)->get();
        $tot = Auctual::where('project_id', $id)->sum('total');
        $tot1 = Auctual::where('project_id', $id)
                ->whereIn('boq_id', ['1','7']) // id ของ catagory
                ->sum('total');

        $_SESSION["projectID"] = $id;


        return view('boq.auctual.auctual', compact('data_categories','project_id','aut','tot','tot1'));
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
            $data = Auctual::where('project_id',  $request->project_id)->where('boq_id',  $value)->first();

            if ($data) {
                $cap = Auctual::where('id', $data->id)->first();
                $cap->project_id = $request->project_id;
                $cap->template_id = $request->template_id;
                $cap->boq_id = ($value);
                $cap->total = ($request->total[$key]);
                $cap->remark = $request->remark[$key];
                $cap->update_by = Auth::user()->id;
                $cap->updated_at = Carbon::now();
                $cap->update();
            }else{
                $cap = new Auctual;
                $cap->project_id = $request->project_id;
                $cap->template_id = $request->template_id;
                $cap->boq_id = ($value);
                $cap->total = ($request->total[$key]);
                $cap->remark = $request->remark[$key];
                $cap->create_by = Auth::user()->id;
                $cap->update_by = Auth::user()->id;
                $cap->created_at = Carbon::now();
                $cap->save();
            }

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

    public function export($id)
    {

        return Excel::download(new AuctualExport($id), 'Auctual.xlsx');
    }
}
