<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - Daftar Barang Sewa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
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
                <select class="border border-gray-300 rounded p-1" 
                onchange="window.location.href='{{<?= route('barang.kategori') ?>}}?category_id={{ request()->input('category_id') }}&sort=' + this.value">
                    <option value="relevansi" {{ $sort === 'relevansi' ? 'selected' : '' }}>Relevansi</option>
                    <option value="low_to_high" {{ $sort === 'low_to_high' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                    <option value="high_to_low" {{ $sort === 'high_to_low' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($data as $barang)
                <?php
                    $gambarArray = json_decode($barang->gambar);
                    $gambarPertama = $gambarArray[0] ?? null;
                ?>
                <a href="{{ route('user.detail', $barang->id) }}" class="block transition duration-200 hover:shadow-lg">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <img src="{{ asset('images/barang/' . $gambarPertama) }}" alt="{{ $barang->nama_barang }}" class="w-full h-64 object-cover rounded-lg">
                        <div class="mt-4">
                            <h3 class="text-xl font-bold">{{ $barang->nama_barang }}</h3>
                            <p class="text-red-400 font-semibold">Rp {{ number_format($barang->harga_per_hari) }}</p>
                            <p class="text-gray-600 text-sm">{{ $barang->deskripsi }}</p>
                            <p class="text-gray-600 text-sm text-right">{{ $barang->jumlah }} Tersewa</p>
                            <a href="{{ route('user.cart', $barang->id) }}" class="block mt-2 bg-red-400 text-white text-center py-2 rounded hover:bg-red-500">Sewa</a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
</div>

@include('footer')

</body>
</html>