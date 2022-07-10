<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::create([
            'user_id' => 1,
            'first_name' => 'James',
            'last_name' => 'Doe',
            'birthdate' => '2021-01-01',
            'gender' => 'Male',
        ]); 
    }
}
