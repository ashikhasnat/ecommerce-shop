<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getAvgRatingAttribute()
    {
        $ratings = $this->reviews()
            ->get('ratings')
            ->avg('ratings');
        return round($ratings);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function cart()
    {
        return $this->belongsTo(Wishlist::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
