<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
