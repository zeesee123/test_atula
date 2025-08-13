<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_image',
        'title',
        'date',
        'publish',
        'content',
        'slug',
        'meta_title',
        'meta_description',
        'schema_markup',
    ];
}
