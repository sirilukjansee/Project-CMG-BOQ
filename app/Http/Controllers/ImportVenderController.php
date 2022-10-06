<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Import_vender;
use App\Models\template_boqs;
use App\Models\catagory;
use App\Imports\BoqVendersImport;
use App\Imports\FirstBoqVendersImport;
use App\Imports\MultiSheetImport;
use App\Exports\VenderFirstExport;
use App\Exports\VenderSecondExport;
use App\Exports\MultiVenderExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportVenderController extends Controller
{

    public function uploadBoqVender(Request $request)
    {
        // $name = "FirstBoqVendersImport";
        // dd($request);
        Excel::import(new FirstBoqVendersImport($request->id), $request->file);
        Excel::import(new BoqVendersImport($request->id), $request->file);
        return back()->with('success','!!! Import File Complete !!!');
    }

    public function export($id)
    {
        $export_boq = Import_vender::where('id', $id)
            ->first();
        $catagorie = catagory::where('is_active', "1")
            ->get();
        // $number = 0;
        return Excel::download(new MultiVenderExport($export_boq,$catagorie), 'Vender.xlsx');
    }
}
