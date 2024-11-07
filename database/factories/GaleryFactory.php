<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class GaleryFactory extends Factory
{
    protected $model = \App\Models\Galery::class;

    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'position' => $this->faker->randomDigit(),
            'status' => $this->faker->boolean(),
        ];
    }
}
