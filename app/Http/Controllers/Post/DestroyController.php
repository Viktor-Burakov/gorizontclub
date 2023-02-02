<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Models\PostDetail;
use App\Http\Controllers\Controller;


class DestroyController extends Controller
{
   public function __invoke($uri)
   {
      $post = Posts::where('url', $uri)->first();
      $post->delete();

      PostDetail::where('post_id', $post->id)->delete();

      return redirect()->route('main.index');
   }
}
