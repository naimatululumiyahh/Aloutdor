<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper (harus!) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

    <!-- Main Content: Keranjang dan Pembayaran -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Kiri: Tabel Keranjang -->
            <div class="w-full  bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Keranjang</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-300">
                                <th class="p-2 text-sm font-semibold text-gray-800">Produk</th>
                                <th class="p-2 text-sm font-semibold text-gray-800">Peminjaman</th>
                                <th class="p-2 text-sm font-semibold text-gray-800">Jumlah</th>
                                <th class="p-2 text-sm font-semibold text-gray-800">Harga Total</th>
                                <th class="p-2 text-sm font-semibold text-gray-800">
                                    <button class="hover:underline">Aksi</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @forelse($items as $item)
                        <?php
                            if (!$item->barang) {
                                dd("Barang tidak ditemukan untuk cart_item ID: " . $item->id);
                            }
                        ?>
                        <tr class="border-b border-gray-200">
                            <td class="p-2 flex items-center space-x-2">
                                <img src="{{ $item->product->image_url ?? 'https://placehold.co/51x40' }}" alt="{{ $item->barang->nama_barang }}" class="w-12 h-10">
                                <div>
                                    <p class="text-base font-semibold">{{ $item->barang->nama_barang }}</p>
                                    <p class="text-xs text-gray-600">Rp {{ number_format($item->barang->harga_per_hari, 0, ',', '.') }} /hari</p>
                                </div>
                            </td>
                            <td class="p-2">
                                <span class="px-3 py-1 bg-gray-200 rounded text-sm">
                                    @if(isset($item->start_date) && isset($item->end_date))
                                        @php
                                            $start = \Carbon\Carbon::parse($item->start_date);
                                            $end = \Carbon\Carbon::parse($item->end_date);
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
                                </span>
                                <span class="block text-xs text-gray-500 mt-1">
                                    @if(isset($item->start_date) && isset($item->end_date))
                                        @php
                                            $days = \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date));
                                        @endphp
                                        {{ $days }} hari
                                    @else
                                        - hari
                                    @endif
                                </span>
                            </td>
                            <td class="p-2">
                                <div class="flex items-center space-x-2">
                                    {{-- <button class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, {{ $item->qty - 1 }})">-</button> --}}
                                    <span class="text-sm">{{ $item->qty }}</span>
                                    {{-- <button class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, {{ $item->qty + 1 }})">+</button> --}}
                                </div>
                            </td>
                            <?php
                                $subtotal = $item->barang->harga_per_hari * $days * $item->qty;
                            ?>
                            <td class="p-2 text-sm font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            <td class="p-2">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"  data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-id="{{ $item->id }}"
                                        data-qty="{{ $item->qty }}"
                                        data-start="{{ $item->start_date }}"
                                        data-end="{{ $item->end_date }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <form action="{{ route('cart.delete', $item->id) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-red-600 hover:text-red-800" onclick="confirmDelete(event, {{ $item->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>

                                        <script>
                                        function confirmDelete(event, id) {
                                            if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                                                event.target.closest('.delete-form').submit();
                                            }
                                        }
                                        </script>
                                    </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">Keranjang Anda kosong</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                    <p class="text-sm text-gray-500">Total: <span class="text-xl font-bold text-black">
                        @php
                            $total = 0;
                            foreach($items as $item) {
                                if(isset($item->start_date) && isset($item->end_date)) {
                                    $days = \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date));
                                    $subtotal = $item->barang->harga_per_hari * $days * $item->qty;
                                    $total += $subtotal;
                                }
                            }
                        @endphp
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span></p>
                </div>
                <form class="space-y-4 lg:w-1/3" action="{{ route('cart.checkout') }}" method="POST" >
                    @csrf
                    <div>
                        <label class="text-sm font-semibold text-gray-800">Jaminan</label>
                        <select name="tipe_jaminan" class="w-full mt-2 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400">
                            <option value="1">KTP (Kartu Tanda Penduduk)</option>
                            <option value="2">SIM (Surat Izin Mengemudi)</option>
                            <option value="3">Kartu Pelajar</option>
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="total_price" value="{{ $total }}">
                    </div>
                    
                    <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700" onclick="alert('Pastikan semua data sudah benar sebelum checkout!')"><b>Checkout</b></button>
                    <label class="text-sm font-semibold text-gray-800">Ketika checkout, otomatis seluruh item di cart hilang.</label>
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
    <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="editForm" action="{{ route('cart.update') }}">
            @csrf
            <input type="hidden" name="id" id="idItem">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" name="qty" class="form-control" id="editQty">
                    </div>
                    <div class="mb-3">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="editStartDate">
                    </div>
                    <div class="mb-3">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control" id="editEndDate">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

    
<script>
    document.getElementById('editModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const qty = button.getAttribute('data-qty');
        const start = button.getAttribute('data-start');
        const end = button.getAttribute('data-end');
    
        // Fill input fields
        // document.getElementById('editForm').action = `/keranjang/${id}/update`; // Set the form action dynamically
        document.getElementById('idItem').value = id;
        document.getElementById('editQty').value = qty;
        document.getElementById('editStartDate').value = start;
        document.getElementById('editEndDate').value = end;
    
        // Set the form action dynamically
        const form = document.getElementById('editForm');

    });
    </script>
    
</body>
</html>