<x-app-layout>

    <div class="w-full mx-auto sm:px-6 lg:px-8 my-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">

            <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold flex justify-between align-middle">
                <p>Create Produk</p>
            </div>



<div x-data="{ imageUrl: '/storage/img/noimage.png' }">
    <form enctype="multipart/form-data" action="{{ route('produks.store') }}" method="POST">
        @csrf
        <div class="flex">

            <div class="relative w-1/2" style="padding-bottom: 36.25%;">
                <img :src="imageUrl" class="absolute inset-0 w-full h-full object-cover rounded-md" alt="">
            </div>

            <div class="w-1/2">
                <div class="p-5">
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')"  />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>
                <div class="p-5">
                    <x-input-label for="foto" :value="__('Foto')" />
                    <x-text-input
                    accept="image/*"
                    id="foto"
                    class="block mt-1 w-full border p-2"
                    type="file"
                    name="foto"
                    :value="old('foto')"
                    required
                    @change="imageUrl = URL.createObjectURL($event.target.files[0])"
                    />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>
                <div class="p-5">
                    <x-input-label for="harga" :value="__('Harga')" />
                    <x-text-input id="harga" x-mask:dynamic="$money($input, ',')" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')" required />
                    <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                </div>
                <div class="p-5">
                    <x-input-label for="kategori" :value="__('Kategori')" />
                    <select name="kategori_id" id="kategori" required class="block mt-1 w-full  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="" disabled selected>- Pilih Kategori -</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                        @endforeach
                        {{-- <option value="Makanan">Makanan</option>
                        <option value="Barang Elektronik">Barang Elektronik</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Mainan dan Kebutuhan">Mainan dan Kebutuhan</option> --}}
                    </select>
                    <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                </div>
                <div class="p-5">
                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                    <x-textarea id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" >{{ old('deskripsi') }}</x-textarea>
                    <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                </div>

        <div class="p-5">
            <x-primary-button class=" justify-center w-full py-3">
                {{ __('Kirim') }}
            </x-primary-button>
            </div>
            </div>
        </div>


    </form>
</div>







        </div>
    </div>

</x-app-layout>
