<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'sku',
        'price', 'stock', 'product_category_id',
        'image_url', 'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
