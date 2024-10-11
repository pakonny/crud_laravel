<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('produks', [ProdukController::class, 'index'])->name('produks.index');
    Route::get('produks/create', [ProdukController::class, 'create'])->name('produks.create');
    Route::post('produks', [ProdukController::class, 'store'])->name('produks.store');
    Route::get('produks/{produk}/edit', [ProdukController::class, 'edit'])->name('produks.edit');
    Route::put('produks/{produk}', [ProdukController::class, 'update'])->name('produks.update'); 
    Route::delete('produks/{produk}', [ProdukController::class , 'delete'])->name('produks.delete'); 

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
