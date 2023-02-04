<?php

namespace App\Http\Controllers\Post;

<<<<<<< HEAD
=======
use App\Models\Posts;


>>>>>>> aad975b85fbfa9bffa1156b242975552069842d4
class ShowController extends BaseController
{
   public function __invoke($uri)
   {
      $post = $this->service->show($uri);

      return view('post.show', compact('post'));
   }
}
