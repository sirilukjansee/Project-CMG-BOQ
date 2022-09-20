<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\design_and_pm;

class ExcelController extends Controller
{
    public function index()
    {
        $data = design_and_pm::all();

        return view ('boq.formBoq.addminorBoq', compact('data'));
    }

    public function ExportExcel($customer_data){
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    function exportData(){
        $data = design_and_pm::all();
        $data_array [] = array("name","email","tel");
        foreach($data as $data_item)
        {
            $data_array[] = array(
                'name' =>$data_item->name,
                'email' => $data_item->email,
                'tel' => $data_item->tel,
            );
        }
        $this->ExportExcel($data_array);
    }
}
