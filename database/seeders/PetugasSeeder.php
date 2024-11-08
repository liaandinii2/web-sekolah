<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Directly create specific records without using factory
        Petugas::create(['username' => 'admin', 'password' => bcrypt('password123')]);
        Petugas::create(['username' => 'staff1', 'password' => bcrypt('password123')]);
        Petugas::create(['username' => 'staff2', 'password' => bcrypt('password123')]);
    }
}
