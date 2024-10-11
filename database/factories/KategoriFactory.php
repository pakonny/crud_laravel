<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $index = 0; // Gunakan indeks tetap yang meningkat setiap kali factory dipanggil

        $kategoris = ['Teknologi', 'Olahraga', 'Kesehatan', 'Jamba'];
        $slugs = ['teknologi', 'olahraga', 'kesehatan', 'jamba'];

        // Pastikan indeks tidak melebihi jumlah item di array
        if ($index >= count($kategoris)) {
            $index = 0;
        }

        return [
            'nama_kategori' => $kategoris[$index],
            'slug' => $slugs[$index++],  // Gunakan slug yang sesuai dengan indeks
        ];
    }
}
