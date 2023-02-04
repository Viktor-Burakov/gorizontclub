<?php

namespace App\Services\Post;

use App\Models\Posts;
use App\Models\PostDetail;

class Service
{
   public function store($data, $dataDetail)
   {
      $categories = array();
      if (isset($data['category'])) {
         foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
         }
         unset($data['category']);
      }

      $post = Posts::create($data);

      $dataDetail['post_id'] = $post->id;

      PostDetail::create($dataDetail);

      $post->categories()->attach($categories);
   }

   public function update($data, $dataDetail, $uri)
   {
      $categories = array();
      if (isset($data['category'])) {
         foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
         }

         unset($data['category']);
      }

      $post = Posts::where('url', $uri)->first();
      $post->update($data);

      if (isset($dataDetail['content'])) {
         ksort($dataDetail['content']);
         $dataDetail['content'] = json_encode($dataDetail['content'], JSON_UNESCAPED_UNICODE);
      }

      PostDetail::where('post_id', $post->id)->update($dataDetail);

      $post->categories()->sync($categories);
   }
}
