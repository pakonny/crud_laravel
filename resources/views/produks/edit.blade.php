<x-app-layout>
    <div class="w-full mx-auto sm:px-6 lg:px-8 my-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">

            <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold flex justify-between align-middle">
                <p>Edit Produk</p>
                <x-danger-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-produk-deletion')">{{ __('Delete Produk') }}</x-danger-button>
            </div>

            <x-modal name="confirm-produk-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                <form method="post" action="{{ route('produks.delete', $produk) }}" class="p-6">
                    @csrf
                    @method('DELETE')
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Apakah Kamu Yakin Ingin Menghapus Produk Ini?') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Produk Yang Sudah dihapus Tidak akan Bisa Dikembalikan Lagi!') }}
                    </p>
                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                        <x-danger-button class="ms-3">
                            {{ __('Delete Produk') }}
                        </x-danger-button>
                    </div>
                </form>
            </x-modal>


            <div x-data="{ imageUrl: '/storage/{{ $produk->foto }}' }">
                <form enctype="multipart/form-data" action="{{ route('produks.update', $produk) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-1/2 aspect-h-1">
                            <img :src="imageUrl" class="rounded-md" alt="">
                        </div>
                        <div class="w-1/2">
                            <div class="p-5">
                                <x-input-label for="nama" :value="__('Nama')" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                    :value="$produk->nama" />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                            <div class="p-5">
                                <x-input-label for="foto" :value="__('Foto')" />
                                <x-text-input accept="image/*" id="foto" class="block mt-1 w-full border p-2"
                                    type="file" name="foto" :value="$produk->foto"
                                    @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                            </div>
                            <div class="p-5">
                                <x-input-label for="harga" :value="__('Harga')" />
                                <x-text-input id="harga" x-mask:dynamic="$money($input, ',')"
                                    class="block mt-1 w-full" type="text" name="harga" :value="$produk->harga"
                                    required />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>
                            <div class="p-5">
                                <x-input-label for="kategori" :value="__('Kategori')" />
                                <select name="kategori_id" id="kategori" required
                                    class="block mt-1 w-full  border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="" disabled selected>- Pilih Kategori -</option>

                                    <option value="{{ $kategori->id }}"
                                        {{ $kategori->id == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Barang Elektronik</option>
                                    <option value="3">Minuman</option>
                                    <option value="4">Mainan dan Kebutuhan</option>
                                </select>
                                <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                            </div>
                            <div class="p-5">
                                <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                <x-textarea id="deskripsi" class="block mt-1 w-full" type="text"
                                    name="deskripsi">{{ $produk->deskripsi }}</x-textarea>
                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                            </div>
                            <div class="p-5">
                                <x-primary-button class="  py-3">
                                    {{ __('Kirim') }}
                                </x-primary-button>

                            </div>

                        </div>
                    </div>


                </form>

        </div>
    </div>
</x-app-layout>
