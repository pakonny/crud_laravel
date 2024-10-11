<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create();
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
            'nama_kategori' => 'Mainan dan Kebutuhan',
            'slug' => 'mainan-dan-kebutuhan'
        ]);
    }

    #[Test]
    public function produk_bisa_dibuat_dengan_kategori_yang_benar()
    {
        $kategori = Kategori::where('slug', 'makanan')->first(); // Mengambil kategori 'Makanan'

        $produk = Produk::create([
            'nama' => 'Nasi Goreng',
            'harga' => 15000,
            'deskripsi' => 'Nasi goreng enak',
            'kategori_id' => $kategori->id,
            'foto' => 'nasi-goreng.jpg'
        ]);

        $this->assertEquals('Makanan', $produk->kategori->nama_kategori);
        $this->assertDatabaseHas('produks', [
            'nama' => 'Nasi Goreng',
            'harga' => 15000,
            'kategori_id' => $kategori->id
        ]);
    }

    #[Test]
    public function produk_bisa_diupdate()
    {
        $kategori = Kategori::where('slug', 'makanan')->first();
        $produk = Produk::create([
            'nama' => 'Nasi Goreng',
            'harga' => 15000,
            'deskripsi' => 'Nasi goreng enak',
            'kategori_id' => $kategori->id,
            'foto' => 'nasi-goreng.jpg'
        ]);

        $produk->update([
            'nama' => 'Nasi Goreng Special',
            'harga' => 20000
        ]);

        $this->assertDatabaseHas('produks', [
            'nama' => 'Nasi Goreng Special',
            'harga' => 20000
        ]);
    }

    #[Test]
    public function produk_bisa_dihapus()
    {
        $kategori = Kategori::where('slug', 'makanan')->first();
        $produk = Produk::create([
            'nama' => 'Nasi Goreng',
            'harga' => 15000,
            'deskripsi' => 'Nasi goreng enak',
            'kategori_id' => $kategori->id,
            'foto' => 'nasi-goreng.jpg'
        ]);

        $produk->delete();

        $this->assertDatabaseMissing('produks', [
            'nama' => 'Nasi Goreng'
        ]);
    }


}
