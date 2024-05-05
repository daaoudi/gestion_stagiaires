<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory(count:1)->create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin'=>1,
            'user_type'=>'admin'
        ]);
    }
}
