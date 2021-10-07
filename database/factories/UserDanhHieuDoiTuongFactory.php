<?php

namespace Database\Factories;

use App\Models\DanhHieuDoiTuong;
use App\Models\UserDanhHieuDoiTuong;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDanhHieuDoiTuongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserDanhHieuDoiTuong::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $edit = $this->faker->numberBetween(0, 1);
        return [
            'id_danhhieu_doituong' => DanhHieuDoiTuong::inRandomOrder()->first()->id,
            'edit' => $edit,
            'confirmed' => $edit ? $this->faker->numberBetween(0, 1) : 0,
        ];
    }
}
