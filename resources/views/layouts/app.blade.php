<!DOCTYPE html>
<html lang="ru-RU" prefix="og: https://ogp.me/ns#">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
   <title>@yield('title')</title>
   <meta name="description" content="@yield('description')">
   <meta name="keywords" content="@yield('keywords')">
   <link rel="canonical" href="{{$setting['url']}}">

   <meta property="og:locale" content="ru_RU">
   <meta property="og:type" content="article">
   <meta property="og:title" content="@yield('title')">
   <meta property="og:description" content="@yield('description')">
   <meta property="og:url" content="{{$setting['url']}}">
   <meta property="og:site_name" content="{{$setting['siteName']}}">
   <meta property="og:updated_time" content="{{$setting['updateTime']}}">
   <meta property="og:image" content="{{$setting['metaImage']}}">
   <meta property="og:image:secure_url" content="{{$setting['metaImage']}}">
   <meta property="og:image:width" content="{{$setting['metaImageWidth']}}">
   <meta property="og:image:height" content="{{$setting['metaImageHeight']}}">
   <meta property="og:image:alt" content="@yield('description')">
   <meta property="og:image:type" content="{{$setting['imageType']}}">
   <meta property="article:published_time" content="{{$setting['publishedTime']}}">
   <meta property="article:modified_time" content="{{$setting['updateTime']}}">
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="@yield('title')">
   <meta name="twitter:description" content="@yield('description')">
   <meta name="twitter:image" content="{{$setting['metaImage']}}">
   <meta name="twitter:label1" content="Автор">
   <meta name="twitter:data1" content="{{$setting['author']}}">
   <meta name="twitter:label2" content="Время чтения">
   <meta name="twitter:data2" content="Две минуты">

   <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
   <link type="image/png" sizes="120x120" rel="icon" href="/favicon-120x120.png">
   <link rel="manifest" href="/site.webmanifest">
   <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">
   <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">

   <link rel="dns-prefetch" href="//s.w.org">


   <script src="{{ asset('js/jquery-3.6.3.min.js') }}" type="text/javascript"></script>
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <script src="{{ asset('js/admin.js') }}" type="text/javascript"></script>
   <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

   <script src="{{ asset('js/js.js') }}" type="text/javascript"></script>
   <link rel="stylesheet" href="{{ asset('css/css.css') }}">


   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">


   <!--    
      <link rel="alternate" type="application/rss+xml" title="Тюменский клуб туристов &quot;Горизонт&quot; » Лента" href="https://gorizontclub.ru/feed/"> 
<link rel="alternate" type="application/rss+xml" title="Тюменский клуб туристов &quot;Горизонт&quot; » Лента комментариев к «Сплав по реке Щугор | Восхождение на гору Тельпос-из | 19.06 — 01.07.23»" href="https://gorizontclub.ru/splav-po-reke-shhugor/feed/">
-->



</head>

<body>


   @include("partials.header")

      <main>
         <div class="conteiner">
            <section>
               <div class="text">
                  <h3><a href="{{ route('main.index') }}">Главная</a> <a href="{{ route('post.create') }}">Создать пост</a></h3>
               </div>
            </section>
            @yield('content')

         </div>
      </main>
       @include("partials.footer")

   
</body>
</html>