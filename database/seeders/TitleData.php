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
        $danhhieu = [[
            'name' => 'Sinh viên 5T',
            'created_at' => now(),
            'updated_at' => now(),
            'start' => '2019-10-21',
            'finish' => '2021-12-29',
        ], [
            'name' => 'Học sinh 3T',
            'created_at' => now(),
            'updated_at' => now(),
            'start' => '2019-10-21',
            'finish' => '2021-12-29',
        ]];

        DB::table('danhhieu')->insert($danhhieu);

        $doituong = [[
            'name' => 'Sinh viên',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Học sinh',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'name' => 'Giảng viên',
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        DB::table('doituong')->insert($doituong);

        $danhhieu_doituong = [[
            'id_danhhieu'=> 1,
            'id_doituong' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'id_danhhieu'=> 1,
            'id_doituong' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'id_danhhieu'=> 1,
            'id_doituong' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'id_danhhieu'=> 2,
            'id_doituong' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'id_danhhieu'=> 2,
            'id_doituong' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        DB::table('danhhieu_doituong')->insert($danhhieu_doituong);

        DB::table('tieuchi')->insert([[
            'id_danhhieu_doituong' => 1,
            'name' => 'Đạo đức tốt',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_danhhieu_doituong' => 1,
            'name' => 'Học tập tốt',
            'created_at' => now(),
            'updated_at' => now()
        ]]);

        DB::table('tieuchi')->insert([[
            'id_danhhieu_doituong' => 1,
            'name' => 'Thể lực tốt',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ]]);

         DB::table('tieuchi')->insert([[
            'id_danhhieu_doituong' => 1,
            'name' => 'Tình nguyện tốt',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_danhhieu_doituong' => 1,
            'name' => 'Hội nhập tốt',
            'created_at' => now(),
            'updated_at' => now()
        ]]);



        $tieuchuan = [[
            'id_tieuchi' => 1,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => False
        ], [
            'id_tieuchi' => 1,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ], [
            'id_tieuchi' => 2,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => False
        ], [
            'id_tieuchi' => 2,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ], [
            'id_tieuchi' => 4,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => False
        ], [
            'id_tieuchi' => 4,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ], [
            'id_tieuchi' => 5,
            'name' => 'Tiêu chuẩn bắt buộc',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => False
        ], [
            'id_tieuchi' => 5,
            'name' => 'Tiêu chuẩn khác',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ]];
        DB::table('tieuchuan')->insert($tieuchuan); // Query Builder approach

        $noidung = [[
            'id_tieuchuan' => 1,
            'content' => 'Có lòng yêu nước, trung thành với mục tiêu, lý tưởng cách mạng của Đảng.',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 1,
            'content' => 'Không vi phạm pháp luật và các quy chế, nội quy của trường, lớp, quy định của địa phương cư trú, nơi công cộng.',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 2,
            'content' => 'Là thành viên chính thức đội thi tìm hiểu về chủ nghĩa Mác - Lênin, tư tưởng Hồ Chí Minh từ cấp trường trở lên.',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 2,
            'content' => 'Có tham luận, bài viết được trình bày tại các diễn đàn học thuật về các môn khoa học Mác - Lênin, tư tưởng Hồ Chí Minh từ cấp trường trở lên.',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 3,
            'content' => 'Có động cơ, thái độ học tập đúng đắn; không gian lận trong thi cử, không nợ môn, học phần hoặc tín chỉ trong năm học.',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 3,
            'content' => 'Đối với sinh viên các trường Đại học, Học viện: điểm trung bình chung học tập cả năm học đạt từ 8,5/10 trở lên (đối với các trường đào tạo theo niên chế) hoặc từ 3,4/4 trở lên (đối với các trường đào tạo theo học chế tín chỉ). Đối với sinh viên các trường Cao đẳng: điểm trung bình chung học tập cả năm học đạt từ 8,0/10 trở lên (đối với các trường đào tạo theo niên chế) hoặc từ 3,2/4 trở lên (đối với các trường đào tạo theo học chế tín chỉ). Đối với sinh viên khối ngành năng khiếu (thể dục thể thao, nghệ thuật) điểm trung bình chung cả năm học đạt từ 7,5/10 (đối với các trường đào tạo theo niên chế) hoặc từ 3,0/4 trở lên (đối với các trường đào tạo theo học chế tín chỉ).',
            'created_at' => now(),
            'updated_at' => now()
        ], [
            'id_tieuchuan' => 4,
            'content' => 'Có đề tài nghiên cứu khoa học (tham gia với tư cách là chủ nhiệm đề tài hoặc đồng tác giả của đề tài hoặc thành viên nhóm nghiên cứu đề tài) trong năm học được hội đồng khoa học cấp trường nghiệm thu đánh giá từ 8,0 điểm trở lên hoặc đạt giải cấp trường trở lên (đối với các trường Đại học, Học viện); được hội đồng khoa học cấp khoa nghiệm thu đánh giá từ 8,0 điểm trở lên hoặc đạt giải cấp khoa trở lên (đối với các trường Cao đẳng).',
            'created_at' => now(),
            'updated_at' => now()
        ]];
        DB::table('noidung')->insert($noidung); // Query Builder approach

        $noidung1 = [
            'id_tieuchi' => 3,
            'content' => 'Đạt danh hiệu “Thanh niên khỏe” từ cấp trường trở lên',
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('noidung')->insert($noidung1); // Query Builder approach
    }
}
