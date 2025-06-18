<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        
        $validated = $request->validate([
            'user_id' => 'required',
            'tipe_jaminan' => 'required',
            'total_price' => 'required|numeric',
        ]);

        // Simpan order baru
        // $order = Order::create([
        //     'cart_id' => $validated['cart_id'],
        //     'user_id' => $validated['user_id'],
        //     'status' => $validated['status'],
        //     'total_price' => $validated['total_price'],
        // ]);
        $code = Str::uuid(); // Generate unique order code

        $order = Order::create([
            'user_id' => $validated['user_id'],
            'code' => $code, // Generate unique order code here
            'tipe_jaminan' => $validated['tipe_jaminan'],
            'total_price' => $validated['total_price'],
            'status' => 'unpaid',
            'qr_code_url' => 'https://api.qrserver.com/v1/create-qr-code/?data=' . $code . '&size=150x150',
        ]);
        // dd($order);
        
        return redirect()->route('order.show', ['id' => $order->id]);
        // return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
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

    // public function simulatePay(Request $request, $code)
    // {
    // $order = Order::where('code', $code)->firstOrFail();
    // $order->update(['status' => 'waiting_pickup']);
    // return redirect()->route('order.show', ['id' => $order->id])->with('status', 'Payment simulated as success!');
    // }
    
    public function simulatePay(Request $request, $code)
{
    $payment = Order::where('code', $code)->firstOrFail();
    $payment->status = 'waiting_pickup';
    $payment->save();
    // dd($payment);
    return redirect()->route('simulate.qr.scan', ['code' => $code])->with('status', 'Payment simulated as success!');
}
}