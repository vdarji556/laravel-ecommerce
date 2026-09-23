<?php
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/shop', [MainController::class, 'shop'])->name('shop');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/shop-details/{id}', [MainController::class, 'productDetails'])->name('shop.details');

Route::get('/shopping-cart', [MainController::class, 'shoppingcart'])->name('cart');

Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');

Route::get('/blog', [MainController::class, 'blog'])->name('blog');

Route::get('/product', [MainController::class, 'product'])->name('product');

Route::get('/category', [MainController::class, 'category'])->name('category');
Route::get('/category/{id}/products', [MainController::class, 'categoryProducts'])
    ->name('category.products');

Route::get('/cart/add/{id}', [MainController::class, 'addToCart'])
    ->name('cart.add');

Route::get('/cart/remove/{id}', [MainController::class, 'removeFromCart'])
    ->name('cart.remove');

Route::get('/blog-details', [MainController::class, 'blogdetails'])->name('blog.details');
Route::post('/place-order', [MainController::class, 'placeOrder'])
    ->name('place.order');

Route::get('/checkout', [MainController::class, 'checkout'])
    ->name('checkout');
Route::get('/my-orders', [MainController::class, 'myOrders'])
    ->name('my.orders');
Route::get('/order-details/{id}', [MainController::class, 'orderDetails'])
    ->name('order.details');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/logout', [MainController::class, 'logout'])->name('logout');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/registerUser', [MainController::class, 'registerUser'])->name('registeruser');
Route::post('/loginUser',[MainController::class,'loginUser'])->name('loginuser');


Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'login'])
        ->name('admin.login');

    Route::post('/login', [AdminController::class, 'loginAdmin'])
        ->name('admin.login.submit');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');



    // Categories
    Route::resource('/categories', CategoryController::class)->names([
        'index' => 'admin.categories',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
    ]);


    // Products
    Route::resource('/products', ProductController::class)->names([
        'index' => 'admin.products',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);


    // Delete Product Image
    Route::delete(
        '/products/image/{id}',
        [ProductController::class, 'deleteImage']
    )->name('admin.products.image.delete');


    // =========================
    // ORDERS
    // =========================

    Route::resource('/orders', OrderController::class)->only([
        'index',
        'show'
    ])->names([
        'index' => 'admin.orders',
        'show' => 'admin.orders.show',
    ]);

    Route::put(
        '/orders/{id}/status',
        [OrderController::class, 'updateStatus']
    )->name('admin.orders.status');


    // Logout
    Route::get('/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');

    Route::get('/customers', function () {
        return view('admin.customers');
    })->name('admin.customers');

    Route::resource('/customers', CustomerController::class)->only([
    'index',
    'show'
        ])->names([
            'index' => 'admin.customers',
            'show' => 'admin.customers.show',
        ]);
    Route::get('/logout', [AdminController::class, 'logout'])
    ->name('admin.logout');
});