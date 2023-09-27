<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wisata>
 */
class WisataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_wisata' => $this->faker->lexify(),
            'alamat' => $this->faker->lexify(),
            'deskripsi' => $this->faker->lexify(),
            'gambar' => '' 
        ];
    }
}