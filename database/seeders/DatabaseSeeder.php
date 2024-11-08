<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil seeder untuk Petugas dan Kategori terlebih dahulu
        $this->call([
            PetugasSeeder::class,
            KategoriSeeder::class,
        ]);

        // \App\Models\Post::factory(5)->create()->each(function ($post) {
        //     // Membuat Galery untuk setiap Post
        //     $post->galery()->saveMany(\App\Models\Galery::factory(3)->make())->each(function ($galery) {
        //         // Membuat Foto untuk setiap Galery
        //         $galery->fotos()->saveMany(\App\Models\Foto::factory(2)->make());
        //     });
        // });

    }
}
