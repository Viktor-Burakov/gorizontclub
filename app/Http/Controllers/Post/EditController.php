<?php

namespace App\Http\Controllers\Post;

<<<<<<< HEAD
=======
use App\Models\Posts;
use App\Models\Categories;


>>>>>>> aad975b85fbfa9bffa1156b242975552069842d4
class EditController extends BaseController
{
   public function __invoke($uri)
   {
      $post = $this->service->edit($uri);

      return view('post.edit', compact('post'));
   }
}
