<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Makanan',
            'slug' => 'makanan'
        ]);
        Kategori::create([
            'nama_kategori' => 'Barang Elektronik',
            'slug' => 'barang-elektronik'
        ]);
        Kategori::create([
            'nama_kategori' => 'Minuman',
            'slug' => 'minuman'
        ]);
        Kategori::create([
            'nama_kategori' => 'Kebutuhan Harian',
            'slug' => 'kebutuhan-harian'
        ]);
        Kategori::create([
            'nama_kategori' => 'Mainan',
            'slug' => 'mainan'
        ]);
    }
}
