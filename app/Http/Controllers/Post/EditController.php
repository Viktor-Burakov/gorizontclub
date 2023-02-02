<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Models\Categories;
use App\Http\Controllers\Controller;


class EditController extends Controller
{
   public function __invoke($uri)
   {
      $post = Posts::join('post_detail', 'posts.id', '=', 'post_detail.post_id')
         ->where('url', $uri)->first();
      if (!isset($post)) dd('404');
      $categories = Categories::all();

      foreach ($categories as $key => $category) {
         $categories[$key]['checked'] = '';
         foreach ($post->categories as $postCategory) {

            if ($category->id == $postCategory->id) {
               $categories[$key]['checked'] = ' checked';
            }
         }
      }

      return view('post.edit', compact('post', 'categories'));
   }
}
