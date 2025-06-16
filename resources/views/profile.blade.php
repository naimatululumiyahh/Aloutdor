<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - Profil</title>
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
                <a href="kelola-barang.html" class="text-gray-700 hover:text-red-400 font-semibold">Kelola Barang</a>
                <a href="sewaku.html" class="text-gray-700 hover:text-red-400 font-semibold">Sewaku</a>
                <a href="profil.html" class="bg-red-400 text-white px-4 py-2 rounded-full hover:bg-red-500">Profil</a>
                <a href="logout.html" class="text-gray-700 hover:text-red-400 font-semibold">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content: Profil -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Kiri: Sidebar Navigasi -->
            <div class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Profil</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="profil.html" class="flex items-center space-x-2 text-lg font-bold text-black bg-red-400/10 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Akun Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="sewaku.html" class="flex items-center space-x-2 text-lg font-bold text-black hover:bg-gray-100 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span>Pesanan Saya</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kanan: Form Edit Profil -->
            <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Akun Saya</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="text-sm font-semibold text-gray-500">Nama Lengkap</label>
                            <input type="text" value="Naimatul Ulumiyah" class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                        </div>
                        <div>
                            <label class="text-sm font-semibold text-gray-500">Alamat Email</label>
                            <input type="email" value="chillguy@gmail.com" class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-semibold text-gray-500">Ubah Password</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2">
                            <div>
                                <label class="text-sm font-semibold text-gray-500">Password Baru</label>
                                <input type="password" class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                            </div>
                            <div>
                                <label class="text-sm font-semibold text-gray-500">Konfirmasi Password</label>
                                <input type="password" class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="bg-gray-700 text-white px-6 py-3 rounded-md hover:bg-gray-800">Simpan Perubahan</button>
                </form>
            </div>
        </div>
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