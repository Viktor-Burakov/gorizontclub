<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Models\PostDetail;
use App\Http\Controllers\Controller;


class StoreController extends Controller
{
   public function __invoke()
   {
      $data = request()->validate(Posts::$validData);
      $categories = array();
      if (isset($data['category'])) {
         foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
         }
         unset($data['category']);
      }
      $post = Posts::create($data);

      $dataPostDetail = request()->validate(PostDetail::$validData);

      $dataPostDetail['post_id'] = $post->id;

      PostDetail::create($dataPostDetail);

      $post->categories()->attach($categories);

      return redirect()->route('post.edit', $data['url']);
   }
}
