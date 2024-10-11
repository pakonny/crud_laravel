<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'nama' => fake()->sentence(1, true),
          'harga' => fake()->randomNumber(5, true),
          'kategori_id' => Kategori::factory(),
          'deskripsi' => fake()->sentence(10),
        ];
    }
}
