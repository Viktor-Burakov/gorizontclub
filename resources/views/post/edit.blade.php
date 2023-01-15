@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <h1>Редактировать пост</h1>
      <div><span>Title: <i>{{$post->title}}</i></span></div>
      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif
      <form action="{{ route('post.update', $post->url) }}" method="post" id="form">
         @csrf
         @method('patch')
         <input type="hidden" id="post_id" name="post_id" value="{{$post->post_id}}" />
               <div class="mb-5">
            <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
         </div>
         <div class="mb-5">
            <label for="title" class="h2 form-label text-bg-warning p-2 rounded-2">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="url" class="h2 form-label text-bg-warning p-2 rounded-2">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{$post->url}}">
         </div>

         <div class="mb-5">
            <label for="H1" class="h2 form-label text-bg-warning p-2 rounded-2">H1 - заголовок</label>
            <input type="text" class="form-control" id="H1" name="H1" value="{{$post->H1}}">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <div><label for="category" class="h2 form-label text-bg-warning p-2 rounded-2">Рубрика</label></div>
            @foreach ($setting['categories'] as $id => $name)
            <input type="checkbox" class="btn-check" id="category-{{ $id }}" name="category-{{ $id }}" autocomplete="off" @if (in_array($id, $post->category)) checked @endif>
            <label class="btn btn-outline-success m-1" for="category-{{ $id }}">{{ $id }} - {{ $name }}</label>
            @endforeach
         </div>

         <div class="mb-5">
            <label for="description" class="h2 form-label text-bg-warning p-2 rounded-2">Description</label>
            <textarea class="form-control" id="description" name="description">{{$post->description}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="keywords" class="h2 form-label text-bg-warning p-2 rounded-2">Keywords</label>
            <textarea class="form-control" id="keywords" name="keywords">{{$post->keywords}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="date_start" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время начала</label>
            <input type="text" class="form-control" id="date_start" name="date_start" value="{{$post->date_start}}">
         </div>

         <div class="mb-5">
            <label for="date_end" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время окончания</label>
            <input type="text" class="form-control" id="date_end" name="date_end" value="{{$post->date_end}}">
         </div>

         <div class="mb-5">
            <label for="preview_text" class="h2 form-label text-bg-warning p-2 rounded-2">Анонс</label>
            <textarea class="form-control" id="preview_text" name="preview_text">{{$post->preview_text}}</textarea>
            <div class=" form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="preview" class="h2 form-label text-bg-warning p-2 rounded-2">Картинка анонса</label>
            <input type="text" class="form-control" id="preview" name="preview" value="{{$post->preview}}">
            <div class="form-text">Мин размеры</div>
         </div>

         <div class="mb-5">
            <label for="preview_alt" class="h2 form-label text-bg-warning p-2 rounded-2">Img Alt - описание картинки</label>
            <input type="text" class="form-control" id="preview_alt" name="preview_alt" value="{{$post->preview_alt}}">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="content" class="h2 form-label text-bg-warning p-2 rounded-2">Контент</label>
            <textarea class="form-control" id="content" name="content">{{$post->content}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>
         <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
         
      </form>
      <div class="d-flex justify-content-end">
            <form action="{{ route('post.delete', $post->url) }}" method="post">
         @csrf
         @method('delete')
         <input type="hidden" id="post_id" name="post_id" value="{{$post->post_id}}" />
            <button type="submit" class="btn btn-outline-danger btn-xs">Удалить</button>
            </form></div>
   </div>
</section>
@endsection