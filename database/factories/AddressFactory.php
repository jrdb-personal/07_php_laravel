<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        $primary = [0,1];
        $type = ['Home', 'Office', 'Others'];

        return [
            'user_id' => 4/*function () {
                return User::factory()->create()->id;
            }*/,
            'address_type' => $type[rand(0,2)],
            'primary' => $primary[rand(0,1)],
            'address' => $this->faker->streetAddress,
            'municipality' => $this->faker->city,
            'region' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
        ];
    }
}
