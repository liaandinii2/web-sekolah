<?php

namespace Database\Factories;

use App\Models\Galery;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    protected $model = \App\Models\Foto::class;

    public function definition()
    {
        return [
            'galery_id' => Galery::factory(),
            'file' => $this->faker->imageUrl(),
            'judul' => $this->faker->word(),
        ];
    }
}

