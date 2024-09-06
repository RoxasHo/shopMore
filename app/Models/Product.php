<?php

//Joey Tan Chun Yee

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{

    use HasFactory;

    protected $fillable = [

        'name',
        'slug',
        'short_description',
        'description',
        'regular_price',
        'sale_price',
        'sku',
        'stock_status',
        'featured',
        'quantity',
        'image',
        'category_id'// Add other fillable attributes here
    ];
    public function category()
    {

        return $this->belongsTo(Category::class, 'category_id');
    }
}
