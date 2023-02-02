@extends('layouts.app')
@section('title', $post->title . ' - редактирование')
@section('description', $post->description)
@section('keywords', $post->keywords)

@section('content')
      <form action="{{ route('post.update', $post->url) }}" method="post" id="form" class="g-3 needs-validation" enctype="multipart/form-data" novalidate>
         @csrf
         @method('patch')
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
               <div class="mb-2">
            <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
            <button type="button" id="enter-data" class="btn btn-secondary btn-lg">Заполнить ТЕСТ</button>
            <a href="{{route('post.show', $post->url) }}" class="btn btn-info btn-lg" target="_blank">Просмотр</a>
         </div>


      </div></section>
         <section>
   <div class="text">
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

      </div></section>
         <section>
   <div class="text">

<div class="invisible" id="content-templay">
   <div class="mb-5 content-item" id="content-item" style="display:none;">
               <div class="row">
                  <div class="col-auto">
                     <button type="button" class="btn btn-outline-info btn-plus" value="sub_title">H2,H3</button>
                     <button type="button" class="btn btn-outline-dark btn-plus" value="text">Текст</button>
                     <button type="button" class="btn btn-outline-success btn-plus" value="img">Img</button>
                     <button type="button" class="btn btn-outline-warning btn-plus" value="video">Video</button>
                     <button type="button" class="btn btn-outline-secondary btn-plus" value="break">Разрыв</button>
                  </div>
                  <div class="col d-flex flex-end justify-content-end">
                        <button type="button" class="btn btn-danger btn-del">Удалить</button>
                  </div>
               </div>
            </div>
</div>
<div class="d-none" id="sub_title">
<div class="mb-3 content-input">
<div>                  
<label for="content_0_sub_title" class="form-label text-bg-info p-1 rounded-2 me-5">Подзаголовок</label><input type="radio" class="btn-check m-1" name="sub_title_0" id="sub_title_h2_0" autocomplete="off" value="h2" checked>
<label class="btn btn-outline-info text-uppercase btn-sub_title" for="sub_title_H2_0">h2</label>

<input type="radio" class="btn-check m-1" name="sub_title_0" id="sub_title_H3_0" autocomplete="off" value="h3">
<label class="btn btn-outline-info text-uppercase btn-sub_title" for="sub_title_h3_0">h3</label>

<input type="radio" class="btn-check m-1" name="sub_title_0" id="sub_title_H4_0" autocomplete="off" value="h4">
<label class="btn btn-outline-info text-uppercase btn-sub_title" for="sub_title_h4_0">h4</label>
</div>
<input type="text" class="form-control h2" id="content_0_sub_title" name="">
<input type="hidden" class="form-type" name="" value="sub_title">
<input type="hidden" class="form-level" name="" value="h2">

                </div>
</div>
<div class="d-none" id="text">
              <div class="mb-3 content-input">
                  <label for="content_0" class="form-label text-bg-dark p-1 rounded-2">Текст</label>
                  <textarea oninput="auto_grow(this)" class="form-control" id="content_0_text" name=""></textarea>
               <input type="hidden" class="form-type" name="" value="text">
               </div>
</div>
<div class="d-none" id="img">
 <div class="mb-3 content-input">
                   <label for="content_0_img" class="form-label text-bg-success p-1 rounded-2">IMG</label>
            <input class="form-control" type="file" id="content_0_img" name="" accept="image/jpeg,image/jpg,image/png,image/gif" multiple>
               <input type="hidden" class="form-type" name="" value="img">
         </div>
</div>
<div class="d-none" id="video">
 <div class="mb-3 content-input">
                   <label for="content_0_video" class="form-label text-bg-warning p-1 rounded-2">Video</label>
                   <textarea class="form-control form-value" id="content_0_video" name=""></textarea>
               <input type="hidden" class="form-type" name="" value="video">
                  </div>
</div>

<div class="d-none" id="break">
 <div class="mb-3 content-input">
                   <label for="content_0_video" class="form-label text-bg-secondary p-1 rounded-2 w-100">Новая секция</label>
   <input type="hidden" class="form-control" id="content_0_break" name="" value="">
            <input type="hidden" class="form-type" name="" value="break">   
</div>
</div>







<script>
    let contentJson = {{ Illuminate\Support\Js::from($post->content) }};
</script>
         <div class="content-items">
@error('content.*.*.*')
<p class="alert alert-danger">{{ $message }}</p>
@enderror

       {{-- {{$post->content}} --}}
            <div class="h2 text-bg-warning p-2 rounded-2 mb-3">Контент</div>
         </div>

               </div></section>
         <section>
   <div class="text">
         <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
         
      
                     </div></section>
                     </form>
         <section>
   <div class="text">
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