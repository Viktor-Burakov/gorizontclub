@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <h1>Создать пост</h1>
      <form action="{{ route('post.store') }}" method="post" id="form">
         @csrf
         <div class="mb-5">
            <button type="submit" class="btn btn-primary h3">Сохранить</button>
            <button type="button" id="enter-data" class="btn btn-secondary h3">Заполнить ТЕСТ</button>
         </div>
         <div class="mb-5">
            <label for="title" class="h2 form-label text-bg-warning p-2 rounded-2">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            <div class="form-text">До стольки то символов</div>
            @error('title')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-5">
            <label for="url" class="h2 form-label text-bg-warning p-2 rounded-2">Url</label>
            <input type="text" class="form-control" id="url" name="url" value="{{old('url')}}">
            @error('url')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-5">
            <label for="H1" class="h2 form-label text-bg-warning p-2 rounded-2">H1 - заголовок</label>
            <input type="text" class="form-control" id="H1" name="H1" value="{{old('H1')}}">
            <div class="form-text">До стольки то символов</div>
            @error('H1')
               <p class="alert alert-danger">{{ $message }}</p>
            @enderror
         </div>

         <div class="mb-5">
            <div><label for="category" class="h2 form-label text-bg-warning p-2 rounded-2">Рубрика</label></div>
            @foreach ($categories as $category)
            <input type="checkbox" class="btn-check" id="category[{{ $category->id }}]" name="category[{{ $category->id }}]" autocomplete="off" value="{{old('title')}}">
            <label class="btn btn-outline-success m-1" for="category[{{ $category->id }}]">{{ $category->id }} - {{ $category->title }}</label>
            @endforeach
         </div>

         <div class="mb-5">
            <label for="description" class="h2 form-label text-bg-warning p-2 rounded-2">Description</label>
            <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="keywords" class="h2 form-label text-bg-warning p-2 rounded-2">Keywords</label>
            <textarea class="form-control" id="keywords" name="keywords">{{old('keywords')}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="date_start" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время начала</label>
            <input type="text" class="form-control" id="date_start" name="date_start" value="{{ old('date_start', '2023-06-15 09:00:00') }}">
         </div>

         <div class="mb-5">
            <label for="date_end" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время окончания</label>
            <input type="text" class="form-control" id="date_end" name="date_end" value="{{ old('date_start', '2023-06-16 22:00:00') }}">
         </div>

         <div class="mb-5">
            <label for="preview_text" class="h2 form-label text-bg-warning p-2 rounded-2">Анонс</label>
            <textarea class="form-control" id="preview_text" name="preview_text">{{old('preview_text')}}</textarea>
            <div class=" form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="preview" class="h2 form-label text-bg-warning p-2 rounded-2">Картинка анонса</label>
            <input type="text" class="form-control" id="preview" name="preview" value="{{old('preview')}}">
            <div class="form-text">Мин размеры</div>
         </div>

         <div class="mb-5">
            <label for="preview_alt" class="h2 form-label text-bg-warning p-2 rounded-2">Img Alt - описание картинки</label>
            <input type="text" class="form-control" id="preview_alt" name="preview_alt" value="{{old('preview_alt')}}">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="content" class="h2 form-label text-bg-warning p-2 rounded-2">Контент</label>
            <textarea class="form-control" id="content" name="content">{{old('content')}}</textarea>
            <div class="form-text">До стольки то символов</div>
         </div>
         <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
   </div>
</section>
@endsection