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
            'name' => 'Sinh viên 5 tốt cấp Trường năm 2021',
            'created_at' => now(),
            'updated_at' => now(),
            'start' => '2021-11-15',
            'finish' => '2021-12-05',
        ]];

        DB::table('danhhieu')->insert($danhhieu);

        $doituong = [[
            'name' => 'Sinh viên',
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        DB::table('doituong')->insert($doituong);

        $danhhieu_doituong = [[
            'id_danhhieu' => 1,
            'id_doituong' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]];
        DB::table('danhhieu_doituong')->insert($danhhieu_doituong);

        // Test data
//        DB::table('doituong')->insert([[
//            'name' => 'Cán bộ',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ], [
//            'name' => 'Giảng viên',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ], [
//            'name' => 'Học sinh',
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]]);
//
//        DB::table('danhhieu_doituong')->insert([[
//            'id_danhhieu' => 1,
//            'id_doituong' => 1,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ], [
//            'id_danhhieu' => 1,
//            'id_doituong' => 2,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ], [
//            'id_danhhieu' => 1,
//            'id_doituong' => 3,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ], [
//            'id_danhhieu' => 1,
//            'id_doituong' => 4,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]]);
        // End test data

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
        ], [
            'id_danhhieu_doituong' => 1,
            'name' => 'Tình nguyện tốt',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ]]);

        DB::table('tieuchi')->insert([[
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
            'id_tieuchi' => 5,
            'name' => 'Về ngoại ngữ',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ], [
            'id_tieuchi' => 5,
            'name' => 'Về kỹ năng',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => True
        ], [
            'id_tieuchi' => 5,
            'name' => 'Về hoạt động hội nhập',
            'created_at' => now(),
            'updated_at' => now(),
            'any_option' => False
        ]];
        DB::table('tieuchuan')->insert($tieuchuan); // Query Builder approach

        $noidung = [
            ['id_tieuchuan' => 1, 'content' => 'Điểm rèn luyện sinh viên năm học 2020 - 2021 đạt từ 85 điểm trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 1, 'content' => 'Phân tích chất lượng Hội viên năm học 2020 - 2021 đạt loại Hoàn thành Xuất sắc nhiệm vụ', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 1, 'content' => 'Phân tích chất lượng Đoàn viên năm học 2020 - 2021 (đối với Hội viên là Đoàn viên) đạt loại Hoàn thành Xuất sắc nhiệm vụ', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Là Đảng viên được xếp loại cuối năm 2020 đạt Hoàn thành Tốt nhiệm vụ', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Là thành viên chính thức đội thi tìm hiểu về chủ nghĩa Mác - Lênin, tư tưởng Hồ Chí Minh, Ánh sáng thời đại,… trong năm học 2020 - 2021 từ cấp khoa trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có tham luận, bài viết được trình bày tại các diễn đàn học thuật các môn khoa học Mác - Lênin, tư tưởng Hồ Chí Minh từ cấp khoa trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Là Thanh niên tiêu biểu làm theo lời Bác năm 2020 từ cấp khoa trở lên hoặc là điển hình được biểu dương trong việc học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh năm 2020', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Là Đoàn viên ưu tú năm học 2020 - 2021', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Là Đoàn viên tiêu biểu - UE Award năm học 2020 - 2021', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Đạt Giấy khen đã có thành tích xuất sắc trong việc Xây dựng phong cách cán bộ Đoàn, Hội cấp Trường năm 2020', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có hành động dũng cảm cứu người bị nạn, bắt cướp, giúp người neo đơn, người nghèo, người gặp khó khăn, hoạn nạn trong tình trạng nguy hiểm và cấp thiết được khen thưởng, biểu dương từ trường, cấp xã, phường trở lên hoặc được nêu gương trên các phương tiện truyền thông đại chúng', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia học tập trực tuyến và đánh giá “Các bài Lý luận chính trị” dành cho đoàn viên đạt từ 50/60 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia phần thi cá nhân Hội thi Olympic các môn khoa học Mác - Lênin và tư tưởng Hồ Chí Minh lần XXI, năm 2020 đạt ít nhất 2/3 tuần thi đều có kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia hội thi “Sinh viên Sư phạm với Pháp luật” lần VII, năm 2020 đạt ít nhất 1/2 tuần thi có kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia kiểm tra đợt Sinh hoạt chính trị “Tuổi trẻ Trường Đại học Sư phạm Thành phố Hồ Chí Minh sắt son niềm tin với Đảng” đạt kết quả 40/50 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia kiểm tra đợt Sinh hoạt chính trị “Tuổi trẻ Trường Đại học Sư phạm Thành phố Hồ Chí Minh tự hào Thành phố mang tên Bác” đạt kết quả 40/50 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia hội thi tìm hiểu 75 năm Cách mạng tháng Tám và Quốc khánh 2/9 - Chủ đề: “Tết Độc lập - Hào khí non sông” đạt kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia Hội thi trực tuyến tìm hiểu về Bầu cử Quốc hội khóa XV và Bầu cử Đại biểu Hội đồng nhân dân các cấp nhiệm kỳ 2021 - 2026 đạt kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia học tập Nghị quyết Đại hội Đại biểu Hội Sinh viên Việt Nam Thành phố Hồ Chí Minh lần VI, nhiệm kỳ 2020 - 2023 đạt kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia cuộc thi “Mốc son lịch sử” - kỷ niệm 44 năm ngày Việt Nam gia nhập Liên hợp quốc (20/9/1977 - 20/9/2021) đạt kết quả 35/40 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia Cuộc thi “Tìm hiểu về phong trào học sinh, sinh viên và Hội Sinh viên Việt Nam” đạt kết quả 25/30 câu đúng trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận là Top 30 thí sinh vào vòng chung kết cuộc thi “Tự hào Đoàn ta - 90 mùa hoa rực rỡ”', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia cuộc thi trực tuyến “Tìm hiểu Nghị quyết Đại hội XIII Đảng Cộng sản Việt Nam” đạt ít nhất 3/5 tuần thi có kết quả từ 10/20 điểm trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 2, 'content' => 'Có Giấy chứng nhận tham gia cuộc thi “Tuổi trẻ học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh” năm 2021 đạt ít nhất 3/4 tuần thi có kết quả từ 15/30 điểm trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 3, 'content' => 'Điểm trung bình học tập tích lũy cả năm học 2020 - 2021 đạt từ 3.0/4.0 trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có đề tài nghiên cứu khoa học các cấp (tham gia với tư cách là chủ nhiệm đề tài hoặc đồng tác giả của đề tài) trong năm học 2020 - 2021 được hội đồng khoa học nghiệm thu đánh giá từ loại Đạt trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có thực hiện Khóa luận tốt nghiệp và được Hội đồng đánh giá từ 8.0 điểm trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có đề tài nghiên cứu khoa học sinh viên tham gia giải thưởng sinh viên nghiên cứu khoa học Euréka năm 2020 hoặc năm 2021', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có ít nhất 01 (một) bài viết khoa học được đăng tải hoặc được chấp nhận đăng trên các sản phẩm của các cơ quan truyền thông uy tín hoặc các báo, tạp chí khoa học chuyên ngành hoặc kỷ yếu các Hội thảo khoa học (có được cấp mã nhận dạng ISSN hoặc ISBN)', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có tham luận tham gia hội thảo khoa học từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có sản phẩm sáng tạo được cấp bằng sáng chế, cấp giấy phép xuất bản hoặc đạt các giải thưởng từ cấp tỉnh, thành phố trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Là thành viên đội tuyển tham gia các cuộc thi học thuật cấp trường, thành phố, quốc gia, quốc tế', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Đạt giải khuyến khích trở lên trong các cuộc thi chuyên môn cấp trường, thành phố, toàn quốc do các Hiệp hội ngành nghề, các trường đại học, các cơ quan thông tấn, báo chí tổ chức', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Đạt giải khuyến khích trở lên trong cuộc thi Sinh viên Trường Đại học Sư phạm Thành phố Hồ Chí Minh với ý tưởng khởi nghiệp', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có điểm trung bình học tập tích lũy cả năm học 2020 - 2021 đạt từ 3.6/4.0 trở lên và điểm học phần phương pháp Nghiên cứu khoa học trong năm học 2020 - 2021 đạt 4.0/4.0', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có điểm trung bình học tập tích lũy cả năm học 2020 - 2021 đạt từ 3.6/4.0 trở lên và được biểu dương khen thưởng trên các lĩnh vực chuyên môn tại Trường, địa phương, đơn vị', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Có điểm trung bình học tập tích lũy cả năm học 2020 - 2021 đạt từ 3.6/4.0 trở lên và đạt giải khuyến khích trở lên trong các cuộc thi tìm hiểu về văn hóa, lịch sử, xã hội,… cấp trường, thành phố, toàn quốc', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Đạt Giấy khen cấp Trường trong kỳ thực tập sư phạm của năm học 2020 - 2021', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Đạt Giấy khen “Sinh viên có thành tích học tập và rèn luyện xuất sắc” cấp Trường trong năm học 2020 - 2021', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 4, 'content' => 'Đối với sinh viên khoa Giáo dục Thể chất phải có thành tích nổi bật trong các cuộc thi cấp thành, toàn quốc, khu vực trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 5, 'content' => 'Đạt chứng chỉ ngoại ngữ trình độ B1 hoặc tương đương trở lên (Chấp nhận các chứng nhận, chứng chỉ ngoại ngữ do Trung tâm ngoại ngữ của trường cấp trong các đợt thi thử, thi xếp lớp, thi cuối Khóa; các chứng nhận, chứng chỉ của các Trung tâm ngoại ngữ liên kết với Đoàn Thanh niên - Hội Sinh viên Việt Nam Trường)', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 5, 'content' => 'Đạt 03 (ba) học phần ngoại ngữ tại Trường (theo chương trình đào tạo)', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 5, 'content' => 'Điểm trung bình tích lũy các học phần ngoại ngữ từ năm nhất tới thời điểm xét đạt từ 3.2/4.0 trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 5, 'content' => 'Đạt giải khuyến khích trở lên các cuộc thi kiến thức ngoại ngữ (được hiểu là cuộc thi tìm hiểu ngoại ngữ hoặc cuộc thi sử dụng ngoại ngữ để trình bày) từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 6, 'content' => 'Có Giấy chứng nhận hoàn thành ít nhất 01 (một) lớp kỹ năng thực hành xã hội', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 6, 'content' => 'Đạt giải khuyến khích trở lên trong các cuộc thi về kỹ năng từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 6, 'content' => 'Là giảng viên hoặc báo cáo viên các lớp huấn luyện kỹ năng từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 6, 'content' => 'Đạt Giấy khen đã có thành tích xuất sắc trong công tác Đoàn và phong trào thanh niên hoặc công tác Hội và phong trào sinh viên từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchuan' => 7, 'content' => 'Có Giấy chứng nhận tham gia ít nhất 01 (một) hoạt động giao lưu quốc tế hoặc hoạt động về hội nhập: Hội nghị, Hội thảo quốc tế, các chương trình gặp gỡ, giao lưu, hợp tác với thanh niên, sinh viên quốc tế trong và ngoài nước, các lớp học tập chuyên đề về kỹ năng Hội nhập,…', 'created_at' => now(), 'updated_at' => now()]
        ];
        DB::table('noidung')->insert($noidung); // Query Builder approach

        $noidung1 = [
            ['id_tieuchi' => 3, 'content' => 'Đạt danh hiệu “Thanh niên khỏe” năm học 2020 - 2021 từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 3, 'content' => 'Đạt giải khuyến khích trở lên hoặc đạt Huy chương hoặc có Giấy chứng nhận có thành tích tốt trong các hội thao cấp trường', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 3, 'content' => 'Là thành viên đội tuyển cấp trường, thành phố các môn thể dục, thể thao', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 3, 'content' => 'Có Giấy chứng nhận hoàn thành các giải chạy bộ hoặc đi bộ trực tuyến trên các nền tảng được công nhận và tích lũy ít nhất 80 km hoặc 100.000 bước (đối với nam), 50km hoặc 62.500 bước (đối với nữ)', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 3, 'content' => 'Đối với Sinh viên khuyết tật tiêu chuẩn bao gồm: tập thể dục hàng ngày và rèn luyện ít nhất 01 môn thể thao dành cho người khuyết tật', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 4, 'content' => 'Có Giấy chứng nhận hoàn thành ít nhất 01 (một) trong các chương trình, chiến dịch: chương trình Tiếp sức mùa thi, chiến dịch Xuân tình nguyện, chiến dịch Mùa hè xanh', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 4, 'content' => 'Tham gia tích lũy ít nhất 05 (năm) ngày hoạt động tình nguyện trong năm học', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 4, 'content' => 'Có Giấy chứng nhận hoặc đạt Giấy khen tham gia các hoạt động tình nguyện phòng, chống dịch Covid-19 của các tổ chức chính trị, xã hội các cấp', 'created_at' => now(), 'updated_at' => now()],
            ['id_tieuchi' => 4, 'content' => 'Đạt Giấy khen về hoạt động tình nguyện từ cấp trường trở lên', 'created_at' => now(), 'updated_at' => now()]
        ];
        DB::table('noidung')->insert($noidung1); // Query Builder approach
    }
}
