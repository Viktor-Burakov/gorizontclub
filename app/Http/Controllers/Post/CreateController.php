<?php

namespace App\Http\Controllers\Post;

use App\Models\Categories;
use App\Http\Controllers\Controller;


class CreateController extends Controller
{
   public function __invoke()
   {
      $categories = Categories::all();

      return view('post.create', compact('categories'));
   }
}
