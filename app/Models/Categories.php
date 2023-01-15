<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'category_posts', 'category_id', 'post_id');
    }
}
