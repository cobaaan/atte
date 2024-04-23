<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatesTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $param = [
            'user_id' => 2,
            'work_start' => '08:00:00',
            'work_end' => '17:00:00'
        ];
        DB::table('dates')->insert($param);
        $param = [
            'user_id' => 5,
            'work_start' => '12:00:00',
            'work_end' => '17:33:00'
        ];
        DB::table('dates')->insert($param);
    }
}
