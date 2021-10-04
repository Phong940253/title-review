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
        $role1 = Role::create(['name'=>'user']);
        $role2 = Role::create(['name'=>'khoa']);
        $role3 = Role::create(['name'=>'truong']);
        $role4 = Role::create(['name'=>'admin']);
        $xem_tieu_chi = Permission::create(['name'=>'xem tiêu chí']);
        $tra_loi_tieu_chi = Permission::create(['name'=>'trả lời đề cử']);
        $sua_thong_tin = Permission::create(['name' => 'sửa thông tin']);
        $xuat_de_cu = Permission::create(['name'=>'xuất đề cử']);
        $chon_de_cu = Permission::create(['name' => 'chọn đề cử']);
        $de_trong_thong_tin = Permission::create(['name' => 'để trống thông tin']);


        $xem_tieu_chi->assignRole($role1);
        $tra_loi_tieu_chi->assignRole($role1);
        $sua_thong_tin->assignRole($role1);
        $xuat_de_cu->assignRole($role1);
        $chon_de_cu->assignRole($role1);
        $de_trong_thong_tin->assignRole($role2);
        $de_trong_thong_tin->assignRole($role3);
        $de_trong_thong_tin->assignRole($role4);


        $units = [[
            'name' => 'Toán',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ], [
            'name' => 'CNTT',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]];

        DB::table('unit')->insert($units); // Query Builder approach

    }
}
