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
        //user root
        User::create([
            'username'=> 'Admin',
            'email'=> 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'=> bcrypt('123123'),
            'role_id'=> 1
        ]);
    }
}
