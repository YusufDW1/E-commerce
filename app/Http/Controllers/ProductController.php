<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->get();  // Ambil semua produk terbaru
        return view('dashboard.products.index', compact('products'));
    }

    // Menampilkan form untuk menambah produk
    public function create()
    {
        $categories = Categories::all();  // Ambil semua kategori produk
        return view('dashboard.products.create', compact('categories'));
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'nullable|unique:products,slug',  // Validasi slug jika diisi
            'sku' => 'required|unique:products,sku',  // Validasi SKU unik
            'price' => 'required|numeric',  // Validasi harga numeric
            'stock' => 'required|integer',  // Validasi stok integer
            'description' => 'nullable|string',  // Validasi deskripsi jika ada
            'product_category_id' => 'required|exists:product_categories,id', // Validasi kategori yang ada
        ]);

        // Membuat slug otomatis jika tidak diberikan
        $slug = $request->slug ?: Str::slug($request->name);

        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'sku' => $request->sku,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'product_category_id' => $request->product_category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Menampilkan form untuk edit produk
    public function edit(Product $product)
    {
        $categories = Categories::all();  // Ambil semua kategori produk
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    // Memperbarui data produk
    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:products,slug,' . $product->id,  // Periksa slug yang sama selain produk ini
            'sku' => 'required|unique:products,sku,' . $product->id,  // Periksa SKU yang sama selain produk ini
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Update data produk
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'sku' => $request->sku,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'product_category_id' => $request->product_category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
