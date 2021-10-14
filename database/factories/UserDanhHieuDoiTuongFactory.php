<?php

namespace Database\Factories;

use App\Models\DanhHieuDoiTuong;
use App\Models\User;
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
        $confirmed = $edit ? $this->faker->numberBetween(0, 1) : 0;
        $id_approved = $confirmed ? User::role('khoa')->first()->id : NULL;
        return [
            'id_danhhieu_doituong' => function(array $attributes) {
//                $origin = DanhHieuDoiTuong::all()->pluck('id');
//                $subtract = User::find($attributes['id_users'])->selectTitle()->pluck('id_danhhieu_doituong');
//                $res = $origin->diff($subtract)->random();
//                echo $origin;
//                echo $attributes['id_users'];
//                echo $subtract;
//                echo $res;
                return DanhHieuDoiTuong::all()->random()->id;
            },
            'id_approved' => $id_approved,
            'edit' => $edit,
            'confirmed' => $confirmed,
        ];
    }
}
