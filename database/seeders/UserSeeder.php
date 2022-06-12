<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Anwar Barakat',
            'email'         => 'brkatanwar0@admin.com',
            'password'      => bcrypt('adminadmin'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
