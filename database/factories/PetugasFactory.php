<?php

namespace Database\Factories;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetugasFactory extends Factory
{
    protected $model = Petugas::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            // Add other fields as needed, for example:
            'password' => bcrypt('password'), // Use bcrypt or Hash::make for password hashing
            // Other attributes can be added here as necessary
        ];
    }
}
