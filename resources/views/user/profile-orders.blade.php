<!DOCTYPE html>
<html lang="id">
    @include('head')
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

    <!-- Main Content: Pesanan Saya -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Kiri: Sidebar Navigasi -->
            <div class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Profil</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{route('profile.account')}}" class="flex items-center space-x-2 text-lg font-bold text-black hover:bg-gray-100 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Akun Saya</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.orders')}}" class="flex items-center space-x-2 text-lg font-bold text-black bg-red-400/10 p-2 rounded">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            <span>Peminjaman Saya</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kanan: Daftar Pesanan -->
            <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Peminjaman Saya</h2>
                <div class="flex items-center mb-6">
                    <label class="text-xl font-bold text-gray-700 mr-4">Status:</label>
                    <div class="relative">
                        <select class="border border-gray-400 rounded px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-red-400">
                            <option>Semua</option>
                            <option>Dikembalikan</option>
                            <option>Dipinjam</option>
                        </select>
                        
                    </div>
                </div>
                <div class="space-y-6">
                    <!-- Pesanan 1 -->
                    @foreach ($rents as $order)
                    <?php
                    $gambarArray = json_decode($order->barang->gambar);
                    $gambarPertama = $gambarArray[0] ?? null;
                    // $gambarPertama = $gambarArray[0] ?? null;
                    ?>
                        <div class="bg-white rounded-md shadow-lg p-4 flex items-end">
                            
                            <img src="{{ asset('images/barang/' . $gambarPertama) }}" alt="{{ $order->barang->nama_barang }}" class="w-40 h-40 rounded-md mr-4">
                            <div class="flex-1 self-start">
                                <p class="text-xs mb-2">Order ID: #{{$order->order_id}}</p>
                                <h3 class="text-xl font-extrabold text-bold">{{ $order->barang->nama_barang }} <span class="text-base font-medium text-black">({{ $order->quantity }} x {{ $order->duration }} hari)</span></h3>
                                <div class="mt-2 flex items-center">
                                    @if ($order->order->status  == 'paid' && $order->status == 'returned')
                                        <span class="bg-blue-500 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Dikembalikan</span>
                                    @elseif ($order->order->status  == 'paid' && $order->status  == 'rented')
                                        <span class="bg-green-700 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Dipinjam</span>
                                    @elseif ($order->order->status  == 'paid' && $order->status  == 'waiting_pickup')
                                        <span class="bg-yellow-500 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Menunggu Pengambilan</span>
                                    @else
                                        <span class="bg-red-600 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Belum Bayar</span>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <p class="text-sm font-light text-gray-500 mt-2"><span class="text-xl font-semibold text-black">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span></p>
                                    <p class="text-xs mt-4 font-medium text-black">Tanggal Sewa: <span class="font-extrabold ">
                                        {{-- {{ $order->start_date }} --}}
                                        @if(isset($order->start_date) && isset($order->end_date))
                                        @php
                                            $start = \Carbon\Carbon::parse($order->start_date);
                                            $end = \Carbon\Carbon::parse($order->end_date);
                                            $sameMonth = ($start->format('M') === $end->format('M'));
                                            $sameYear = ($start->format('Y') === $end->format('Y'));
                                        @endphp
                                        @if($sameMonth && $sameYear)
                                            {{ $start->format('d') }} - {{ $end->format('d M Y') }}
                                        @elseif($sameYear)
                                            {{ $start->format('d M') }} - {{ $end->format('d M Y') }}
                                        @else
                                            {{ $start->format('d M Y') }} - {{ $end->format('d M Y') }}
                                        @endif
                                    @else
                                        -
                                    @endif
                                    </span></p>
                                </div>
                            </div>
                            <div class="mb-5">
                            @if ($order->status == 'unpaid')
                                <a href="{{ route('order.show', $order->order_id) }}" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 text-left inline-block">Bayar Sekarang <span class="text-xs block">Order ID: #{{$order->order_id}}</span></a>
                            @elseif ($order->status == 'waiting_pickup')
                                <a href="{{ route('order.show', $order->order_id) }}" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 inline-block">Info Order<span class="text-xs block">Order ID: #{{$order->order_id}}</span></a>
                                <a href="{{ route('order.invoice', [$order->order_id, $order->id])}}" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 inline-block">Invoice <span class="text-xs block">OrderItem ID: #{{$order->id}}</span></a>
                            @elseif ($order->status == 'rented')
                                <a href="{{ route('order.show', $order->order_id) }}" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 inline-block">Info Order<span class="text-xs block">Order ID: #{{$order->order_id}}</span></a>
                            @elseif ($order->status == 'returned')
                                <a href="{{ route('order.show', $order->order_id) }}" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 inline-block">Info Order<span class="text-xs block">Order ID: #{{$order->order_id}}</span></a>
                                <a href="" class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900 inline-block">Review <span class="text-xs block">OrderItem ID: #{{$order->id}}</span></a>
                            @endif
                            </div>
                        </div>
                    @endforeach
                    
                    {{-- <!-- Pesanan 2 -->
                    <div class="bg-white rounded-md shadow-lg p-4 flex items-start">
                        <img src="https://placehold.co/154x155" alt="Tenda 7P" class="w-40 h-40 rounded-md mr-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-extrabold text-black">Tenda 7P</h3>
                            <p class="text-base font-medium text-black">x2, 2 hari</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-yellow-400 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Dipinjam</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-medium text-black">Jatuh Tempo: <span class="font-extrabold">12 April 2025</span></p>
                            <p class="text-sm font-light text-gray-500 mt-2">Harga Penyewaan: <span class="text-xl font-semibold text-black">Rp 300.000</span></p>
                            <button class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900">Review</button>
                        </div>
                    </div>
                    <!-- Pesanan 3 -->
                    <div class="bg-white rounded-md shadow-lg p-4 flex items-start">
                        <img src="https://placehold.co/154x155" alt="Tenda 7P" class="w-40 h-40 rounded-md mr-4">
                        <div class="flex-1">
                            <h3 class="text-xl font-extrabold text-black">Tenda 7P</h3>
                            <p class="text-base font-medium text-black">x2, 2 hari</p>
                            <div class="mt-2 flex items-center">
                                <span class="bg-red-600 text-white text-sm font-semibold px-4 py-1 rounded-2xl">Dipinjam</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-medium text-black">Jatuh Tempo: <span class="font-extrabold">12 April 2025</span></p>
                            <p class="text-sm font-light text-gray-500 mt-2">Harga Penyewaan: <span class="text-xl font-semibold text-black">Rp 300.000</span></p>
                            <button class="mt-4 bg-gray-800 text-white px-6 py-2 rounded-xl hover:bg-gray-900">Review</button>
                        </div>
                    </div> --}}
                </div>
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