<?php

namespace VarenykyBlog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    // public function blogs(): HasMany
    // {
    //     return $this->hasMany(Blog::class, 'blog_category_id');
    // }
}
