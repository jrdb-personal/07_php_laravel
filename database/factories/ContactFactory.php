<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

    protected $model = Contact::class;

    public function definition()
    {
        $primary = [0, 1];
        $type = ['Mobile', 'Landline', 'Fax'];
        
        return [
            'user_id' => 3,
            'contact_type' => $type[rand(0,2)],
            'primary' => $primary[rand(0,1)],
            'number' => $this->faker->phoneNumber,
        ];
    }
}
