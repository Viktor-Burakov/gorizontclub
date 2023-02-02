@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->description)
@section('keywords', $post->keywords)


@section('content')
<section>
   <div class="text">
      <a href="{{route('post.edit', $post->url) }}" class="btn btn-outline-success m-1">Редактировать</a>
      <h1>{{$post->H1}}</h1>


{{-- {{dd($post->content1)}} --}}
            @foreach ($post->content1 as $item)
   @include("partials.posts." . $item->type, ["content" => $item])




            @endforeach
   </div>
</section>
@endsection
