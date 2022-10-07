<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class storyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'first_name' => 'Story',
            'last_name' => 'Teacher',
            'email' => 'story@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->attachRole('story');
    }
}
