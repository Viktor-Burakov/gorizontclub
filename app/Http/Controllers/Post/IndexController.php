<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;


class IndexController extends BaseController
{
   public function __invoke()
   {
      $posts = Posts::where('active', 0)->get();
      return view('post.index', compact('posts'));
   }
}
