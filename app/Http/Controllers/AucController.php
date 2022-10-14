<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AucController extends Controller
{
    public function index($id)
    {
        $_SESSION["projectID"] = $id;

        return view('boq.AUC.auc');
    }
}
