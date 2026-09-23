<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    // =========================
    // ALL CUSTOMERS
    // =========================
    public function index()
    {
        $customers = User::where('type', 'Customer')
            ->withCount('orders')
            ->latest()
            ->get();

        return view(
            'admin.customers',
            compact('customers')
        );
    }


    // =========================
    // CUSTOMER DETAILS
    // =========================
    public function show($id)
    {
        $customer = User::where('type', 'Customer')
            ->with('orders.items')
            ->findOrFail($id);

        return view(
            'admin.customer-details',
            compact('customer')
        );
    }
}