<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        return view('web.homepage', [
            'categories' => $categories,
            'title' => 'Homepage'
        ]);
    }

    public function products()
    {
        $products = Product::all();
        $title = 'Products';

        return view('web.products', [
            'products' => $products,
            'title' => $title
        ]);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $title = $product->name;

        return view('web.product', [
            'product' => $product,
            'title' => $title
        ]);
    }

    public function categories()
    {
        $categories = Category::all();
        $title = 'Categories';

        return view('web.categories', [
            'categories' => $categories,
            'title' => $title
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $title = $category->name;

        return view('web.category_by_slug', [
            'category' => $category,
            'title' => $title
        ]);
    }

    public function cart()
    {
        return view('web.cart', [
            'title' => 'Cart'
        ]);
    }

    public function checkout()
    {
        return view('web.checkout', [
            'title' => 'Checkout'
        ]);
    }
}