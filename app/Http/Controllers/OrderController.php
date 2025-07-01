<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
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

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'id_barang' => $item->id_barang,
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
                'quantity' => $item->qty,
                'invoice' => '',
                'subtotal' => $item->subtotal,
                'status' => 'unpaid',
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
    $payment->status = 'paid';
    $payment->save();

    $orderItems = OrderItem::where('order_id', $payment->id)->get();

    foreach ($orderItems as $index => $item) {
        $invoiceCode = 'INV-' . now()->format('Ymd') . '-' . $payment->id . '-' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
        
        $item->invoice = $invoiceCode;
        $item->status = 'waiting_pickup';
        $item->save();
    }
    // dd($payment);
    return redirect()->route('simulate.qr.scan', ['code' => $code])->with('status', 'Payment simulated as success!');
}

    public function showInvoice($order_id, $id)
    {
        // $order = Order::with('jaminan')->findOrFail($order_id);
        // $item = OrderItem::with('barang')->findOrFail($id);

        $item = OrderItem::with(['order.user', 'barang', 'order.jaminan'])->findOrFail($id);
        $order = $item->order;

        $pdf = Pdf::loadView('user.blade-pdf', compact('item', 'order'));

        // dd($item);
        // $items = CartItem::with('barang')->where('cart_id', $cart->id)->get();
        // $pdf = Pdf::loadView('invoice.template', compact('orderItem'));
        // return $pdf->download('Invoice-' . $item->invoice . '.pdf');
        // return view('user.invoice', compact('order', 'item'));
        // return $pdf->download('Invoice-' . $item->invoice . '.pdf');
        return $pdf->stream('Invoice-' . $item->invoice . '.pdf');

    }
}