<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PostDetail;
use App\Models\Posts;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::where('active', 0)->get();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Categories::all();

        return view('post.create', compact('categories'));
    }

    public function store()
    {

        $data = request()->validate(Posts::$validData);
        foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
        }
        unset($data['category']);
 
        $post = Posts::create($data);

        $dataPostDetail = request()->validate(PostDetail::$validData);

        $dataPostDetail['post_id'] = $post->id;

        PostDetail::create($dataPostDetail);

        $post->categories()->attach($categories);

        return redirect()->route('post.edit', $data['url']);
    }

    public function show($uri)
    {
        $post = Posts::join('post_detail', 'posts.id', '=', 'post_detail.post_id')
            ->where('url', $uri)->first();
        if (!isset($post)) dd('404');
        return view('post.show', compact('post'));
    }

    public function edit($uri)
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

    public function update($uri)
    {
        $data = request()->validate(Posts::$validData);
   
        foreach ($data['category'] as $key => $value) {
            $categories[] = $key;
        }
        unset($data['category']);

        dump($data);
        dd();
        $post = Posts::where('url', $uri)->first();
        $post->update($data);

        $dataPostDetail = request()->validate(PostDetail::$validData);

        PostDetail::where('post_id', $post->id)->update($dataPostDetail);

        $post->categories()->sync($categories);
 

        return redirect()->route('post.show', $data['url']);
    }

    public function destroy($uri)
    {
        $post = Posts::where('url', $uri)->first();
        $post->delete();

        PostDetail::where('post_id', $post->id)->delete();

        return redirect()->route('main.index');
    }
}
