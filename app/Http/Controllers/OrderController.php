<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function checkout(Request $request)
    // {
        
    //     $validated = $request->validate([
    //         'user_id' => 'required',
    //         'tipe_jaminan' => 'required',
    //         'total_price' => 'required|numeric',
    //     ]);

   
    //     $code = Str::uuid();

    //     $order = Order::create([
    //         'user_id' => $validated['user_id'],
    //         'code' => $code, // Generate unique order code here
    //         'tipe_jaminan' => $validated['tipe_jaminan'],
    //         'total_price' => $validated['total_price'],
    //         'status' => 'unpaid',
    //         'qr_code_url' => 'https://api.qrserver.com/v1/create-qr-code/?data=' . $code . '&size=150x150',
    //     ]);

        
    //     return redirect()->route('order.show', ['id' => $order->id]);
    // }
    
    public function checkout(Request $request)
    {   
        $user = Auth::user();
        $user_id = $user->id; // Get the authenticated user's ID

        // dd($user_id);

        $cart = Cart::where('user_id', $user_id)->firstOrFail();
        $cartItems = CartItem::where('cart_id', $cart->id)->get();

        
        $order = Order::create([
            'user_id' => $cart->user_id,
            'code' => Str::uuid(),
            'tipe_jaminan' => $request->input('tipe_jaminan'),
            'total_price' => $request->input('total_price'),
            'status' => 'unpaid',
            'qr_code_url' => 'https://api.qrserver.com/v1/create-qr-code/?data=' . Str::uuid() . '&size=150x150',
        ]);

        // dd($order);

        // Create order items from cart items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'id_barang' => $item->id_barang,
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'quantity' => $item->qty,
                'invoice' => '',
                'subtotal' => $item->subtotal,
            ]);
        }

        // // Clear the cart after checkout
        $cart->items()->delete();
        // $cart->delete();

        return redirect()->route('order.show', ['id' => $order->id]);
    }

    public function show($id)
    {
        
        $order = Order::findOrFail($id);
        // dd($order);
        return view('user.orderdetail', compact('order'));
    }

    public function simulateQrScan($code)
{
    $payment = Order::where('code', $code)->firstOrFail();
    return view('user.simulate-pay', ['payment' => $payment]);
}

    public function simulatePay(Request $request, $code)
{
    $payment = Order::where('code', $code)->firstOrFail();
    $payment->status = 'waiting_pickup';
    $payment->save();
    // dd($payment);
    return redirect()->route('simulate.qr.scan', ['code' => $code])->with('status', 'Payment simulated as success!');
}
}