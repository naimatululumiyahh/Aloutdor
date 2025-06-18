<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

// Tambahkan ->name('login'); di bagian akhir
Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/signup', function () {
    return view('signup');
}) ->name('signup');

// Route::get('/konten', function () {
//     return view('konten');
// });

Route::get('/konten', [BarangController::class, 'index'])->name('konten');
Route::resource('barang', BarangController::class);

Route::get('/detail/{id}', [BarangController::class, 'show']
)->name('user.detail');

Route::post('/cart/add', [CartController::class, 'add'])->name('user.cart');;


// Route::get('/cart', function () {
//     return view('user.cart');
// });

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/profile', function () {
    return view('profile');
}) ->name('profile');

Route::get('/pesanan', function () {
    return view('pesanan');
});


Route::get('/daftarbarang', function () {
    return view('daftarbarang');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/logout', function () {
    session()->flush(); // hapus semua session
    return redirect('/login');
})->name('logout');
