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
   <header>
      <div class="conteiner">
         <div class="row">
            <div class="col-2">
               <div class="social-icons">
                  <ul>
                     <li class="social-icons__icon">
                        <a href="https://vk.com/tourismclub72" rel="nofollow" title="В контакте">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 24 18">
                              <path class="st0" d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z" />
                           </svg>
                        </a>
                     </li>
                     <li class="social-icons__icon">
                        <a href="https://www.instagram.com/tourismclub72/" rel="nofollow" title="Instagram">
                           <svg xmlns=" http://www.w3.org/2000/svg" viewBox="-2 0 26 25">
                              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                           </svg>
                        </a>
                     </li>
                     <li class="social-icons__icon">
                        <a href="https://t.me/tourismclub72" rel="nofollow" title="Telegram">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 24 22" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                              <path id="telegram-1" d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z" />
                           </svg>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="phone">
                  Запись по телефону: <a href="tel:{{$setting['phoneUrl']}}">{!!$setting['phoneText']!!}</a>
               </div>
               <div class="logo">
                  <a href="{{$setting['siteUrl']}}">
                     <div class="logo__img"><img src="{{ asset('img/gorizont_logo.png') }}" title="{{$setting['siteName']}}" alt=""></div>
                     <div class="logo__title">Тюменский клуб туристов</div>
                  </a>
               </div>
            </div>
            <div class="col-2 col-nav">
               <nav>
                  <ul>
                     <li>
                        <a href="{{ route('main.index') }}">Главная</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Сплавы на байдарках</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Пешие походы</a>
                     </li>
                     <li>
                        <a class="active" href="{{ route('main.index') }}">Конные походы</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Каякинг</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Аренда снаряжения</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </header>
   <main>
      <div class="conteiner">
         <section>
            <div class="text">
               <h3><a href="{{ route('main.index') }}">Главная</a> <a href="{{ route('post.create') }}">Создать пост</a></h3>
            </div>
         </section>
         @yield('content')

         <section>
            <div class="img">
               <img src="{{ asset('img/header_bg.jpg') }}">
            </div>
            <div class="text">
               <h2>Расписание мероприятий</h2>


            </div>
         </section>
      </div>
   </main>
   <footer>
      <div class=" conteiner">
         <div class="row">
            <div class="col-4 logo">
               <a href="{{$setting['siteUrl']}}">
                  <div class="logo__img"><img src="{{ asset('img/gorizont_logo.png') }}" title="{{$setting['siteName']}}" alt=""></div>
                  <div class="logo__title">Тюменский клуб&nbsp;туристов</div>
               </a>
            </div>
            <div class="col-4 align-bottom">
               <nav>
                  <ul>
                     <li>
                        <a href="{{ route('main.index') }}">Главная</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Сплавы на байдарках</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Пешие походы</a>
                     </li>
                     <li>
                        <a class="active" href="{{ route('main.index') }}">Конные походы</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Каякинг</a>
                     </li>
                     <li>
                        <a href="{{ route('main.index') }}">Аренда снаряжения</a>
                     </li>
                  </ul>
               </nav>
            </div>
            <div class="col-4 align-bottom">
               <div class="phone">
                  Запись по телефону: <a href="tel:{{$setting['phoneUrl']}}">{!!$setting['phoneText']!!}</a>
               </div>
            </div>
            <div class="col-4 align-bottom">
               <div class="social-icons">
                  <ul class="float-right">
                     <li class="social-icons__icon">
                        <a href="https://vk.com/tourismclub72" rel="nofollow" title="В контакте">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 24 18">
                              <path class="st0" d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z" />
                           </svg>
                        </a>
                     </li>
                     <li class="social-icons__icon">
                        <a href="https://www.instagram.com/tourismclub72/" rel="nofollow" title="Instagram">
                           <svg xmlns=" http://www.w3.org/2000/svg" viewBox="-2 0 26 25">
                              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                           </svg>
                        </a>
                     </li>
                     <li class="social-icons__icon">
                        <a href="https://t.me/tourismclub72" rel="nofollow" title="Telegram">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 24 22" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                              <path id="telegram-1" d="M18.384,22.779c0.322,0.228 0.737,0.285 1.107,0.145c0.37,-0.141 0.642,-0.457 0.724,-0.84c0.869,-4.084 2.977,-14.421 3.768,-18.136c0.06,-0.28 -0.04,-0.571 -0.26,-0.758c-0.22,-0.187 -0.525,-0.241 -0.797,-0.14c-4.193,1.552 -17.106,6.397 -22.384,8.35c-0.335,0.124 -0.553,0.446 -0.542,0.799c0.012,0.354 0.25,0.661 0.593,0.764c2.367,0.708 5.474,1.693 5.474,1.693c0,0 1.452,4.385 2.209,6.615c0.095,0.28 0.314,0.5 0.603,0.576c0.288,0.075 0.596,-0.004 0.811,-0.207c1.216,-1.148 3.096,-2.923 3.096,-2.923c0,0 3.572,2.619 5.598,4.062Zm-11.01,-8.677l1.679,5.538l0.373,-3.507c0,0 6.487,-5.851 10.185,-9.186c0.108,-0.098 0.123,-0.262 0.033,-0.377c-0.089,-0.115 -0.253,-0.142 -0.376,-0.064c-4.286,2.737 -11.894,7.596 -11.894,7.596Z" />
                           </svg>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </footer>
</body>

</html>