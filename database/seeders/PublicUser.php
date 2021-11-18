<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PublicUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Admin',
            'email' => 'khenthuong.hcmue@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dhsuphamhcm@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $admin->assignRole('admin');

        $listTruong = [
            ['Bộ phận thẩm định Đoàn Trường', 'vpdoantn@hcmue.edu.vn'],
            ['Bộ phận thẩm định Hội SVVN Trường', 'vphoisinhvien@hcmue.edu.vn'],
            ['Nguyễn Khánh Tùng', 'tungnk.hcmue@gmail.com'],
            ['Võ Tuấn Hào', 'haovt.hcmue@gmail.com'],
            ['Nguyễn Phan Hoàng Anh', 'anhnph.hcmue@gmail.com'],
            ['Phạm Thị Hương Quỳnh', 'quynhpth.hcmue@gmail.com'],
            ['Trương Bá Bình Phương', 'phuongtbb.hcmue@gmail.com'],
            ['Nguyễn Thị Kim Ánh', 'anhntk.hcmue@gmail.com'],
            ['Nguyễn Thị Ngọc Trân', 'tranntn.hcmue@gmail.com'],
            ['Cao Trần Trí', 'trict.hcmue@gmail.com'],
            ['Nguyễn Ngọc Phi Bảo', 'baonnp.hcmue@gmail.com'],
            ['Võ Lập Phúc', 'phucvl.hcmue@gmail.com'],
            ['Hoàng Tuấn Đức', 'ducht.hcmue@gmail.com'],
            ['Nguyễn Minh Uyên', 'uyennm.hcmue@gmail.com'],
            ['Nguyễn Thị Trúc Lam', 'lamntt.hcmue@gmail.com'],
            ['Trần Kiến Lương', 'luongtk.hcmue@gmail.com']
        ];
        $listKhoa = [
            ['Đoàn khoa Toán - Tin học', 'dtn.toanhoc@gmail.com', 1],
            ['Liên Chi hội khoa Toán - Tin học', 'lch.toanhoc@gmail.com', 2],
            ['Đoàn khoa Vật lí', 'dtn.vatli@gmail.com', 3],
            ['Liên Chi hội khoa Vật lí', 'lch.vatli@gmail.com', 4],
            ['Đoàn khoa Hoá học', 'dtn.hoahoc@gmail.com', 5],
            ['Liên Chi hội khoa Hoá học', 'lch.hoahoc@gmail.com', 6],
            ['Đoàn khoa Sinh học', 'dtn.sinhhoc@gmail.com', 7],
            ['Liên Chi hội khoa Sinh học', 'lch.sinhhoc@gmail.com', 8],
            ['Đoàn khoa Công nghệ Thông tin', 'dtn.cntt@gmail.com', 9],
            ['Liên Chi hội khoa Công nghệ Thông tin', 'lch.cntt@gmail.com', 10],
            ['Đoàn khoa Ngữ văn', 'dtn.nguvan@gmail.com', 11],
            ['Liên Chi hội khoa Ngữ văn', 'lch.nguvan@gmail.com', 12],
            ['Đoàn khoa Lịch sử', 'dtn.lichsu@gmail.com', 13],
            ['Liên Chi hội khoa Lịch sử', 'lch.lichsu@gmail.com', 14],
            ['Đoàn khoa Địa lí', 'dtn.diali@gmail.com', 15],
            ['Liên Chi hội khoa Địa lí', 'lch.diali@gmail.com', 16],
            ['Đoàn khoa Giáo dục Chính trị', 'dtn.gdct@gmail.com', 17],
            ['Liên Chi hội khoa Giáo dục Chính trị', 'lch.gdct@gmail.com', 18],
            ['Đoàn khoa Khoa học Giáo dục', 'dtn.khgd@gmail.com', 19],
            ['Liên Chi hội khoa Khoa học Giáo dục', 'lch.khgd@gmail.com', 20],
            ['Đoàn khoa Tâm lý học', 'dtn.tamly@gmail.com', 21],
            ['Liên Chi hội khoa Tâm lý học', 'lch.tamly@gmail.com', 22],
            ['Đoàn khoa Tiếng Anh', 'dtn.tienganh@gmail.com', 23],
            ['Liên Chi hội khoa Tiếng Anh', 'lch.tienganh@gmail.com', 24],
            ['Đoàn khoa Tiếng Trung', 'dtn.tiengtrung@gmail.com', 25],
            ['Liên Chi hội khoa Tiếng Trung', 'lch.tiengtrung@gmail.com', 26],
            ['Đoàn khoa Tiếng Nga', 'dtn.tiengnga@gmail.com', 27],
            ['Liên Chi hội khoa Tiếng Nga', 'lch.tiengnga@gmail.com', 28],
            ['Đoàn khoa Tiếng Pháp', 'dtn.tiengphap@gmail.com', 29],
            ['Liên Chi hội khoa Tiếng Pháp', 'lch.tiengphap@gmail.com', 30],
            ['Đoàn khoa Tiếng Nhật', 'dtn.tiengnhat@gmail.com', 31],
            ['Liên Chi hội khoa Tiếng Nhật', 'lch.tiengnhat@gmail.com', 32],
            ['Đoàn khoa Tiếng Hàn Quốc', 'dtn.tienghan@gmail.com', 33],
            ['Liên Chi hội khoa Tiếng Hàn Quốc', 'lch.tienghan@gmail.com', 34],
            ['Đoàn khoa Giáo dục Tiểu học', 'dtn.gdth@gmail.com', 35],
            ['Liên Chi hội khoa Giáo dục Tiểu học', 'lch.gdth@gmail.com', 36],
            ['Đoàn khoa Giáo dục Mầm non', 'dtn.gdmn@gmail.com', 37],
            ['Liên Chi hội khoa Giáo dục Mầm non', 'lch.gdmn@gmail.com', 38],
            ['Đoàn khoa Giáo dục Đặc biệt', 'dtn.gddb@gmail.com', 39],
            ['Liên Chi hội khoa Giáo dục Đặc biệt', 'lch.gddb@gmail.com', 40],
            ['Đoàn khoa Giáo dục Quốc phòng', 'dtn.gdqp@gmail.com', 41],
            ['Liên Chi hội khoa Giáo dục Quốc phòng', 'lch.gdqp@gmail.com', 42],
            ['Đoàn khoa Giáo dục Thể chất', 'dtn.gdtc@gmail.com', 43],
            ['Liên Chi hội khoa Giáo dục Thể chất', 'lch.gdtc@gmail.com', 44],
            ['Đoàn Trường Trung học Thực hành', 'dtn.thth@gmail.com', 45],
            ['Đoàn khối Viên chức', 'dtn.dkvc@gmail.com', 46],
            ['Câu lạc bộ Tổ chức Sự kiện', 'clb.tcsk@gmail.com', 47],
            ['Câu lạc bộ Văn hóa Nghệ thuật', 'clb.vhnt@gmail.com', 48],
            ['Câu lạc bộ Tiếng Anh Giao tiếp', 'clb.tagt@gmail.com', 49],
            ['Câu lạc bộ Ứng dụng STEM', 'clb.stem@gmail.com', 50],
            ['Câu lạc bộ Tâm lí - Ngôi nhà trái tim', 'clb.nntt@gmail.com', 51],
            ['Câu lạc bộ Sinh viên Sáng tạo', 'clb.svst@gmail.com', 52],
            ['Câu lạc bộ Bóng rổ', 'clb.bongro@gmail.com', 53],
            ['Câu lạc bộ Ghita', 'clb.ghita@gmail.com', 54],
            ['Câu lạc bộ Tình nguyện Quốc tế', 'clb.tnqt@gmail.com', 55],
            ['Đội công tác xã hội BeeGroup', 'clb.ctxh@gmail.com', 56],
            ['Câu lạc bộ Võ cổ truyền Bảo Y Võ Việt', 'clb.voct@gmail.com', 57],
            ['Văn phòng Đoàn Trường', 'vpdoantn@gmail.com', 58],
            ['Văn phòng Hội Sinh viên Việt Nam Trường', 'vphoisinhvien@gmail.com', 59]
        ];
        $listUser = [];

        foreach ($listTruong as $truong) {
            $createTruong = User::create([
                'name' => $truong[0],
                'email' => $truong[1],
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $createTruong->assignRole('truong');
        }

        foreach ($listKhoa as $khoa) {
            $createKhoa = User::create([
                'name' => $khoa[0],
                'email' => $khoa[1],
                'id_unit' => $khoa[2],
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $createKhoa->assignRole('khoa');
        }

    }
}
