<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoutController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/products', [ProductController::class, 'list'])->name('products');
Route::get('/productsdetail/{product_id}', [ProductController::class, 'getdetail'])->name('productsdetail');
Route::get('/category/{category_id}', [ProductController::class, 'getproductsByCategory'])->name('category');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/productlist', [AdminController::class, 'productlist'])->name('productlist');
Route::get('/user', [AdminController::class, 'user'])->name('user');
Route::get('/update', [AdminController::class, 'update'])->name('update');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postlogin']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postregister']);
Route::post('/dangxuat', [LogoutController::class, 'logout'])->name('dangxuat');
Route::post('/productadd', [AdminController::class, 'productadd'])->name('productadd');

Route::get('/productupdateform/{id}', [AdminController::class, 'productupdateform'])->name('productupdateform');
Route::post('/productupdate', [AdminController::class, 'productupdate'])->name('productupdate');
Route::get('/productdelete/{id}', [AdminController::class, 'productdelete'])->name('productdelete');


Route::get('/checkout', [CartController::class, 'showCheckoutForm'])->name('checkout');
Route::post('/process-checkout', [CartController::class, 'processCheckout'])->name('processCheckout');
Route::get('/success', [CartController::class, 'success'])->name('success');
Route::delete('/remove-from-cart/{product_id}', [CartController::class, 'removeFromCart'])->name('removefromcart');
Route::patch('/updatecart', [CartController::class, 'updateCart'])->name('updatecart');
