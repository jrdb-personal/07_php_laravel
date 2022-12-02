<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    public function run()
    {    
        /*
        User::create([
            'name' => 'Joe',
            'email' => 'joe@gmail.com',
            'password' => '$2y$10$9QK5Pn64QaRHHJae5G3IquWOwJWfj5ZF3vxcZgtuPzfP.W/rep3LC',//password
        ]); 
        */
        
        User::factory()
                ->has(
                    Profile::factory()->count(1)
                )        
                ->create();
    }
}
