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
        $admin = User::create([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'ms' => '4501104175',
            'id_unit' => 2,
            'name' => 'Nguyễn Văn Phong',
            'email' => 'phong940253@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('01676940253'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $user->assignRole('user');

        $khoa = User::create([
            'name' => 'Nguyễn Văn Phong',
            'email' => 'phong940254@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('01676940254'),
            'id_unit' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $khoa->assignRole('khoa');
    }
}
