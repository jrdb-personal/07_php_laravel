<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        
        return [
            'item_sku' => $this->faker->word,
            'item_desc' => $this->faker->text,
            'item_cost' => $this->faker->randomDigit,
        ];
    }
}
