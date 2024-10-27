<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'user_id',
        'category_id',
        'expiration_date'
    ];

    protected $dates = ['expiration_date'];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the ProductStock model
    public function productStock()
    {
        return $this->hasOne(ProductStock::class);
    }

    // Additional attributes and logic can be added here
    public function getStockQuantityAttribute()
    {
        return $this->productStock ? $this->productStock->quantity : 0;
    }

    public function getStockUnitAttribute()
    {
        return $this->productStock ? $this->productStock->unit : '';
    }
}