<?php

namespace App\Http\Controllers;

use App\Exports\ConceptExport;
use App\Models\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ConceptController extends Controller
{

    public function index()
    {
        $concepts = Concept::get();
        $_SESSION["projectID"] = '';
        return view('boq.master.masterConcept', compact('concepts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Concept::create([
            'name' => $request->name,
            'is_active' => "1",
            'create_by' => Auth::user()->id
        ]);

        return back()->with('success', '!!! ADD Complete !!!');
    }

    public function edit($id)
    {
        return response()->json([
            'dataEdit' => Concept::find($id)
        ]);

    }

    public function update(Request $request)
    {

        $update = Concept::where('id', $request->id)->update([
            'name' => $request->name,
            'update_by' => Auth::user()->id,
        ]);

        return back()->with('success', '!!! Edit Complete !!!');
    }

    public function changeStatus($id)
    {
        // return "dd";
        $data = Concept::find($id);

        if ($data->is_active == "1") {
            Concept::where('id',$data->id)->update([
                'is_active' => "0",
                'update_by' => 1
            ]);
        }else {
            Concept::where('id',$data->id)->update([
                'is_active' => "1",
                'update_by' => 1
            ]);
        }
        return redirect()->back()->with('success','!!! Status Complete !!!');
    }

    public function ConceptChk($data)
    {
        return response()->json([
            'dataChk' => Concept::get()
        ]);
    }

    public function uploadConcept(Request $request)
    {
        // dd($request);
        Excel::import(new Concept(), $request->file);

        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export()
    {
        return Excel::download(new ConceptExport, 'concept.xlsx');
    }
}
