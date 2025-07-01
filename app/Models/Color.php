<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'hex_code',
        'is_active',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_color');
    }
}
