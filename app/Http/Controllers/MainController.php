<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;

use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    // =========================
    // HOME PAGE
    // =========================
    public function index()
    {
        $products = Product::with(['images', 'category'])
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        $categories = Category::where('status', 1)
            ->get();

        return view('index', compact('products', 'categories'));
    }


    // =========================
    // SHOP PAGE
    // =========================
    public function shop()
    {
        $products = Product::with(['images', 'category'])
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        $categories = Category::where('status', 1)
            ->get();

        return view('shop', compact('products', 'categories'));
    }

    // =========================
    // CATEGORY PAGE
    // =========================
    public function category()
    {
        $categories = Category::where('status', 1)
            ->get();

        return view('category', compact('categories'));
    }


    // =========================
    // CATEGORY WISE PRODUCTS
    // =========================
    public function categoryProducts($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('status', 1)
        ->get();
        $products = Product::with(['images', 'category'])
            ->where('category_id', $id)
            ->where('status', 1)
            ->latest()
            ->paginate(12);

           return view('shop', compact(
                'products',
                'categories',
                'category'
            ));
    }


    // =========================
    // PRODUCT DETAILS
    // =========================
    public function productDetails($id)
    {
        $product = Product::with([
            'images',
            'category',
            'variants.size',
            'variants.color'
        ])->findOrFail($id);

        $sizes = Size::where('status', 1)
            ->orderBy('id')
            ->get();

        $colors = Color::where('status', 1)
            ->orderBy('id')
            ->get();

        return view('shopdetails', compact(
            'product',
            'sizes',
            'colors'
        ));
    }


    // =========================
    // SHOPPING CART
    // =========================
    public function shoppingcart()
{
    $cart = session()->get('cart', []);

    $subtotal = 0;

    foreach ($cart as $item) {

        $subtotal += $item['price'] * $item['quantity'];

    }

    return view('shoppingcart', compact(
        'cart',
        'subtotal'
    ));
}
public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        unset($cart[$id]);

        session()->put('cart', $cart);
    }

    return redirect()
        ->route('cart')
        ->with('success', 'Product removed from cart');
}


   public function addtocart($id)
{
    $product = Product::with('images')->findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {

        $cart[$id]['quantity']++;

    } else {

        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->sale_price ?? $product->price,
            'image' => $product->images->first()->image ?? null,
            'quantity' => 1
        ];

    }

    session()->put('cart', $cart);

    return redirect()
        ->route('cart')
        ->with('success', 'Product added to cart');
}



public function myOrders()
{
    $userId = session('id');

    // User login nahi hai
    if (!$userId) {
        return redirect()
            ->route('login')
            ->with('error', 'Please login first');
    }

    // Logged-in user ke orders
    $orders = Order::with('items')
        ->where('user_id', $userId)
        ->latest()
        ->get();

    return view('myorders', compact('orders'));
}
    // =========================
    // CHECKOUT
    // =========================
 public function checkout()
{
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()
            ->route('cart')
            ->with('error', 'Your cart is empty');
    }
    if (!session()->has('id')) {
        return redirect()
            ->route('login')
            ->with('error', 'Please login first to proceed to checkout');
    }

    $subtotal = 0;

    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    return view('checkout', compact(
        'cart',
        'subtotal'
    ));
}

public function placeOrder(Request $request)
{
    // Get cart
    $cart = session()->get('cart', []);

    // Check cart empty
    if (empty($cart)) {
        return redirect()
            ->route('cart')
            ->with('error', 'Your cart is empty');
    }

    // Validate checkout form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:30',
        'address' => 'required|string',
        'city' => 'required|string|max:100',
        'state' => 'required|string|max:100',
        'pincode' => 'required|string|max:10',
        'payment_method' => 'required|in:cod,online',
    ]);

    // Calculate subtotal
    $subtotal = 0;

    foreach ($cart as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }

    // Get payment method
    $paymentMethod = $request->payment_method;

    // Create Order
    $order = Order::create([
        'user_id' => session('id'),

        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,

        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'pincode' => $request->pincode,

        'subtotal' => $subtotal,
        'total' => $subtotal,

        'payment_method' => $paymentMethod,

        'payment_status' => 'pending',
        'order_status' => 'pending',
    ]);

    // Create Order Items
    foreach ($cart as $productId => $item) {

        $order->items()->create([
            'product_id' => $productId,
            'product_name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
            'total' => $item['price'] * $item['quantity'],
        ]);
    }

    // Empty cart
    session()->forget('cart');

    return redirect()
        ->route('checkout')
        ->with('success', 'Order placed successfully!');
}

    // =========================
    // ABOUT PAGE
    // =========================
    public function about()
    {
        return view('about');
    }


    // =========================
    // BLOG
    // =========================
    public function blog()
    {
        return view('blog');
    }


    // =========================
    // BLOG DETAILS
    // =========================
    public function blogdetails()
    {
        return view('blogdetails');
    }


    // =========================
    // LOGIN PAGE
    // =========================
    public function login()
    {
        return view('login');
    }


    // =========================
    // REGISTER PAGE
    // =========================
    public function register()
    {
        return view('register');
    }


    // =========================
    // PRODUCT PAGE
    // =========================
    public function product()
    {
        return view('product');
    }


    // =========================
    // LOGOUT
    // =========================
    public function logout()
    {
        session()->forget('id');
        session()->forget('type');

        return redirect('/login');
    }


    // =========================
    // REGISTER USER
    // =========================
    public function registerUser(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:30|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);

        $newUser = new User();

        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->phone = $req->phone;
        $newUser->password = Hash::make($req->password);
        $newUser->type = "Customer";

        if ($newUser->save()) {
            return view('login')
                ->with('success', 'congratulation your account is ready');
        }
    }


    // =========================
    // LOGIN USER
    // =========================
    public function loginUser(Request $req)
    {
        $user = User::where(
            'email',
            $req->input('email')
        )->first();

        if (
            $user &&
            Hash::check(
                $req->input('password'),
                $user->password
            )
        ) {
            session()->put('id', $user->id);
            session()->put('type', $user->type);

            if ($user->type == 'Customer') {
                return redirect('/');
            }
        }

        return back()->with(
            'error',
            'Invalid email or password'
        );
    }
}

