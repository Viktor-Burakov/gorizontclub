@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <h2>Расписание мероприятий</h2>
      @foreach($posts as $post)
      <div>{{$post->title}}</div>

      <div class="row">
         <div class="col alert alert-primary">
            <a href="{{route('post.show', $post->url) }}">{{$post->H1}}</a><br>
            <a href="{{route('post.edit', $post->url) }}">Редактировать</a>
         </div>
         <div class="col alert alert-primary">
            {{$post->preview}} - alt: {{$post->preview_alt}}
         </div>
         <div class="col alert alert-primary">
            {{$post->preview_text}}
         </div>
         <div class="col alert alert-primary">
         </div>
      </div>

      @endforeach
   </div>
</section>
@endsection