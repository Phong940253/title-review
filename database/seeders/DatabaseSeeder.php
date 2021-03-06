<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([TestData::class]);
        $this->call([TitleData::class]);
        $this->call([PublicUser::class]);
//        $this->call([UsersTableSeeder::class]);
        $this->call([Constant::class]);
        $this->call([ReligionData::class]);
    }
}
