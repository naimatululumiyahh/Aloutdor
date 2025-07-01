<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice {{ $item->invoice }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        .wrapper { width: 100%; margin: 0 auto; padding: 20px; }
        .section { margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Invoice Penyewaan Barang</h2>
        <br>
        <br>
        <br>
        <div class="section">
            <strong>Invoice:</strong> {{ $item->invoice }}<br>
            <strong>Order Code:</strong> {{ $order->code }}<br>
            <strong>Tanggal Order:</strong> {{ $order->created_at->format('d M Y H:i') }}
        </div>

        <div class="section">
            <strong>Nama Peminjam:</strong> {{ $order->user->name ?? 'Tidak ada' }}<br>
            <strong>Email:</strong> {{ $order->user->email ?? '-' }}
        </div>

        <div class="section">
            <table>
                <tr>
                    <th>Barang</th>
                    <th>Qty</th>
                    <th>Harga/hari</th>
                    <th>Lama Sewa</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->barang->harga_per_hari) }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date)) + 1 }} hari</td>
                    <td>Rp {{ number_format($item->subtotal) }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <strong>Tanggal Mulai:</strong> {{ $item->start_date }}<br>
            <strong>Tanggal Selesai:</strong> {{ $item->end_date }}<br>
            <strong>Tipe Jaminan:</strong> {{ $order->jaminan->tipe ?? '-' }}
        </div>

        <div class="section">
            <strong>Total Bayar:</strong> Rp {{ number_format($item->subtotal) }}
        </div>

        <div style="margin-top: 30px;">
            Terima kasih telah menggunakan layanan Aloutdor.
        </div>

        <div style="margin-top: 50px;">
            <table style="width: 100%; border: none;">
            <tr>
                <td style="width: 50%; border: none; text-align: center; vertical-align: bottom;">
                {{-- <div style="height: 40px;"></div>
                <hr style="width: 70%; margin: 20px auto 0;">
                <div style="margin-top: 5px;">Tanggal</div> --}}
                </td>
                <td style="width: 50%; border: none; text-align: center; vertical-align: bottom;">
                Mengetahui,
                <div style="height: 70px;"></div>
                <hr style="width: 70%; margin: 20px auto 0;">
                <div style="margin-top: 5px;">{{ $order->user->name ?? 'Tidak ada' }}</div>
                </td>
            </tr>
            </table>
        </div>
    </div>
</body>
</html>
