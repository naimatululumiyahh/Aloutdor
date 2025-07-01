
<!DOCTYPE html>
<html lang="id">
    @include('head')
<body class="bg-gray-100 font-poppins">

@include('navbar')

    <!-- Main Content: Dashboard Pemilik -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Kiri: Sidebar Navigasi -->
            <div class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Dashboard Pemilik</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{route('profile')}}" class="flex items-center space-x-2 text-lg font-bold text-black hover:bg-gray-100 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Akun Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('daftarbarang') }}" class="flex items-center space-x-2 text-lg font-bold text-black bg-red-400/10 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>Daftar Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('peminjaman') }}" class="flex items-center space-x-2 text-lg font-bold text-black hover:bg-gray-100 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span>Peminjaman</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kanan: Tabel Produk -->
            <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Produk</h2>
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <div class="relative w-full md:w-1/3">
                        <input type="text" placeholder="Cari Produk" class="pl-10 pr-4 py-2 border border-gray-400 rounded-xl w-full focus:outline-none focus:ring-2 focus:ring-red-400">
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div class="flex space-x-4 w-full md:w-auto">
                        <div class="relative">
                            <select class="border border-gray-400 rounded px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option>Semua Kategori</option>
                                <option>Berteduh</option>
                            </select>
                            <svg class="w-4 h-4 absolute right-2 top-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <select class="border border-gray-400 rounded px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option>Semua Harga</option>
                                <option>Rp0 - Rp100.000</option>
                                <option>Rp100.000+</option>
                            </select>
                            <svg class="w-4 h-4 absolute right-2 top-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <button class="bg-lime-700 text-white px-4 py-2 rounded-md hover:bg-lime-800">Tambah Produk</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">No.</th>
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">Nama Produk</th>
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">Harga Per Hari</th>
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">Kategori</th>
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">Deskripsi</th>
                                <th class="py-4 px-2 text-xl font-bold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $index => $barang)
                        <tr class="border-b border-gray-200"></tr>
                            <td class="py-4 px-2 text-base text-gray-600">{{ $index + 1 }}</td>
                            <td class="py-4 px-2 text-base text-gray-600">{{ $barang->nama_barang }}</td>
                            <td class="py-4 px-2 text-base text-gray-600">Rp{{ number_format($barang->harga_per_hari, 0, ',', '.') }}</td>
                            <td class="py-4 px-2 text-base text-gray-600">
                                <span class="bg-lime-200 text-lime-600 text-sm font-bold px-4 py-1 rounded-2xl">
                                    {{ $barang->kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="py-4 px-2 text-base text-gray-600">
                                {{ \Illuminate\Support\Str::limit($barang->description, 12, '...') }}
                            </td>
                            
                            <td class="py-4 px-2">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Detail</button>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center items-center mt-6 space-x-2">
                    <button class="w-8 h-8 bg-gray-500 text-white rounded-full hover:bg-gray-600">&lt;</button>
                    <button class="w-8 h-8 bg-red-400 text-white rounded-full">1</button>
                    <button class="w-8 h-8 text-black hover:bg-gray-200 rounded-full">2</button>
                    <button class="w-8 h-8 text-black hover:bg-gray-200 rounded-full">3</button>
                    <button class="w-8 h-8 text-black hover:bg-gray-200 rounded-full">4</button>
                    <button class="w-8 h-8 text-black hover:bg-gray-200 rounded-full">5</button>
                    <button class="w-8 h-8 bg-gray-500 text-white rounded-full hover:bg-gray-600">&gt;</button>
                    <span class="ml-4 text-base font-extrabold text-black">10 dari 50</span>
                </div>
            </div>
        </div>
    </div>

@include('footer')

</body>
</html>