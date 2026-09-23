<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    // Admin Login Page
    public function login()
    {
        return view('admin.login');
    }


    // Admin Login
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)
            ->where('type', 'Admin')
            ->first();

        if ($user && \Hash::check($request->password, $user->password)) {

            session()->put('id', $user->id);
            session()->put('type', $user->type);

            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Welcome to Admin Panel');
        }

        return back()
            ->withInput()
            ->with('error', 'Invalid admin email or password');
    }


    // Admin Dashboard
    public function dashboard()
    {
        $totalCategories = Category::count();

        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $totalCustomers = User::where('type', 'Customer')->count();

        $pendingOrders = Order::where('order_status', 'pending')->count();

        $processingOrders = Order::where('order_status', 'processing')->count();

        $deliveredOrders = Order::where('order_status', 'delivered')->count();


        return view('admin.dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalOrders',
            'totalCustomers',
            'pendingOrders',
            'processingOrders',
            'deliveredOrders'
        ));
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('type');

        return redirect()
            ->route('admin.login')
            ->with('success', 'Admin logged out successfully');
    }
}