<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDanhHieuDoiTuong;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class RandomUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(100)
            ->has(UserDanhHieuDoiTuong::factory()->count(1), 'selectTitle')
            ->create();

        $users->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
