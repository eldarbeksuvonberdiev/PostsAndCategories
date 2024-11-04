<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'text',
        'image',
        'like_count',
        'dislike_count',
        'view_count'
    ];
}
