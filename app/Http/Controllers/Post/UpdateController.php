<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Models\PostDetail;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
   public function __invoke($uri)
   {
      $data = request()->validate(Posts::$validData);
      $categories = array();
      if (isset($data['category'])) {
         foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
         }

         unset($data['category']);
      }

      $post = Posts::where('url', $uri)->first();
      $post->update($data);

      $dataPostDetail = request()->validate(PostDetail::$validData);


      if (isset($dataPostDetail['content'])) {
         ksort($dataPostDetail['content']);
         $dataPostDetail['content'] = json_encode($dataPostDetail['content'], JSON_UNESCAPED_UNICODE);
      }


      PostDetail::where('post_id', $post->id)->update($dataPostDetail);

      $post->categories()->sync($categories);


      return redirect()->route('post.show', $data['url']);
   }
}
