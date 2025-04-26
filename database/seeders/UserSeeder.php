<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Christopher Julius',
                'email' => 'christopherlimantoro@gmail.com',
                'password' => bcrypt('password'),
            ]
            ];
            foreach ($users as $user) {
                \App\Models\User::create($user);
            }
    }
}
