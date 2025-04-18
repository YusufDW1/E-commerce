<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = ['name', 'slug', 'description', 'image'];

    // Optionally, you could override the table name if it's not 'categories'
    protected $table = 'categories';

    // If you're working with an in-memory array for testing or development:
    private static $product_categories = [
        [
            'id' => 1,
            'name' => 'pria',
            'slug' => 'Pakaian Pria',
            'description' => 'Ini adalah produk pakaian pria',
            'image' => 'https://placehold.co/300x300?text=Pakaian+Pria',
        ],
        [
            'id' => 2,
            'name' => 'wanita',
            'slug' => 'Pakaian Wanita',
            'description' => 'Ini adalah produk pakaian wanita',
            'image' => 'https://placehold.co/300x300?text=Pakaian+Wanita',
        ],
        [
            'id' => 3,
            'name' => 'anak-anak',
            'slug' => 'Pakaian Anak-Anak',
            'description' => 'Ini adalah produk pakaian anak-anak',
            'image' => 'https://placehold.co/300x300?text=Pakaian+Anak-Anak',
        ],
        [
            'id' => 4,
            'name' => 'aksesori',
            'slug' => 'Aksesori',
            'description' => 'Ini adalah produk aksesori',
            'image' => 'https://placehold.co/300x300?text=Aksesori',
        ],
        [
            'id' => 5,
            'name' => 'sepatu',
            'slug' => 'Sepatu',
            'description' => 'Ini adalah produk sepatu',
            'image' => 'https://placehold.co/300x300?text=Sepatu',
        ]
    ];

    public static function find($slug) {
        $categories = self::all(); // Ambil semua kategori
        foreach ($categories as $category) {
            if ($category['slug'] === $slug) {
                return $category;
            }
        }
        return null; // Jika kategori tidak ditemukan
    }
    

    // Static method to retrieve categories from the array (for testing or development)
    public static function allCategories()
    {
        return self::$product_categories;
    }

    // If using a database, you can use the default Eloquent all method:
    // public static function allCategories()
    // {
    //     return self::all(); // Fetches all categories from the database
    // }
}
