<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'published_at',
        'status',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getPublishedAtAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}
