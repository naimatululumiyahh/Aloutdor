<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Flexible</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-hidden bg-white">

    <div class="w-full max-w-[1440px] min-h-screen mx-auto relative overflow-hidden">

        <!-- Background gradient besar -->
        <div
            class="absolute -left-[350px] -top-7 w-[1100px] h-[1080px] bg-gradient-to-b from-red-300 via-red-400 to-rose-500 rounded-lg -z-10">
        </div>

        <!-- Kiri: Logo dan teks -->
        <div class="kiri" style="padding: 220px 100px ;">
            <h1 class="text-[5vw] md:text-5xl font-bold font-poppins">
                <span class="text-white">AL</span><span class="text-stone-700">outdor</span>
            </h1>
            <p class="mt-4 text-white text-lg md:text-xl font-medium font-poppins max-w-md">
                Yuk, sewa di sini dan siapkan petualangan tanpa ribet!
            </p>
            <button
                class="mt-6 bg-red-400 hover:bg-red-500 transition-colors rounded-lg px-8 py-3 text-white font-semibold font-poppins"
                type="button">
                Tentang Kami
            </button>
        </div>

        <!-- Kanan: Login form -->
        <div class="absolute top-8 right-8 w-full max-w-md bg-white rounded-lg shadow-lg p-8" style="max-width: 620px">
            <h2 class="text-center text-zinc-800 text-2xl font-bold font-poppins mb-4">
                Hai Selamat Datang
            </h2>
            <p class="text-center text-zinc-800 text-lg mb-6 font-poppins">Silahkan buat akun anda</p>

            <form method="POST" action="/login" class="flex flex-col gap-6">
                <!--Nama -->
                <div>
                    <label for="nama" class="block mb-1 text-zinc-800 opacity-70 text-sm font-poppins">Nama</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama"
                        class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-red-400 font-poppins" />
                </div>
                <!-- Email -->
                <div>
                    <label for="email" class="block mb-1 text-zinc-800 opacity-70 text-sm font-poppins">Alamat
                        Email</label>
                    <input type="email" id="email" name="email" required placeholder="Masukkan email"
                        class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-red-400 font-poppins" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block mb-1 text-zinc-800 opacity-70 text-sm font-poppins">Kata
                        Sandi</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan Kata Sandi"
                        class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-red-400 font-poppins" />
                </div>
                <!--Konfirmasi Password -->
                <div>
                    <label for="password" class="block mb-1 text-zinc-800 opacity-70 text-sm font-poppins">Konfirmasi
                        Kata Sandi</label>
                    <input type="password" id="password" name="password" required
                        placeholder="Masukkan Ulang Kata Sandi"
                        class="w-full rounded-md border border-gray-300 p-3 focus:outline-none focus:ring-2 focus:ring-red-400 font-poppins" />
                </div>

                <button type="submit"
                    class="w-full mt-4 bg-red-400 hover:bg-red-500 rounded-full py-4 text-white font-semibold font-poppins">
                    Masuk
                </button>
            </form>

            <div class="mt-6 text-center text-sm font-poppins">
                <span class="text-blue-500 opacity-70">Sudah Punya akun?</span>
                <a href="login" class="text-red-400 font-bold ml-1">Masuk</a>
            </div>
        </div>

        <!-- Lingkaran border dekoratif bawah kiri -->
        <div class="hidden md:block absolute rounded-full border border-neutral-100"
            style="width: 557px; height: 557px; left: -240px; top: 400px;"></div>
        <div class="hidden md:block absolute rounded-full border border-neutral-100"
            style="width: 557px; height: 557px; left: -160px; top: 440px;"></div>
    </div>

</body>

</html>