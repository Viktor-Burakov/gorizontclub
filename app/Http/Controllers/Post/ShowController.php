<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Http\Controllers\Controller;


class ShowController extends Controller
{
   public function __invoke($uri)
   {
      $post = Posts::join('post_detail', 'posts.id', '=', 'post_detail.post_id')
         ->where('url', $uri)->first();
      if (!isset($post)) dd('404');
      $post->content = json_decode($post->content);

      return view('post.show', compact('post'));
   }
}