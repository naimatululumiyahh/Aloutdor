<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SewaAja - Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-poppins">
    @include('navbar')

    <!-- Main Content: Invoice -->
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Invoice</h2>
            <div class="mb-6">
                <p class="text-sm">Order ID: <span class="font-semibold">#{{ $item->order_id }}</span></p>
                <p class="text-sm">Order Item ID: <span class="font-semibold">#{{ $item->id }}</span></p>
                <p class="text-sm">Invoice Code: <span class="font-semibold">{{ $item->invoice }}</span></p>
                <p class="text-sm">Order Code: <span class="font-semibold">{{ $order->code }}</span></p>
                <p class="text-sm">Tanggal Order: <span class="font-semibold">{{ $order->created_at->format('d M Y H:i') }}</span></p>
                <p class="text-sm">Nama Peminjam: <span class="font-semibold">{{ $order->user->name ?? 'Tidak ada' }}</span></p>
                <p class="text-sm">Nama Barang: <span class="font-semibold">{{ $item->barang->nama_barang ?? 'Tidak ada' }}</span></p>
                <p class="text-sm">Harga/hari: <span class="font-semibold">Rp{{ $item->barang->harga_per_hari ?? 'Tidak ada' }}</span></p>
                <p class="text-sm">Jumlah: <span class="font-semibold">{{ $item->qty }}</span></p>
                <p class="text-sm">Tanggal Mulai Sewa: <span class="font-semibold">{{ $item->start_date }}</span></p>
                <p class="text-sm">Tanggal Selesai Sewa: <span class="font-semibold">{{ $item->end_date }}</span></p>
                <p class="text-sm">Lama Sewa: <span class="font-semibold">{{ \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date)) + 1 }} hari</span></p>
                <p class="text-sm">Total Harga: <span class="font-semibold">Rp{{ $item->subtotal }}</span></p>
                <p class="text-sm">Tipe Jaminan: <span class="font-semibold">{{ $order->jaminan->tipe ?? 'Tidak ada' }}</span></p>
            </div>
            {{-- <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Detail Barang</h3>
                <ul class="list-disc pl-5">
                    @foreach ($order->items as $orderItem)
                        <li>{{ $orderItem->product->name }} - {{ $orderItem->quantity }} pcs</li>
                    @endforeach
                </ul>
            </div> --}}
            {{-- <div class="mt-6">
                <a href="{{ route('order.show', $order->order_id) }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Kembali ke Detail Order</a>
            </div> --}}
        </div>
    </div>
</body>
</html>