<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Http\Controllers\Controller;


class IndexController extends Controller
{
   public function __invoke()
   {
      $posts = Posts::where('active', 0)->get();
      return view('post.index', compact('posts'));
   }
}
