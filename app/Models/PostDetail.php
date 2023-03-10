<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Posts;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostDetail extends Posts
{

    use HasFactory;
    use SoftDeletes;
    protected $table = 'post_detail';
    protected $guarded = [];

    public static $validData = array(
        'description' => 'nullable|string',
        'keywords' => 'nullable|string',
        'content' => 'nullable|string',
        'gallery' => 'nullable|string',
        'content' => 'nullable|array',
        'content.*.type' => 'string',
        'content.*.value' => 'nullable|string',
        'content.*.level' => 'nullable|string',
        'content.*.img.*' =>
        'image|mimes:jpg,png,jpeg,gif|max:10000',
    );
}
