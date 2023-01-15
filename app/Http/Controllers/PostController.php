<?php

namespace App\Http\Controllers;

use App\Models\PostDetail;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        $post = Posts::find(1);
        dd($post->category1);

        $posts = Posts::where('active', 0)->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {

        $data = request()->validate(Posts::$validData);

        $data['category'] = Posts::categoryImplode();

        $post = Posts::create($data);

        $dataPostDetail = request()->validate(PostDetail::$validData);

        $dataPostDetail['post_id'] = $post->id;

        PostDetail::create($dataPostDetail);

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

        $post['category'] = Posts::categoryExplode($post->category);
        return view('post.edit', compact('post'));
    }

    public function update($uri)
    {

        $data = request()->validate(Posts::$validData);

        $data['category'] = Posts::categoryImplode();

        Posts::where('url', $uri)->update($data);

        $dataPostDetail = request()->validate(PostDetail::$validData);
        $dataId = request()->validate(Posts::$validId);

        PostDetail::where('post_id', $dataId)->update($dataPostDetail);

        return redirect()->route('post.show', $data['url']);
    }

    public function destroy($uri)
    {
        Posts::where('url', $uri)->delete();
        $dataId = request()->validate(Posts::$validId);
        PostDetail::where('post_id', $dataId)->delete();
        return redirect()->route('main.index');
    }
}
