<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Profiler\Profile;

class TestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'user']);
        $role2 = Role::create(['name' => 'khoa']);
        $role3 = Role::create(['name' => 'truong']);
        $role4 = Role::create(['name' => 'admin']);
        $xem_tieu_chi = Permission::create(['name' => 'xem tiêu chí']);
        $tra_loi_tieu_chi = Permission::create(['name' => 'trả lời đề cử']);
        $sua_thong_tin = Permission::create(['name' => 'sửa thông tin']);
        $xuat_de_cu = Permission::create(['name' => 'xuất đề cử']);
        $chon_de_cu = Permission::create(['name' => 'chọn đề cử']);
        $de_trong_thong_tin = Permission::create(['name' => 'để trống thông tin']);
        $duyet_xem_de_cu = Permission::create(['name' => 'duyệt - xem đề cử']);


        $xem_tieu_chi->assignRole($role1);
        $tra_loi_tieu_chi->assignRole($role1);
        $sua_thong_tin->assignRole($role1);
        $xuat_de_cu->assignRole($role1);
        $chon_de_cu->assignRole($role1);
        $de_trong_thong_tin->assignRole($role2);
        $de_trong_thong_tin->assignRole($role3);
        $de_trong_thong_tin->assignRole($role4);
        $duyet_xem_de_cu->assignRole($role2);
        $duyet_xem_de_cu->assignRole($role3);

        $units = [];
        $names = [
            "Đoàn khoa Toán - Tin học",
            "Liên Chi hội khoa Toán - Tin học",
            "Đoàn khoa Vật lí",
            "Liên Chi hội khoa Vật lí",
            "Đoàn khoa Hoá học",
            "Liên Chi hội khoa Hoá học",
            "Đoàn khoa Sinh học",
            "Liên Chi hội khoa Sinh học",
            "Đoàn khoa Công nghệ Thông tin",
            "Liên Chi hội khoa Công nghệ Thông tin",
            "Đoàn khoa Ngữ văn",
            "Liên Chi hội khoa Ngữ văn",
            "Đoàn khoa Lịch sử",
            "Liên Chi hội khoa Lịch sử",
            "Đoàn khoa Địa lí",
            "Liên Chi hội khoa Địa lí",
            "Đoàn khoa Giáo dục Chính trị",
            "Liên Chi hội khoa Giáo dục Chính trị",
            "Đoàn khoa Khoa học Giáo dục",
            "Liên Chi hội khoa Khoa học Giáo dục",
            "Đoàn khoa Tâm lý học",
            "Liên Chi hội khoa Tâm lý học",
            "Đoàn khoa Tiếng Anh",
            "Liên Chi hội khoa Tiếng Anh",
            "Đoàn khoa Tiếng Trung",
            "Liên Chi hội khoa Tiếng Trung",
            "Đoàn khoa Tiếng Nga",
            "Liên Chi hội khoa Tiếng Nga",
            "Đoàn khoa Tiếng Pháp",
            "Liên Chi hội khoa Tiếng Pháp",
            "Đoàn khoa Tiếng Nhật",
            "Liên Chi hội khoa Tiếng Nhật",
            "Đoàn khoa Tiếng Hàn Quốc",
            "Liên Chi hội khoa Tiếng Hàn Quốc",
            "Đoàn khoa Giáo dục Tiểu học",
            "Liên Chi hội khoa Giáo dục Tiểu học",
            "Đoàn khoa Giáo dục Mầm non",
            "Liên Chi hội khoa Giáo dục Mầm non",
            "Đoàn khoa Giáo dục Đặc biệt",
            "Liên Chi hội khoa Giáo dục Đặc biệt",
            "Đoàn khoa Giáo dục Quốc phòng",
            "Liên Chi hội khoa Giáo dục Quốc phòng",
            "Đoàn khoa Giáo dục Thể chất",
            "Liên Chi hội khoa Giáo dục Thể chất",
            "Đoàn Trường Trung học Thực hành",
            "Đoàn khối Viên chức",
            "Câu lạc bộ Tổ chức Sự kiện",
            "Câu lạc bộ Văn hóa Nghệ thuật",
            "Câu lạc bộ Tiếng Anh Giao tiếp",
            "Câu lạc bộ Ứng dụng STEM",
            "Câu lạc bộ Tâm lí - Ngôi nhà trái tim",
            "Câu lạc bộ Sinh viên Sáng tạo",
            "Câu lạc bộ Bóng rổ",
            "Câu lạc bộ Ghita",
            "Câu lạc bộ Tình nguyện Quốc tế",
            "Đội công tác xã hội BeeGroup",
            "Câu lạc bộ Võ cổ truyền Bảo Y Võ Việt",
            "Văn phòng Đoàn Trường",
            "Văn phòng Hội Sinh viên Việt Nam Trường",
        ];

        foreach ($names as $name) {
            array_push($units, [
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        DB::table('unit')->insert($units); // Query Builder approach

    }
}
