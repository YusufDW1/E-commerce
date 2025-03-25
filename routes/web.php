<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductController;

Route::get('/products', function () {
    return "Halaman Produk";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::resource('products', ProductController::class)->except(['show']);

Route::get('/', function () {
    $products = App\Models\Product::all();
    return view('welcome', compact('products'));
});

Route::get('/', function(){
    $title = "Homepage";
    return view('web.homepage',['title'=>$title]);
   });
Route::get('product', function(){
    $title = "Product";
    return view('web.product',['title'=>$title]);
});
Route::get('product/{slug}', function($slug){
    $title = "Single Product";
    return view('web.single_product',['title'=>$title,'slug'=>$slug]);
});
Route::get('categories', function(){
    $title = "Categories";
    return view('web.categories',['title'=>$title]);
});
Route::get('category/{slug}', function($slug){
    $title = "Single Category";
    return view('web.single_category',['title'=>$title,'slug'=>$slug]);
});
Route::get('cart', function(){
    $title = "Cart";
    return view('web.cart',['title'=>$title]);
});
Route::get('checkout', function(){
    $title = "Checkout";
    return view('web.checkout',['title'=>$title]);
});
   
   

Route::resource('products', ProductController::class)->except(['show']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

require __DIR__.'/auth.php';
