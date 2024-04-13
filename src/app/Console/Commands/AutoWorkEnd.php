<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Date;
use Carbon\Carbon;

class AutoWorkEnd extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'command:AutoAttendance';
    
    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Automatically process clock-out processing when a worker forgets to clock out';
    
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
        $dt = Carbon::now();
        $subDt = $dt->subDays();
        $auths = Auth::user();
        
        $dates = DB::table('dates')
        ->whereDate('created_at', $subDt->format('Y-m-d'))
        ->whereNull('work_end')
        ->update(['work_end' => '23:59:59']);
        
        $param = [
            'user_id' => $auths->id,
            'work_start' => $dt->format('H:i:s'),
        ];
        Date::create($param);
    }
}
