<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart');
        
        if(empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }
        
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . Str::upper(Str::random(10)),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
            'contact_number' => $request->contact_number,
            'notes' => $request->notes
        ]);
        
        foreach($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
        
        session()->forget('cart');
        
        return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Order $order)
    {
        if($order->user_id != auth()->id()) {
            abort(403);
        }
        
        return view('orders.show', compact('order'));
    }
}