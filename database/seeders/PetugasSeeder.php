<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
            [
                'username' => 'staff1',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
            [
                'username' => 'staff2',
                'password' => Hash::make('password123'),
                'created_at' => now(),
            ],
        ]);
    }
}
