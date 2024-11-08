<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Directly create specific categories without using factory
        Kategori::create(['judul' => 'Informasi']);
        Kategori::create(['judul' => 'Agenda']);
        Kategori::create(['judul' => 'Galeri']);
    }
}
