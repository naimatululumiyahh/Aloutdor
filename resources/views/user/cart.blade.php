<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aloutdor</title>
    <link rel="icon" href="{{ asset('images/fav.png') }}" >
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper (harus!) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-gray-100 font-poppins">

@include('navbar')

    <!-- Main Content: cart dan Pembayaran -->
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Kiri: Tabel cart -->
            <div class="w-full lg:w-2/3 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Cart</h2>
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
                        <?php $total = 0; ?>
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
                                            $days = (\Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date))) + 1;
                                        @endphp
                                        {{ $days }} hari
                                    @else
                                        - hari
                                    @endif
                                </span>
                            </td>
                            <td class="p-2">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm">{{ $item->qty }}</span>
                                </div>
                            </td>
                            <?php
                                // if ($item->subtotal == $item->barang->harga_per_hari * $days * $item->qty){
                                    // $subtotal = $item->subtotal;
                                // }
                                // else{
                                    // $subtotal = 0;
                                // }
                                $total += $item->subtotal;
                            ?>
                            <td class="p-2 text-sm font-semibold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td class="p-2">
                                    <div class="flex space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"  data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-id="{{ $item->id }}"
                                        data-qty="{{ $item->qty }}"
                                        data-start="{{ $item->start_date }}"
                                        data-end="{{ $item->end_date }}"
                                        data-subtotal="{{ $item->subtotal }}"
                                        >
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
                                            if (confirm('Apakah Anda yakin ingin menghapus item ini dari cart?')) {
                                                event.target.closest('.delete-form').submit();
                                            }
                                        }
                                        </script>
                                    </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-gray-500">cart Anda kosong</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-end mt-6 space-x-4">
                    <p class="text-sm text-gray-500">Total: <span class="text-xl font-bold text-black">
                        Rp {{ number_format($total, 0, ',', '.') }}
                    </span></p>
                </div>
                <form class="space-y-4 lg:w-1/3" action="{{ route('cart.checkout') }}" method="POST" >
                    @csrf
                    <div></div>
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

   @include('footer')
    

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
            <input type="number" name="subtotal" value=0 hidden>
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
        // const subtotal = button.getAttribute('data-subtotal');
    
        // Fill input fields
        // document.getElementById('editForm').action = `/cart/${id}/update`; // Set the form action dynamically
        document.getElementById('idItem').value = id;
        document.getElementById('editQty').value = qty;
        document.getElementById('editStartDate').value = start;
        document.getElementById('editEndDate').value = end;
        // document.getElementById('editSubtotal').value = subtotal;
    
        // Set the form action dynamically
        const form = document.getElementById('editForm');

    });
    </script>
    
</body>
</html>