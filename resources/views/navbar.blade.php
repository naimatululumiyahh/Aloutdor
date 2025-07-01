<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav class="bg-white shadow-md p-4 px-24 ">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        {{-- <div class="flex items-center space-x-4"> --}}
        <a href="{{ route('home') }}">
            <h1 class="text-3xl font-bold text-red-400">AL<span class="text-gray-700">outdor</span></h1>
        </a>
        

        <!-- Search (centered) -->
        <div class="flex-1 flex justify-center">
            <div class="relative w-full max-w-xl">
                <input
                    type="text"
                    placeholder="Cari alat camping..."
                    class="pl-10 pr-80 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-400 w-full text-center"
                >
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Nav Links & Profile Dropdown -->
        <div class="flex items-center space-x-4 relative ml-4">
            <a href="{{ route('konten') }}" class="text-gray-700 hover:text-red-400 font-semibold">Jelajahi</a>
            <a href="{{ route('cart') }}" class="text-gray-700 hover:text-red-400 font-semibold">Keranjang</a>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button onclick="toggleDropdown()" class="bg-red-400 text-white px-4 py-2 rounded-full hover:bg-red-500 focus:outline-none">
                    Profil
                </button>

                <!-- Dropdown Content -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <a href="{{ route('profile.account') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lihat Profil</a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Optional: close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const button = event.target.closest('button[onclick="toggleDropdown()"]');
        const dropdown = document.getElementById('profileDropdown');

        if (!button && !event.target.closest('#profileDropdown')) {
            dropdown.classList.add('hidden');
        }
    });
</script>





</body>
</html>