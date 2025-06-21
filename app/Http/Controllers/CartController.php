<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Barang; // Pastikan model Barang sudah ada

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {
        // Ambil cart aktif user
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first(); // Ganti 1 dengan ID user yang sesuai
        
        if (!$cart) {
            return view('user.cart', ['items' => []]);
        }   
        
        // Get cart items with their related barang models
        $items = CartItem::with('barang')->where('cart_id', $cart->id)->get();

        // dd($items);
        
        return view('user.cart', ['items' => $items]);
    }

    public function add(Request $request) {
        $validated = $request->validate([
            // 'cart_id' => 'required',
            'id_barang' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'qty' => 'required',
            'subtotal' => 'required',
        ]);
       
    
        $user = Auth::user();
        //   Ganti dengan ID user yang sesuai, misalnya dari session atau auth
    
        // Ambil atau buat cart aktif user
        $cart = Cart::where('user_id', $user->id)->first();

        // dd($validated);
        // dd($cart);
        // Tambahkan item ke cart
        CartItem::create([
            'cart_id' => $cart->id, // Gunakan ID cart yang sudah ada atau buat baru
            'id_barang' => $validated['id_barang'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'qty' => $validated['qty'],
            'subtotal' => $validated['subtotal'],
        ]);


    

        return back()->with('success', 'Barang berhasil ditambahkan ke cart');
    }

    public function delete($id)
    {
        // Hapus item dari cart berdasarkan ID
        $item = CartItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item berhasil dihapus dari cart');
    }
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id' => 'required|exists:cart_items,id',
            'qty' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'subtotal' => 'required',
        ]);

        // Update item cart
        $item = CartItem::findOrFail($validated['id']);

        $item->qty = $validated['qty'];
        $item->start_date = $validated['start_date'];
        $item->end_date = $validated['end_date'];
        // Calculate number of days between start and end date
        $days = \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date)) + 1;

        // Get the related barang to access its price
        $barang = Barang::findOrFail($item->id_barang);

        // Calculate the new subtotal
        $item->subtotal = $days * $barang->harga_per_hari * $item->qty;

        // dd($item);
        
        $item->save();

        return back()->with('success', 'Item berhasil diperbarui');
    }
    
    
}