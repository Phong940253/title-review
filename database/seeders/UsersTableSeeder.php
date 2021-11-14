<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        $listAdmin = [];
        $listTruong = [
            ['Đại học Sư phạm', 'hcmue@gmail.com'],
        ];
        $listKhoa = [
            ['Nguyễn Văn Phong', 'phong940254@gmail.com', 10],
        ];
        $listUser = [];

        foreach($listTruong as $truong) {
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

        foreach($listKhoa as $khoa) {
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

        $admin = User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $admin->assignRole('admin');

//        $user = User::create([
//            'ms' => '4501104175',
//            'id_unit' => 2,
//            'name' => 'Nguyễn Văn Phong',
//            'email' => 'phong940253@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('01676940253'),
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
//        $user->assignRole('user');
//
//        $khoa = User::create([
//            'name' => 'Nguyễn Văn Phong',
//            'email' => 'phong940254@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('01676940254'),
//            'id_unit' => 2,
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
//        $khoa->assignRole('khoa');
//
//        $khoa1 = User::create([
//            'name' => 'Khoa Công nghệ thông tin',
//            'email' => 'cntt@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('123456'),
//            'id_unit' => 2,
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
//        $khoa1->assignRole('khoa');
//
//        $khoa2 = User::create([
//            'name' => 'Khoa Toán',
//            'email' => 'toan@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('123456'),
//            'id_unit' => 1,
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
//        $khoa2->assignRole('khoa');
//
//        $truong = User::create([
//            'name' => 'Đại học Sư phạm',
//            'email' => 'hcmue@gmail.com',
//            'email_verified_at' => now(),
//            'password' => Hash::make('123456'),
//            'created_at' => now(),
//            'updated_at' => now()
//        ]);
//        $truong->assignRole('truong');
    }
}
