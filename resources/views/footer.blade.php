<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/footer/instagramm.svg') }}" alt="Instagram" class="w-full h-full object-contain">
                     </div>
                <a href="#" class="hover:underline">Instagram</a>
                </li>

                    <li class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/footer/WhatsApp.webp') }}" alt="WhatsApp" class="w-full h-full object-contain">
                        </div>
                        <a href="#" class="hover:underline">Whatsapp</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white-hidden rounded-full flex items-center justify-center">
                        <img src="{{ asset('images/footer/facebook.png') }}" alt="Facebook" class="w-full h-full object-contain">
                        </div>
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-7 font-lato">Metode Pembayaran</h3>
                <div class="flex space-x-5">
                    <div class="w-12 h-8 bg-purple-900 rounded">
                        <img src="{{ asset('images/footer/ovo.jpg') }}" alt="ovo" class="w-full h-full object-contain">
                    </div>
                    <div class="w-12 h-8 bg-purple-900 rounded">
                        <img src="{{ asset('images/footer/ovo.jpg') }}" alt="ovo" class="w-full h-full object-contain">
                    </div>
                    <div class="w-12 h-8 bg-purple-900 rounded">
                        <img src="{{ asset('images/footer/ovo.jpg') }}" alt="ovo" class="w-full h-full object-contain">
                    </div>
                    <div class="w-12 h-8 bg-purple-900 rounded">
                        <img src="{{ asset('images/footer/ovo.jpg') }}" alt="ovo" class="w-full h-full object-contain">
                    </div>
        </div>
    </footer>
</body>
</html>