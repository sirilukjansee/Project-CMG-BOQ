<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\template_boqs;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function index()
    {
        $boq_chk  = template_boqs::where('name', "Master BOQ")->where('status', "1")
            ->orderBy('id', 'desc')
            ->get();

        return view('boq.checkBoq', compact('boq_chk'));
    }

    public function store(Request $request)
    {
        // dd($request);
        template_boqs::where('id', $request->boq_id)->update([
            'status'    =>  $request->status,
            'comment'   =>  $request->comment,
            'approve_by'    =>  "1",
            'approve_at'    =>  Carbon::now()
        ]);

        return back()->with("Yay");
    }

}
