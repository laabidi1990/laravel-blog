<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'mabidi1990@gmail.com')->first();
        if (!$user) {
            User::create([
                'name' => 'Abidi Moahmed',
                'email' => 'mabidi1990@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'about' => 'first admin account',
            ]);
        }
    }
}
