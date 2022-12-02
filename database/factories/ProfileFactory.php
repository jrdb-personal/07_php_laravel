<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        $gender = ['Male', 'Female'];
        
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'birth_date' => $this->faker->date(),
            'nationality' => $this->faker->country,
            'gender' => $gender[rand(0,1)],
        ];
    }
}
