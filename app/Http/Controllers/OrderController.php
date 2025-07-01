<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function history()
    {
        $orders = \App\Models\Order::where('user_id', auth()->id())
            ->with(['items.product', 'address'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.history', compact('orders'));
    }

    public function show($orderId)
    {
        $order = \App\Models\Order::with(['items.product', 'address'])
            ->where('user_id', auth()->id())
            ->findOrFail($orderId);

        return view('orders.show', compact('order'));
    }
}
