<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductController;

Route::get('/apalah', function () {
    return "Putra suwe men instal laravel";
});

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

Route::get('/ecommerce', function () {
    return view('ecommerce.index');
});

Route::get('/ecommerce/create', function () {
    return view('ecommerce.create');
});

Route::get('/ecommerce/edit', function ($id) {
    return view('ecommerce.edit');
});

Route::prefix('ecommerce')->name('ecommerce.')->group(function () {
    Route::resource('products', ProductController::class)->except(['show']);
});

Route::resource('products', ProductController::class)->except(['show']);

Route::get('/', function () {
    $products = App\Models\Product::all();
    return view('welcome', compact('products'));
});

Route::resource('products', ProductController::class)->except(['show']);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

require __DIR__.'/auth.php';
