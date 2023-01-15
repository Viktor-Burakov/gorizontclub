@extends('layouts.main')
@section('content')
<section>
   <div class="text">
      <h1>Создать пост</h1>
      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif
      <form action="{{ route('post.store') }}" method="post" id="form">
         @csrf
         <div class="mb-5">
            <button type="submit" class="btn btn-primary h3">Сохранить</button>
            <button type="button" id="enter-data" class="btn btn-secondary h3">Заполнить ТЕСТ</button>
         </div>
         <div class="mb-5">
            <label for="title" class="h2 form-label text-bg-warning p-2 rounded-2">Title</label>
            <input type="text" class="form-control" id="title" name="title">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="url" class="h2 form-label text-bg-warning p-2 rounded-2">Url</label>
            <input type="text" class="form-control" id="url" name="url">
         </div>

         <div class="mb-5">
            <label for="H1" class="h2 form-label text-bg-warning p-2 rounded-2">H1 - заголовок</label>
            <input type="text" class="form-control" id="H1" name="H1">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <div><label for="category" class="h2 form-label text-bg-warning p-2 rounded-2">Рубрика</label></div>
            @foreach ($setting['categories'] as $id => $name)
            <input type="checkbox" class="btn-check" id="category-{{ $id }}" name="category-{{ $id }}" autocomplete="off">
            <label class="btn btn-outline-success m-1" for="category-{{ $id }}">{{ $id }} - {{ $name }}</label>
            @endforeach
         </div>

         <div class="mb-5">
            <label for="description" class="h2 form-label text-bg-warning p-2 rounded-2">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="keywords" class="h2 form-label text-bg-warning p-2 rounded-2">Keywords</label>
            <textarea class="form-control" id="keywords" name="keywords"></textarea>
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="date_start" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время начала</label>
            <input type="text" class="form-control" id="date_start" name="date_start" value="2023-06-15 09:00:00">
         </div>

         <div class="mb-5">
            <label for="date_end" class="h2 form-label text-bg-warning p-2 rounded-2">Дата и время окончания</label>
            <input type="text" class="form-control" id="date_end" name="date_end" value="2023-06-16 22:00:00">
         </div>

         <div class="mb-5">
            <label for="preview_text" class="h2 form-label text-bg-warning p-2 rounded-2">Анонс</label>
            <textarea class="form-control" id="preview_text" name="preview_text"></textarea>
            <div class=" form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="preview" class="h2 form-label text-bg-warning p-2 rounded-2">Картинка анонса</label>
            <input type="text" class="form-control" id="preview" name="preview">
            <div class="form-text">Мин размеры</div>
         </div>

         <div class="mb-5">
            <label for="preview_alt" class="h2 form-label text-bg-warning p-2 rounded-2">Img Alt - описание картинки</label>
            <input type="text" class="form-control" id="preview_alt" name="preview_alt">
            <div class="form-text">До стольки то символов</div>
         </div>

         <div class="mb-5">
            <label for="content" class="h2 form-label text-bg-warning p-2 rounded-2">Контент</label>
            <textarea class="form-control" id="content" name="content"></textarea>
            <div class="form-text">До стольки то символов</div>
         </div>
         <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
   </div>
</section>
@endsection