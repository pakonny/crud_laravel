<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        if(request('search'))
        {
            $produks = Produk::filter(request('search'))->latest()->paginate(8);
        } else {
            $produks = Produk::latest()->paginate(8);
        }
        return view('produks.index', compact('produks'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        return view('produks.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'harga' => str_replace('.', '', $request->input('harga')),
        ]);
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|min:1|max:2147483647',
            'kategori_id' => 'required',
            'deskripsi' => 'nullable|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        $validatedData['harga'] = str_replace(".", "", $validatedData['harga']);
        $foto = $request->file('foto');
        $path = $foto->storeAs('img', $foto->hashName(), 'public');
        Produk::create(array_merge($validatedData, ['foto' => $path]));
        return redirect()->route('produks.index')->with('sukses', 'Penambahan Produk Sukses');
    }


    public function edit(Produk $produk)
    {
        $kategori = $produk->kategori;
        return view('produks.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->merge([
            'harga' => str_replace('.', '', $request->input('harga')),
        ]);
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric|min:1|max:2147483647',
            'kategori_id' => 'required',
            'deskripsi' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);
        $validatedData['harga'] = str_replace(".", "", $validatedData['harga']);


        if ($request->file('foto')) {
            if($produk->foto != 'img/noimage.png'){
                Storage::disk('public')->delete($produk->foto);
            }
            $foto = $request->file('foto');
            $validatedData['foto'] = $foto->storeAs('img', $foto->hashName(), 'public');
        }
        $produk->update($validatedData);
        return redirect()->route('produks.index')->with('sukses', 'Update Produk Sukses');
    }


    public function delete(Produk $produk)
    {
        if ($produk->foto != 'img/noimage.png') {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();
        return redirect()->route('produks.index')->with('sukses', 'Delete Produk Sukses');
    }



}
