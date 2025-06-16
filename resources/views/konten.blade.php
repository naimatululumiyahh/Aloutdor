<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - Daftar Barang Sewa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">
    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-3xl font-bold text-red-400">AL<span class="text-gray-700">outdor</span></h1>
                <div class="relative">
                    <input type="text" placeholder="Cari alat camping..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-400">
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="index.html" class="text-gray-700 hover:text-red-400 font-semibold">Beranda</a>
                <a href="sewaku.html" class="text-gray-700 hover:text-red-400 font-semibold">Sewaku</a>
                <a href="profil.html" class="bg-red-400 text-white px-4 py-2 rounded-full hover:bg-red-500">Profil</a>
            </div>
        </div>
    </nav>

    <!-- Sidebar: Kategori -->
    <div class="container mx-auto mt-8 flex px-4 md:px-6 lg:px-8">
        <aside class="w-1/4 pr-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Kategori</h2>
            <div class="border-b-4 border-red-400 w-16 mb-4"></div>
            <ul class="space-y-4">
                <li class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400">
                    <span class="text-gray-900 font-semibold">Peralatan Berteduh</span>
                    <span class="text-gray-400 text-sm">(12)</span>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400">
                    <span class="text-gray-900 font-semibold">Peralatan Memasak</span>
                    <span class="text-gray-400 text-sm">(4)</span>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400">
                    <span class="text-gray-900 font-semibold">Peralatan Hiking</span>
                    <span class="text-gray-400 text-sm">(23)</span>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400">
                    <span class="text-gray-900 font-semibold">Peralatan Teknologi</span>
                    <span class="text-gray-400 text-sm">(31)</span>
                </li>
                <li class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-red-400">
                    <span class="text-gray-900 font-semibold">Peralatan Survival</span>
                    <span class="text-gray-400 text-sm">(8)</span>
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
                                <img src="{{ './images/barang/' . $gambarPertama }}" alt="{{ $barang->nama_barang }}" class="w-full h-64 object-cover rounded-lg">
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

    <!-- Footer -->
    <footer class="bg-red-400 text-white py-16 mt-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-4 font-montserrat">ALoutdor</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Sewa</a></li>
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kontak Media</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Ikuti Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">IG</span>
                        </div>
                        <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">WA</span>
                        </div>
                        <a href="#" class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">FB</span>
                        </div>
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Metode Pembayaran</h3>
                <div class="flex space-x-2">
                    <div class="w-12 h-8 bg-purple-900 rounded"></div>
                    <div class="w-12 h-8 bg-sky-700 rounded"></div>
                    <div class="w-12 h-8 bg-sky-500 rounded"></div>
                    <div class="w-12 h-8 bg-white border border-gray-300 rounded"></div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>