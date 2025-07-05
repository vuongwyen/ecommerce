<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'gender',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'is_active',
        'is_featured',
        'in_stock',
        'on_sale',
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size')->withPivot('stock_quantity');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->approved();
    }

    public function getAverageRatingAttribute()
    {
        return $this->approvedReviews()->avg('rating') ?? 0;
    }

    public function getReviewCountAttribute()
    {
        return $this->approvedReviews()->count();
    }

    /**
     * Get the formatted image URL for a given image path
     */
    public function getImageUrl($imagePath = null)
    {
        if (!$imagePath) {
            $imagePath = $this->images[0] ?? null;
        }

        if (!$imagePath) {
            return asset('images/placeholder-product.svg');
        }

        // Check if the file exists
        $fullPath = storage_path('app/public/' . $imagePath);
        if (!file_exists($fullPath)) {
            // Return a placeholder image URL
            return asset('images/placeholder-product.svg');
        }

        return asset('storage/' . $imagePath);
    }

    /**
     * Check if the image file exists
     */
    public function imageExists($imagePath = null)
    {
        if (!$imagePath) {
            $imagePath = $this->images[0] ?? null;
        }

        if (!$imagePath) {
            return false;
        }

        $fullPath = storage_path('app/public/' . $imagePath);
        return file_exists($fullPath);
    }
}
