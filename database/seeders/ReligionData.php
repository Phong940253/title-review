<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [[
            'name' => 'Phật giáo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Công giáo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Tin Lành',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Cao Đài',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Hòa Hảo',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Ấn Độ giáo',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Hồi giáo',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tứ Ân Hiếu NGhĩa',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Cơ Đốc Phục Lâm',
            'created_at' => now(),
            'updated_at' => now(),
        ]];

        DB::table('religion')->insert($religions);
    }
}
