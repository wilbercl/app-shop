<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('juan1234'), 
            'admin' => true, 
            'username' => "juan",
            'phone' => 55555555,
            'address' => "La Habana",
        ]);
    }
}
