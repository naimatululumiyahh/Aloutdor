<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - ALoutdor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Volkhov:wght@400;700&family=Lato:wght@400;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">
    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4 fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <h1 class="text-3xl font-bold text-red-400">AL<span class="text-gray-700">outdor</span></h1>
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Cari alat camping..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-400">
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="index.html" class="text-gray-700 hover:text-red-400 font-semibold">Beranda</a>
                <a href="#produk" class="text-gray-700 hover:text-red-400 font-semibold">Produk</a>
                <a href="{{route('login')}}" class="bg-red-400 text-white px-4 py-2 rounded-full hover:bg-red-500">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 bg-white">
        <div class="container mx-auto flex flex-col lg:flex-row items-center gap-8 px-4">
            <div class="w-full lg:w-1/2">
                <p class="text-xl font-bold text-red-400 uppercase font-lato">Ayo Sewa Peralatan Camping & Taklukkan Alam Bebas!</p>
                <h1 class="text-5xl lg:text-6xl font-bold text-blue-900 font-volkhov leading-tight mt-4">Explore More, Worry Less – Petualangan Dimulai di Sini!</h1>
                <p class="text-lg text-blue-900 font-lato leading-loose mt-6">Perjalanan seru dimulai dari perlengkapan yang tepat – semua alat camping tersedia, tinggal berangkat!</p>
                <a href="{{route('konten')}}" class="inline-block bg-yellow-500 text-white px-8 py-4 rounded-lg mt-8 font-lato font-medium hover:bg-yellow-600 shadow-lg">Yuk Sewa Sekarang!</a>
            </div>
            <div class="w-full lg:w-1/2">
                <img src="https://placehold.co/740x752" alt="Camping Gear" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Kategori Produk -->
    <section id="produk" class="produk py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-neutral-600 font-volkhov mb-4">Ada apa aja sih di <span class="text-red-400">AL</span><span class="text-blue-900">outdor</span>?</h2>
            <p class="text-lg text-center text-neutral-600 font-lato mb-12">Yuk lihat alat apa saja yang kita siapkan untuk mewujudkan experience kalian</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="bg-white p-6 rounded-3xl shadow-lg text-center">
                    <img src="https://placehold.co/94x94" alt="Peralatan Berteduh" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-indigo-950 font-poppins">Peralatan Berteduh</h3>
                    <p class="text-sm text-gray-500 font-poppins mt-2">Tenda berbagai ukuran (2P, 4P, 6P, dll.), Sleeping bag, Matras camping, Hammock</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-lg text-center">
                    <img src="https://placehold.co/76x76" alt="Peralatan Hiking" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-indigo-950 font-poppins">Peralatan Hiking</h3>
                    <p class="text-sm text-gray-500 font-poppins mt-2">Carrier berbagai ukuran, Daypack, Trekking pole, Jas hujan, Sarung tangan</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-lg text-center">
                    <img src="https://placehold.co/83x83" alt="Peralatan Teknologi" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-indigo-950 font-poppins">Peralatan Teknologi</h3>
                    <p class="text-sm text-gray-500 font-poppins mt-2">Power bank solar, GPS / kompas digital, Kamera action (GoPro, dll.)</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-lg text-center">
                    <img src="https://placehold.co/91x91" alt="Peralatan Survival" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-indigo-950 font-poppins">Peralatan Survival</h3>
                    <p class="text-sm text-gray-500 font-poppins mt-2">Headlamp, senter, Pisau lipat, multitool, First aid kit, Whistle</p>
                </div>
                <div class="bg-white p-6 rounded-3xl shadow-lg text-center">
                    <img src="https://placehold.co/79x79" alt="Peralatan Memasak" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-indigo-950 font-poppins">Peralatan Memasak</h3>
                    <p class="text-sm text-gray-500 font-poppins mt-2">Kompor portable, Gas kaleng kecil, Nesting, Peralatan makan, Teko</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-neutral-600 font-volkhov mb-4">Kenapa harus <span class="text-red-400">AL</span><span class="text-blue-900">outdor</span>?</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-12">
                <div class="bg-white p-6 rounded-lg border border-neutral-300 flex items-start space-x-4">
                    <div class="w-24 h-24 bg-slate-200 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-black font-poppins">Terjangkau</h3>
                        <p class="text-base text-zinc-700 font-poppins mt-2">Sewa alat camping tanpa bikin dompet jebol! Semua peralatan selalu dicek dan dirawat agar nyaman digunakan.</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg border border-neutral-300 flex items-start space-x-4">
                    <div class="w-24 h-24 bg-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-black font-poppins">Pelayanan Mudah</h3>
                        <p class="text-base text-zinc-700 font-poppins mt-2">Booking online, pilih alat, dan siap berangkat! Bisa ambil langsung dan nikmati petualanganmu!</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg border border-neutral-300 flex items-start space-x-4">
                    <div class="w-24 h-24 bg-sky-100 rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-black font-poppins">Lengkap</h3>
                        <p class="text-base text-zinc-700 font-poppins mt-2">Dari tenda, sleeping bag, kompor portable, hingga peralatan hiking semua tersedia! Kamu tinggal fokus menikmati alam.</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Testimoni -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-neutral-600 font-volkhov mb-4">Apa yang mereka katakan tentang <span class="text-red-400">AL</span><span class="text-blue-900">outdor</span>?</h2>
            <p class="text-lg text-center text-neutral-600 font-lato mb-12">Yuk intip review dari para penyewa!</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-xl text-neutral-400 font-lato leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque nam suscipit amet nec eget fermentum.</p>
                    <div class="flex items-center mt-6">
                        <img src="https://placehold.co/75x75" alt="Melinda Lenny" class="w-20 h-20 rounded-full">
                        <div class="ml-4">
                            <p class="text-2xl text-neutral-500 font-lato">Melinda Lenny</p>
                            <p class="text-xl text-stone-300 font-lato">Medan</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-xl text-neutral-400 font-lato leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque nam suscipit amet nec eget fermentum.</p>
                    <div class="flex items-center mt-6">
                        <img src="https://placehold.co/75x75" alt="Jacob Stevan" class="w-20 h-20 rounded-full">
                        <div class="ml-4">
                            <p class="text-2xl text-neutral-500 font-lato">Jacob Stevan</p>
                            <p class="text-xl text-stone-300 font-lato">Bandung</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-xl text-neutral-400 font-lato leading-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque nam suscipit amet nec eget fermentum.</p>
                    <div class="flex items-center mt-6">
                        <img src="https://placehold.co/75x75" alt="Roben Musstar" class="w-20 h-20 rounded-full">
                        <div class="ml-4">
                            <p class="text-2xl text-neutral-500 font-lato">Roben Musstar</p>
                            <p class="text-xl text-stone-300 font-lato">Bali</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="testimoni.html" class="inline-block bg-red-400 text-white px-6 py-2 rounded hover:bg-red-500 font-lato">Lihat Semuanya</a>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-1/2">
                <h2 class="text-5xl font-normal text-neutral-500 font-volkhov mb-6">Kontak Kami</h2>
                <p class="text-base text-neutral-400 font-poppins mb-8">Jika Anda membutuhkan konsultasi dengan kami, Anda dapat mengirim pesan atau menghubungi kami. Kami akan merespons secepat mungkin.</p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-4">
                        <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-base text-zinc-500 font-poppins">aloutdor@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-base text-zinc-500 font-poppins">+62 82389382938</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-base text-zinc-500 font-poppins">Setiap Hari: 08.00-22.00</span>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg class="w-7 h-7 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-base text-zinc-500 font-poppins">Jl. Panglima Sudirman No.1-7, Turen, Malang, Jawa Timur 65175</span>
                    </li>
                </ul>
                <div class="flex space-x-4 mt-8">
                    <a href="#" class="w-10 h-10 border border-rose-500 rounded-lg flex items-center justify-center hover:bg-rose-500 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </a>
                    <a href="#" class="w-10 h-10 border border-rose-500 rounded-lg flex items-center justify-center hover:bg-rose-500 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="bg-zinc-300 h-96 rounded-lg overflow-hidden relative">
                    <img src="https://placehold.co/610x384" alt="Map" class="w-full h-full object-cover">
                    <a href="#" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-red-400 text-white px-6 py-2 rounded font-lato hover:bg-red-500">Lihat Alamat di Sini</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-red-400 text-white py-16">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-4">
            <div>
                <h3 class="text-xl font-semibold mb-4 font-montserrat">ALoutdor</h3>
                <ul class="space-y-2">
                    <li><a href="produk.html" class="hover:underline">Sewa</a></li>
                    <li><a href="tentang.html" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="kontak.html" class="hover:underline">Kontak Media</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Ikuti Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">IG</span>
                        </div>
                        <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">WA</span>
                        </div>
                        <a href="#" class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black">FB</span>
                        </div>
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-4 font-lato">Metode Pembayaran</h3>
                <div class="flex space-x-2">
                    <div class="w-14 h-10 bg-violet-900 rounded shadow"></div>
                    <div class="w-14 h-10 bg-sky-700 rounded shadow"></div>
                    <div class="w-14 h-10 bg-sky-500 rounded shadow"></div>
                    <div class="w-14 h-10 bg-white rounded shadow"></div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>