<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // =========================
    // ALL ORDERS
    // =========================
    public function index()
    {
        $orders = Order::with('items')
            ->latest()
            ->get();

        return view('admin.orders', compact('orders'));
    }


    // =========================
    // ORDER DETAILS
    // =========================
    public function show($id)
    {
        $order = Order::with('items', 'user')
            ->findOrFail($id);

        return view(
            'admin.order-details',
            compact('order')
        );
    }


    // =========================
    // UPDATE ORDER STATUS
    // =========================
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'order_status' => $request->order_status,
        ]);

        return back()->with(
            'success',
            'Order status updated successfully'
        );
    }
}