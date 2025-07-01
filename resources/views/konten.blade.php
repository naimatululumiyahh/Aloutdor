<!DOCTYPE html>
<html lang="id">
@include('head')
<body class="bg-gray-100 font-poppins">

@include('navbar')

<!-- Sidebar: Kategori -->
<div class="container mx-auto mt-8 flex px-4 md:px-6 lg:px-8">
    <aside class="w-1/4 pr-8">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Kategori</h2>
        <div class="border-b-4 border-red-400 w-16 mb-4"></div>
        <ul class="space-y-4">
            <!-- @php
                $kategoriNama = [
                    1 => 'Berteduh',
                    2 => 'Memasak',
                    3 => 'Hiking',
                    4 => 'Teknologi',
                    5 => 'Survival',
                ];
                // All categories checked by default
                $selectedCategory = request()->input('category_id') ?: array_keys($kategoriNama);
            @endphp -->


            @php
                $currentKategori = request()->route('id_kategori') ?? request()->input('id_kategori') ?? 0;
            @endphp
            
            <select class="border border-gray-300 rounded p-1" 
            onchange="window.location.href='{{ route('barang.kategori', ['id_kategori' => $currentKategori])}}?sort=' + this.value;"> <!--diilangin phpnya malah merah-->
                <option value="relevansi" {{ isset($sort) && $sort === 'relevansi' ? 'selected' : '' }}>Relevansi</option>
                <option value="low_to_high" {{ isset($sort) && $sort === 'low_to_high' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                <option value="high_to_low" {{ isset($sort) && $sort === 'high_to_low' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
            </select>
            

            @foreach ($kategoriNama as $id => $nama)
                <li class="flex items-center space-x-2">
                    <a href="{{ route('barang.kategori', ['id_kategori' => $id]) }}" class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox text-red-400" id="kategori-{{ $id }}" readonly {{ in_array($id, (array)$selectedCategory) ? 'checked' : '' }}>
                        <label for="kategori-{{ $id }}" class="text-gray-900 font-semibold cursor-pointer">
                            {{ $nama }}
                        </label>
                    </a>
                </li>
            @endforeach
            <!-- Link to show all categories -->
            <li class="flex items-center space-x-2">
                <a href="{{route('barang.kategori', ['id_kategori' => 0])}}" class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400" id="kategori-all" readonly {{ !request()->input('category_id') ? 'checked' : '' }}>
                    <label for="kategori-all" class="text-gray-900 font-semibold cursor-pointer">
                        Semua
                    </label>
                </a>
            </li>
        </ul>
    </aside>

        <!-- Main Content: Daftar Barang -->
        <main class="w-3/4">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-red-400">Produk Kami</h2>
                    <p class="text-gray-400">Yuk jelajahi alam dengan menyewa alat kami!</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-gray-700 font-semibold">Sortir Berdasarkan:</span>
                    <select class="border border-gray-300 rounded p-1">
                        <option>Relevansi</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                    @foreach ($data as $barang)
                        <?php
                        $gambarArray = json_decode($barang->gambar);
                        $gambarPertama = $gambarArray[0] ?? null;
                        ?>
                        {{-- <li class="bg-white rounded-lg shadow-md p-4">
                            <img src="{{ asset('storage/' . $gambarPertama) }}" alt="{{ $barang->nama_barang }}" class="w-full h-64 object-cover rounded-lg">
                            <div class="mt-4">
                                <h3 class="text-xl font-bold">{{ $barang->nama_barang }}</h3>
                                <p class="text-red-400 font-semibold">Rp {{ number_format($barang->harga_per_hari) }}</p>
                                <p class="text-gray-600 text-sm">{{ $barang->deskripsi }}</p>
                                <p class="text-gray-600 text-sm text-right">{{ $barang->jumlah }} Tersewa</p>
                                <a href="{{ route('sewa.show', $barang->id) }}" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                            </div>
                        {{-- <li>{{ $barang->nama_barang }} - Rp {{ number_format($barang->harga_per_hari) }}</li> --}}
                        <a href="  
                        {{ route('user.detail', $barang->id) }}
                         " class="block transition duration-200 hover:shadow-lg">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <img src="{{ asset('images/barang/' . $gambarPertama) }}" alt="{{ $barang->nama_barang }}" class="w-full h-64 object-cover rounded-lg">
                                <div class="mt-4">
                                    <h3 class="text-xl font-bold">{{ $barang->nama_barang }}</h3>
                                    <p class="text-red-400 font-semibold">Rp {{ number_format($barang->harga_per_hari) }}</p>
                                    {{-- <div class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</div> --}}
                                </div>
                            </div>
                        </a>
                    @endforeach
            
                <!-- Contoh Kartu Barang -->
                
                <!-- Tambahan kartu barang (contoh, ulangi sesuai data dinamis) -->
                {{-- <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Sleeping Bag" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Sleeping Bag</h3>
                        <p class="text-red-400 font-semibold">Rp 20.000 /hari</p>
                        <p class="text-gray-600 text-sm">Nyaman untuk camping malam</p>
                        <p class="text-gray-600 text-sm text-right">80 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div> --}}
                  <!-- Contoh Kartu Barang -->
                {{-- <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div>
                  <!-- Contoh Kartu Barang -->
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="https://placehold.co/280x281" alt="Tenda 7P" class="w-full h-64 object-cover rounded-lg">
                    <div class="mt-4">
                        <h3 class="text-xl font-bold">Tenda 7P</h3>
                        <p class="text-red-400 font-semibold">Rp 100.000 /hari</p>
                        <p class="text-gray-600 text-sm">Tenda tahan air, muat 7 orang</p>
                        <p class="text-gray-600 text-sm text-right">150 Tersewa</p>
                        <a href="sewa.html" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                    </div>
                </div> --}}
            </div>
        </main>
    </div>

@include('footer')

</body>
</html>