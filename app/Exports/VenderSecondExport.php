<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\Project;
use App\Models\template_boqs;
use App\Models\MasterTOR;
use App\Models\MasterTOR_Detail;
use App\Models\Import_vender;
use App\Models\Import_vender_detail;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class VenderSecondExport implements FromView, WithTitle, WithEvents, WithDrawings, WithStyles
{
    protected $export_boq;
    protected $catagorie;

    function __construct($export_boq,$catagorie) {
        $this->export_boq = $export_boq;
        $this->catagorie = $catagorie;
    }

    public function view(): View
    {
        $exp_tor = MasterTOR::where('is_active', "1")
        ->get();

        $exp_detail = Import_vender_detail::where('import_id', $this->export_boq->id)
        ->get();

         return view('boq.formBoq.exportVenderFirst', [
            'export_boq' => $this->export_boq,
            'catagorie' => $this->catagorie,
            'exp_tor' => $exp_tor,
            'exp_detail' => $exp_detail,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $workSheet = $event->sheet->getDelegate();
                $workSheet->freezePane('A11'); // freezing here
            },
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/logo/logo-cmg.jpg'));
        $drawing->setHeight(75);
        $drawing->setCoordinates('A1');

        $drawing2 = new Drawing();
        $drawing2->setName('watermark');
        $drawing2->setDescription('This is my watermark');
        $drawing2->setPath(public_path('/logo/DRAFT.png'));
        $drawing2->setHeight(750);
        $drawing2->setCoordinates('A1');

        return [$drawing, $drawing2];
    }

    public function styles(Worksheet $sheet)
    {
        // Make sure you enable worksheet protection if you need any of the worksheet or cell protection features!
        $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);
        // $sheet->getActiveSheet()->setCellValue('E:E', 12345.6789);

        // lock all cells then unlock the cell
        $sheet->getParent()->getActiveSheet()
            ->getStyle('E:E')
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);
        $sheet->getParent()->getActiveSheet()
            ->getStyle('F:F')
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);
        $sheet->getParent()->getActiveSheet()
            ->getStyle('G:G')
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);
        $sheet->getParent()->getActiveSheet()
            ->getStyle('H:H')
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);


        // styling first row
        $sheet->getStyle(1)->getFont()->setBold(true);
    }

    public function title(): string
    {
        return 'เอกสารแนบ';
    }
}
