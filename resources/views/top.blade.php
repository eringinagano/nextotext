<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NextoText') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">-->
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/">
          {{ config('app.name', 'NextoText') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('textbook.index') }}">教科書一覧</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login',['provider' => 'line']) }}"><img src="../img/btn_login_base.png" class="line-btn"></a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('textbook.index') }}">教科書一覧</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('textbook.favorites') }}">気になる教科書</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/mylist">マイリスト</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('message.index') }}">チャット</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/profile/{{ Auth::user()->id }}">プロフィール</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    ログアウト
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                </form>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-success" href="{{ route('textbook.post') }}">出品</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      <div class="mainvisual">
        <div class="title-wrapper">
          <h2 class="main-title">NextoText</h2>
          <p>あなたの教科書を次の世代へ</p>
        </div>
      </div>
      <div class="about-wrapper">
        <h2 class="about-title">Concept</h2>
        <div class="text-wrapper">
          <p>
            日本において大学生が1年間に支払う授業料は私立大学の場合、約94万円と言われています。
            これはOECD加盟国の中でもアメリカ、オーストラリアに次ぐ金額です。これらに加え、
            日本の大学生は4年間に約30万円を教科書代として費やす必要があります。
            使い終えた教科書を次の世代にバトンとして渡すことで少しでも大学生の経済的負担を減らしたい。
            そんな思いでこのアプリを作成しました
          </p>
        </div>
        <a class="btn btn-outline-success about-btn" href="{{ route('textbook.index') }}">教科書一覧をみる</a>
      </div>
    </main>
  </div>
</body>
</html>