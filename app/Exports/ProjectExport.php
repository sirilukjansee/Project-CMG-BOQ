<?php

namespace App\Exports;

use App\Models\Project;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;

// class ProjectExport implements FromCollection, WithHeadings
class ProjectExport implements FromView
{
    // protected $export_boq;
    /**
    * @return \Illuminate\Support\Collection
    */
    function __construct() {
        // $this->export_boq = $export_boq;
    }

    public function view(): View
    {
         return view('boq.send_view', [
            'export_project' => Project::get()
        ]);
    }

    // public function collection()
    // {
    //     return Project::all();
    // }

    // public function headings(): array
    // {
    //     return [
    //         'io',
    //         'task',
    //         'brand',
    //         'task_n',
    //         'location',
    //         'open_date',
    //         'area',
    //         'designer_name',
    //         'Project status'

    //     ];
    // }
}
