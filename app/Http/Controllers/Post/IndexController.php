<?php

namespace App\Http\Controllers\Post;

<<<<<<< HEAD
=======
use App\Models\Posts;
>>>>>>> aad975b85fbfa9bffa1156b242975552069842d4


class IndexController extends BaseController
{
   public function __invoke()
   {
      $posts = $this->service->index();
   
      return view('post.index', compact('posts'));
   }
}
