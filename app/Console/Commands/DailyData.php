<?php

namespace App\Console\Commands;

use App\Exports\ProjectExport;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DailyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to send daily message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 'CC';
        // echo 'This is my first basic scheduler';
        $list = Excel::store(new ProjectExport, '/export/project'. date('Ymd').'.csv');
        $filename = 'storage/app/export/project'. date('Ymd').'.csv';

        Storage::disk('sftp')->put('project(test)'. date('Ymd').'.csv', file_get_contents($filename)); //ได้แล้วแต่ยังไม่สมบูรณ์


        // $this->info('Daily report has been sent successfully!');
        return 'Daily report has been sent successfully!';
    }
}
