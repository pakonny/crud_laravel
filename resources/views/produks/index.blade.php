<x-app-layout>
        <div class="w-full mx-auto sm:px-6 lg:px-8 my-6">
            @if(session()->has('sukses'))
           <x-alert message="{{ session('sukses') }}"/> {{-- session sukses diambil dari controller produk --}}
           @endif
            <div class="bg-white  dark:bg-gray-800 overflow-hidden shadow-2xl  sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold flex flex-col sm:flex-row sm:justify-between items-center gap-4">
                    <p class="text-lg">List Produk</p>
                    <x-search></x-search>
                    <a href="{{ route('produks.create') }}" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-md font-bold text-sm">Tambah</a>
                </div>

                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @if ($produks->isEmpty())
                        <div class="col-span-full flex flex-col items-center justify-center h-full text-center mt-10">
                            <p class="text-lg font-semibold text-gray-700 mb-2">Tidak ada produk yang tersedia</p>
                            <p class="text-gray-500">Silakan tambahkan produk baru untuk ditampilkan di sini.</p>
                            <svg class="w-16 h-16 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m0 0l-3-3m3 3l3-3" />
                            </svg>
                        </div>
                    @else
                        @foreach ($produks as $produk)
                            <div class="group mx-5 mb-10">
                                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 border">
                                    <img src="{{ url('storage/' . $produk->foto) }}" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                </div>
                                <div class="my-4">
                                    <div class="flex justify-between align-items-center">
                                        <h3 class="text-sm text-gray-700 p-2">{{ $produk->nama }}</h3>
                                        <h3 class="bg-gray-100 font-bold text-primary-800 text-xs inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">{{ $produk->kategori->nama_kategori }}</h3>
                                    </div>
                                    <p class="mt-1 text-lg font-medium text-gray-900">Rp. {{ number_format($produk->harga) }}</p>
                                </div>
                                <a href="{{ route('produks.edit', $produk) }}">
                                    <button class="w-full px-10 bg-gray-200 rounded-md py-2 font-bold">Edit</button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                
                <div class="flex justify-center my-10 ">
                    {{ $produks->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
</x-app-layout>
