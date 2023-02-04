<?php

namespace App\Http\Controllers\Post;

use App\Models\Posts;
use App\Models\PostDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\StoreDetailRequest;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request, StoreDetailRequest $requestDetail)
   {
      $data = $request->validated();
      $categories = array();
      if (isset($data['category'])) {
         foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
         }
         unset($data['category']);
      }
      $post = Posts::create($data);

      $dataPostDetail = $requestDetail->validated();

      $dataPostDetail['post_id'] = $post->id;

      PostDetail::create($dataPostDetail);

      $post->categories()->attach($categories);

      return redirect()->route('post.edit', $data['url']);
   }
}
