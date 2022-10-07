<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class readerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'first_name' => 'Dear',
            'last_name' => 'Reader',
            'email' => 'reader@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $user->attachRole('reader');
    }
}
