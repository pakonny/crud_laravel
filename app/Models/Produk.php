<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    protected $with = ['kategori'];
    protected $fillable = [
        'nama',
        'harga',
        'deskripsi',
        'foto',
        'kategori_id',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function scopeFilter($query, $filters): void
    {
        $query->when(
            $filters ?? false,
            fn ($query, $search) =>
            $query->where('nama' ,'like', '%' . $search . '%' )
        );
    }

}
