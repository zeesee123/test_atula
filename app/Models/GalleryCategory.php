<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'category_text'];

    public function images()
    {
        return $this->hasMany(GalleryImages::class, 'gallery_category_id');
    }
}
