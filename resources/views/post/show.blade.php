@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <a href="{{route('post.edit', $post->url) }}" class="btn btn-outline-success m-1">Редактировать</a>
      <h1>{{$post->H1}}</h1>

      <div>{{$post->title}}</div>
      <div>{{$post->description}}</div>
      <div>{!!$post->content!!}</div>

   </div>
</section>
@endsection