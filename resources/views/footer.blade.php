<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <!-- Footer -->
    <footer id="footer" class="bg-red-400 text-white py-16 mt-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 justify-items-start md:justify-items-center">
            <div class="flex flex-col items-start md:items-center">
            <h3 class="text-xl font-semibold mb-4 font-montserrat text-center md:text-left">ALoutdor</h3>
            <ul class="space-y-2 text-left">
                <li><a href="{{ route('konten') }}" class="hover:underline">Sewa</a></li>
                <li><a href="{{ route('home') }}" class="hover:underline">Tentang Kami</a></li>
                <li><a href="#footer" class="hover:underline">Kontak Media</a></li>
            </ul>
            </div>
            <div class="flex flex-col items-start md:items-center">
            <h3 class="text-xl font-semibold mb-4 font-lato text-center md:text-left">Ikuti Kami</h3>
            <ul class="space-y-2">
                <li class="flex items-center space-x-2 justify-start md:justify-center">
                <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/footer/instagramm.svg') }}" alt="Instagram" class="w-full h-full object-contain">
                </div>
                <a href="#" class="hover:underline">Instagram</a>
                </li>
                <li class="flex items-center space-x-2 justify-start md:justify-center">
                <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center">
                    <img src="{{ asset('images/footer/WhatsApp.webp') }}" alt="WhatsApp" class="w-full h-full object-contain">
                </div>
                <a href="#" class="hover:underline">Whatsapp</a>
                </li>
                <li class="flex items-center space-x-2 justify-start md:justify-center">
                <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center">
                    <img src="{{ asset('images/footer/facebook.png') }}" alt="Facebook" class="w-full h-full object-contain">
                </div>
                <a href="#" class="hover:underline">Facebook</a>
                </li>
            </ul>
            </div>
            <div class="flex flex-col items-start margin-left">
            <h3 class="text-xl font-semibold mb-7 font-lato text-center md:text-left">Metode Pembayaran</h3>
            <div class="flex space-x-5 justify-start md:justify-center">
                <div class="w-12 h-8 bg-purple-900 rounded flex items-center justify-center">
                <img src="{{ asset('images/footer/ovo.jpg') }}" alt="ovo" class="w-full h-full object-contain">
                </div>
                <div class="w-14 h-8 bg-white rounded flex items-center justify-center">
                <img src="{{ asset('images/footer/shopee.png') }}" alt="shopee" class="w-12 h-7 object-contain" style="margin-left: 0.2rem;">
                </div>
                <div class="w-14 h-8 bg-white rounded flex items-center justify-center">
                <img src="{{ asset('images/footer/gopayyy.png') }}" alt="gopay" class="w-12 h-8 object-contain" style="margin-left: 0.2rem;">
                </div>
                <div class="w-14 h-8 bg-white rounded flex items-center justify-center">
                <img src="{{ asset('images/footer/dana.png') }}" alt="dana" class="w-12 h-full object-contain" style="margin-left: 0.2rem;">
                </div>
                <div class="w-14 h-8 bg-white rounded flex items-center justify-center">
                <img src="{{ asset('images/footer/card.png') }}" alt="dana" class="w-12 h-full object-contain" style="margin-left: 0.2rem;">
                </div>
            </div>
            </div>
        </div>
    </footer>
</body>
</html>