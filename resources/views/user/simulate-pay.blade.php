<h2>Simulasi QR Scan</h2>
<p>Kode Transaksi: {{ $payment->code }}</p>
<p>Status: {{ $payment->status }}</p>

@if ($payment->status == 'unpaid')
    <form method="POST" action="{{ route('simulate.qr.pay', $payment->code) }}">
        @csrf
        <button type="submit">Bayar Sekarang</button>
    </form>
@else
    <p><strong>Sudah Dibayar!</strong></p>
@endif

@if (session('status'))
    <p style="color: green">{{ session('status') }}</p>
@endif
