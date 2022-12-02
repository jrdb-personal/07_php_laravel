<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        /*
        Profile::create([
            'user_id' => 1,
            'first_name' => 'James',
            'last_name' => 'Doe',
            'birth_date' => '2021-01-01',
            'gender' => 'Male',
        ]);
        */
        
        Profile::factory()->count(1)->create();
    }
}
