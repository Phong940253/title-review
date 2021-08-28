<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitleData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $danhhieu = [
            'name' => 'Sinh viên 5T',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];
        DB::table('danhhieu')->insert($danhhieu);

        $tieuchi = [[
            'id_danhhieu' => 1,
            'name' => 'Đạo đức tốt',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_danhhieu' => 1,
            'name' => 'Học tập tốt',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_danhhieu' => 1,
            'name' => 'Thể lực tốt',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_danhhieu' => 1,
            'name' => 'Tình nguyện tốt',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_danhhieu' => 1,
            'name' => 'Hội nhập tốt',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]];
        DB::table('tieuchi')->insert($tieuchi); // Query Builder approach

        $tieuchuan = [[
            'id_tieuchi' => 1,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 1,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 2,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 2,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 4,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 4,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 5,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'id_tieuchi' => 5,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]];
        DB::table('tieuchuan')->insert($tieuchuan); // Query Builder approach
    }
}
