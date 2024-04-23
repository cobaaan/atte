<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'date_id' => 1,
            'break_start' => '15:00:00',
            'break_end' => '15:30:00'
        ];
        DB::table('times')->insert($param);
    }
}
