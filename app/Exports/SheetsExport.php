<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\template_boqs;
use App\Models\MasterTOR;
use App\Models\MasterTOR_detail;
use App\Models\catagory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class SheetsExport implements FromView, WithTitle, WithStyles, WithDrawings
{
    protected $catagorie;
    protected $export_boq;
    protected $exp_tor;

    function __construct($catagorie,$export_boq) {
        $this->catagorie = $catagorie;
        $this->export_boq = $export_boq;
    }

    public function view(): View
    {
        //   get ออกหมด แค่หมวดหลัก ใช้ hasMany ไป detail
        // $export_boq = template_boqs::where('id', $id)
        // ->first();
        $exp_tor = MasterTOR::where('is_active', "1")
        ->get();
        // $catagorie = catagory::where('is_active', "1")
        // ->get();

         return view('boq.formBoq.exportBoqSheet', [
            'catagorie' => $this->catagorie,
            'export_boq' => $this->export_boq,
            'exp_tor' => $exp_tor,
        ]);


    }

    public function styles(Worksheet $sheet)
    {
        // Make sure you enable worksheet protection if you need any of the worksheet or cell protection features!
        $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);

        // lock all cells then unlock the cell
        $sheet->getParent()->getActiveSheet()
            ->getStyle('A1')
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);

        // styling first row
        $sheet->getStyle(1)->getFont()->setBold(true);
    }

    public function drawings()
    {
        // if($tmplate_boqs->status != 2)
        // {
            $drawing = new Drawing();
            $drawing->setName('Logo');
            $drawing->setDescription('This is my logo');
            $drawing->setPath(public_path('/logo/logo-cmg.jpg'));
            $drawing->setHeight(75);
            $drawing->setCoordinates('A1');

            $drawing2 = new Drawing();
            $drawing2->setName('Logo');
            $drawing2->setDescription('This is my logo');
            $drawing2->setPath(public_path('/logo/DRAFT.png'));
            $drawing2->setHeight(750);
            $drawing2->setCoordinates('B11');

            return [$drawing, $drawing2];
        // }
    }

    public function title(): string
    {
        return 'ใบปะหน้า';
    }
}
