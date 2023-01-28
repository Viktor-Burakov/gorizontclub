@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <h1>Редактировать пост</h1>
      <div><span>Title: <i>{{$post->title}}</i></span></div>
      <form action="{{ route('post.update', $post->url) }}" method="post" id="form" class="g-3 needs-validation" enctype="multipart/form-data" novalidate>
         @csrf
         @method('patch')
               <div class="mb-5">
            <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
            <button type="button" id="enter-data" class="btn btn-secondary btn-lg">Заполнить ТЕСТ</button>
         </div>
         <div class="mb-5">
            <label for="title" class="h2 form-label text-bg-warning p-2 rounded-2">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            <div class="form-text">До стольки то символов</div>
            <div class="invalid-feedback">
               Обязательно для заполнения.
            </div>
                        @error('title')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-5">
            <label for="url" class="h2 form-label text-bg-warning p-2 rounded-2">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $post->url) }}" required>
                        <div class="invalid-feedback">
               Обязательно для заполнения.
            </div>
                     @error('url')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-5">
            <label for="H1" class="h2 form-label text-bg-warning p-2 rounded-2">H1 - заголовок</label>
            <input type="text" class="form-control" id="H1" name="H1" value="{{ old('H1', $post->H1) }}" required>
            <div class="form-text">До стольки то символов</div>
                        <div class="invalid-feedback">
               Обязательно для заполнения.
            </div>
                     @error('H1')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>
         
         <div class="mb-5">
            <div><label for="category" class="h2 form-label text-bg-warning p-2 rounded-2">Рубрика</label></div>
            @foreach ($categories as $category)
            <input type="checkbox" class="btn-check" id="category[{{ $category->id }}]" name="category[{{ $category->id }}]" autocomplete="off"{{ $category->checked }}>
            <label class="btn btn-outline-success m-1" for="category[{{ $category->id }}]">{{ $category->id }} - {{ $category->title }}</label>
            @endforeach
         </div>

         <div class="mb-5">
            <label for="description" class="h2 form-label text-bg-warning p-2 rounded-2">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $post->description) }}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="keywords" class="h2 form-label text-bg-warning p-2 rounded-2">Keywords</label>
            <textarea class="form-control" id="keywords" name="keywords">{{ old('keywords', $post->keywords) }}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="date_start" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время начала</label>
            <input type="text" class="form-control" id="date_start" name="date_start" value="{{ old('date_start', $post->date_start) }}">
         </div>

         <div class="mb-5">
            <label for="date_end" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время окончания</label>
            <input type="text" class="form-control" id="date_end" name="date_end" value="{{ old('date_end', $post->date_end) }}">
         </div>

         <div class="mb-5">
            <label for="preview_text" class="h2 form-label text-bg-warning p-2 rounded-2">Анонс</label>
            <textarea class="form-control" id="preview_text" name="preview_text">{{ old('preview_text', $post->preview_text) }}</textarea>
            <div class=" form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="preview" class="h2 form-label text-bg-warning p-2 rounded-2">Картинка анонса</label>
            <input type="text" class="form-control" id="preview" name="preview" value="{{ old('preview', $post->preview) }}">
            <div class="form-text">Мин размеры</div>
         </div>

         <div class="mb-5">
            <label for="preview_alt" class="h2 form-label text-bg-warning p-2 rounded-2">Img Alt - описание картинки</label>
            <input type="text" class="form-control" id="preview_alt" name="preview_alt" value="{{ old('preview_alt', $post->preview_alt) }}">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="content-rows">
            <div class="text-bg-warning p-2 rounded-2 mb-3">Контент</div>
            <div class="mb-5 content-item" id="content-item_0">
               <div class="mb-3">
                  <label for="content_0" class="form-label text-bg-dark p-1 rounded-2">Текст</label>
                  <textarea class="form-control" id="content_0" name="content[]">{{ old('content', $post->content) }}</textarea>
               </div>
               <div class="row">
                  <div class="col">
                     <button type="button" class="btn btn-dark btn-plus">Текст</button>
                     <button type="button" class="btn btn-success btn-plus">Img</button>
                     <button type="button" class="btn btn-warning btn-plus">Video</button>
                  </div>
                  <div class="col d-flex flex-end justify-content-end">
                        <button type="button" class="btn btn-danger btn-del">Удалить</button>
                  </div>
               </div>
            </div>

                        <div class="mb-5 content-item" id="content-item_0">
               <div class="mb-3">
                   <label for="files" class="form-label">IMG</label>
            <input class="form-control" type="file" id="files" name="files[][]" multiple>
               </div>
               <div class="row">
                  <div class="col">
                     <button type="button" class="btn btn-dark btn-plus">Текст</button>
                     <button type="button" class="btn btn-success btn-plus">Img</button>
                     <button type="button" class="btn btn-warning btn-plus">Video</button>
                  </div>
                  <div class="col d-flex flex-end justify-content-end">
                        <button type="button" class="btn btn-danger btn-del">Удалить</button>
                  </div>
               </div>
            </div>

         </div>
@php
   echo "<br><BR><pre>";


$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

print_r($arr);
echo "<hr>";
$arr2 = json_encode($arr);

echo $arr2;
echo "<hr>";
print_r(json_decode($arr2, true));




echo "<br><BR></pre>";
@endphp




         <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
         
      </form>
      <div class="d-flex justify-content-end">
            <form action="{{ route('post.delete', $post->url) }}" method="post">
         @csrf
         @method('delete')
         <input type="hidden" id="post_id" name="post_id" value="{{ $post->post_id }}" />
            <button type="submit" class="btn btn-outline-danger btn-xs">Удалить</button>
            </form></div>
   </div>
</section>
@endsection