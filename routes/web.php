<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // HOME
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // KONTEN
    Route::get('/konten', [BarangController::class, 'index'])->name('konten');
    Route::get('/detail/{id}', [BarangController::class, 'show']
    )->name('user.detail');

    // KERANJANG DAN CHECKOUT
    Route::post('/cart/add', [CartController::class, 'add'])->name('user.cart');;
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
    Route::get('/simulate/{code}', [OrderController::class, 'simulateQrScan'])->name('simulate.qr.scan');
    Route::post('/simulate/{code}/pay', [OrderController::class, 'simulatePay'])->name('simulate.qr.pay');
    // Route::post('/cart/checkout/{item_id}', [OrderController::class, 'checkoutItem'])->name('cart.checkout.item');

    // PROFIL DAN PESANAN SAYA
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/profile/account', [ProfileController::class, 'showProfileAccount'])->name('profile.account');
    Route::get('/profile/orders', [ProfileController::class, 'showOrders'])->name('profile.orders');

    // ADMIN
    Route::get('/daftarbarang', function () {
        return view('daftarbarang');
    });

    // Route::get('/pesanan', function () {
    //     return view('user.pesanan');
    // });
    
    // LOGOUT
    Route::get('/logout', function () {
        session()->flush(); // hapus semua session
        return redirect('/login');
    })->name('logout');
});