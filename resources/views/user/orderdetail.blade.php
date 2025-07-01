<!DOCTYPE html>
<html lang="id">
    @include('head')
<body class="bg-gray-100 font-poppins">
    <!-- Navbar -->
    @include('navbar')

    <!-- Main Content: Keranjang dan Pembayaran -->
    <div class="container mt-8 px-56">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Order</h2>
                <h3>Total:</h3>
                <h2 class="text-xl font-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</h2>     
                        <div class="mt-6 border-t pt-6">
                            <h3 class="text-xl font-semibold mb-4">Status Pesanan</h3>
                            
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6 flex items-start gap-24">
                                
                                <div class="">
                                    <div class="flex items-center mb-4">
                                        <span class="inline-block w-3 h-3 rounded-full mr-2 
                                            @if($order->status == 'unpaid') bg-yellow-500
                                            @elseif($order->status == 'paid') bg-green-700
                                            @else bg-gray-500 @endif">
                                        </span>
                                        <span class="text-lg font-bold uppercase">
                                            @if($order->status == 'unpaid') Menunggu Pembayaran
                                            @elseif($order->status == 'paid') Sudah Lunas
                                            @endif
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <p class="text-gray-600 text-sm">Order ID</p>
                                            <p class="font-semibold">#{{ $order->id }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-600 text-sm mt-5">Tanggal Order</p>
                                            <p class="font-semibold">{{ date('d M Y', strtotime($order->created_at)) }}</p>
                                        </div>
                                    </div>
                                    {{-- <div>
                                        <p class="text-gray-600 text-sm">Status Pembayaran</p>
                                        <p class="font-semibold 
                                            @if($order->payment_status == 'paid') text-green-600 
                                            @elseif($order->payment_status == 'pending') text-yellow-600
                                            @else text-red-600 @endif">
                                            {{ $order->payment_status ?? 'Belum dibayar' }}
                                        </p>
                                    </div> --}}
                                    
                                
                                </div>
                                <div class="">
                                    <h4 class="font-semibold mb-3">Timeline Pesanan</h4>
                                    <div class="flex">
                                        <div class="flex flex-col items-center mr-4">
                                            <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                                            <div class="h-full w-0.5 bg-gray-300"></div>
                                        </div>
                                        <div>
                                            <p class="font-medium">Pesanan Dibuat</p>
                                            <p class="text-sm text-gray-500">{{ date('d M Y H:i', strtotime($order->created_at)) }}</p>
                                        </div>
                                    </div>

                                    
                                    <div class="flex">
                                        <div class="flex flex-col items-center mr-4">
                                            <div class="w-4 h-4 {{$order->status == 'unpaid' ? 'bg-yellow-400' : 'bg-green-500' }} rounded-full"></div>
                                            <div class="h-full w-0.5 bg-gray-300"></div>
                                        </div>
                                        <div>
                                            <p class="font-medium">
                                                {{ $order->status == 'unpaid' ? 'Menunggu Pembayaran' : 'Pembayaran Dikonfirmasi' }}
                                            </p>
                                                
                                            <p class="text-sm text-gray-500">{{$order->status == 'unpaid' ? 'Menunggu' : date('d M Y H:i', strtotime($order->updated_at)) }}</p>
                                        </div>
                                    </div>
                                        {{-- @if($order->status == 'waiting_pickup' )
                                        <div class="flex">
                                            <div class="flex flex-col items-center mr-4">
                                                <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>
                                                <div class="h-full w-0.5 bg-gray-300"></div>
                                            </div>
                                            <div>
                                                <p class="font-medium">Menunggu Pengambilan</p>
                                               
                                            </div>
                                        </div> --}}
                                        {{-- <div class="flex">
                                            <div class="flex flex-col items-center mr-4">
                                                <div class="w-4 h-4 {{ $order->status == 'processing' || $order->status == 'completed' ? 'bg-green-500' : 'bg-gray-300' }} rounded-full"></div>
                                                <div class="h-full w-0.5 bg-gray-300"></div>
                                            </div>
                                            <div>
                                                <p class="font-medium">Pembayaran Dikonfirmasi</p>
                                                <p class="text-sm text-gray-500">{{ $order->payment_confirmed_at ? date('d M Y H:i', strtotime($order->payment_confirmed_at)) : 'Menunggu' }}</p>
                                            </div>
                                        </div> --}}
                                        {{-- @endif --}}
                                        @if($order->status == 'rented' || $order->status == 'returned')
                                        <div class="flex">
                                            <div class="flex flex-col items-center mr-4">
                                                <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                                                <div class="h-full w-0.5 bg-gray-300"></div>
                                            </div>
                                            <div>
                                                <p class="font-medium">Pesanan Diambil</p>
                                                {{-- <p class="text-sm text-gray-500">{{ date('d M Y H:i', strtotime($order->rented_at)) }}</p> --}}
                                            </div>
                                            
                                        </div>
                                            @if($order->status == 'returned')
                                                <div class="flex">
                                                    <div class="flex flex-col items-center mr-4">
                                                        <div class="w-4 h-4 bg-green-500 rounded-full"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium">Pesanan Selesai</p>
                                                        {{-- <p class="text-sm text-gray-500">{{ date('d M Y H:i', strtotime($order->completed_at)) }}</p> --}}
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        
                                    </div>
                                    
                                    
                                    
                                   
                                </div>
                                @if ($order->status == 'unpaid')
                                <div>
                                    <div class="text-center">
                                        <h4 class="font-semibold mb-3">QR Code Pesanan</h4>
                                        <div class="p-2 bg-white inline-block rounded-lg shadow-sm mb-2">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('simulate.qr.scan', $order->code) }}&size=200x200" alt="QR Code">
                                            <form method="GET">
                                                <button type="submit">Refresh</button>
                                            </form>
                                            <a href="{{ route('simulate.qr.scan', $order->code) }}" >Link</a>
                                        </div>
                                        <p class="text-sm text-gray-600">Scan untuk detail pesanan</p>
                                        {{-- @if($order->status == 'unpaid')
                                        <div class="mt-2">
                                            <a href="{{ route('payment.show', $order->id) }}" class="bg-red-400 text-white px-4 py-2 rounded-md text-sm hover:bg-red-500">
                                                Bayar Sekarang
                                            </a>
                                        </div>
                                        @endif --}}
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                           
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
    <!-- Edit Modal -->

    
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