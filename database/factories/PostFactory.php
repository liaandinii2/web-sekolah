<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(),
            'kategori_id' => Kategori::factory(),
            'isi' => $this->faker->paragraph(),
            'petugas_id' => Petugas::factory(),
            'status' => $this->faker->boolean(),
        ];
    }
}
