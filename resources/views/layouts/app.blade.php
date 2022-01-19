<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- for the sliders -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!--bootstrap 5.1-->

    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="Raleway" href="//fonts.google.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS only -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>
<body class="flex-wrapper myBg">
<div id="app" class="myContainer0 ">

    <!-- Header -->
    <nav class="myNav navbar navbar-expand-md align-items-center ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar navbar-expand-lg container-fluid">
            <div class="col-sm-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-fluid nav-logo"  src="{{asset('images/logo.png')}}" alt="ThisCounted Logo">
                </a>
            </div>
            <div class="col mt-auto mb-auto">
                <a href="https://t.me/ThisCounted" target="_blank" class="btn telegramBut MainButt"> join our channel</a>
                <a href="https://www.instagram.com/thiscounted/" target="_blank" class="btn instagramBut MainButt" > Instagram </a>
            </div>

            <!-- Search bar -->
            <div class="navbar-nav col mt-auto mb-auto">
                <form class="form-inline my-1 mt-auto">
                    <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-warning MainButt my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <!-- Authentication Links -->
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link  btn MainButt mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link btn MainButt" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a class="mt-2" href="{{route('favorite.show')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="red"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </a>

                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="font-weight-bold nav-link dropdown-toggle lead" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item  " href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item  " href="{{ route('user_dashboard') }}">
                                {{ __('User dashboard') }}
                            </a>
                            @if(Auth::id()<=3)
                                <a class="dropdown-item  " href="{{ route('admin_dashboard') }}">
                                    {{ __('Admin dashboard') }}
                                </a>
                                <a class="dropdown-item  " href="{{ route('deals.create') }}">
                                    {{ __('Create new deal') }}
                                </a>
                            @endif
                        </div>
                    </li>
            </ul>
            @endguest
        </div>
    </nav>
    <!-- END Header -->
    <main class="myContainer container py-5">
        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>

    <!-- FOOTER -->
    <div class="myFooter">
        <footer class="text-center text-start footer">
            <!-- Grid container -->
            <div class="container">
                <!-- Newsletter Subs -->
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <form action="">
                                <!--Grid row-->
                                <!--Grid column-->
                                <div>
                                    <p>
                                        <strong>Sign up for our newsletter</strong>
                                    </p>
                                </div>
                                <div>
                                    <div>
                                        <input type="email" class="form-control" placeholder="Email" />
                                        <button type="submit" class="btn MainButt">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Newsletter Subs -->

                        <!-- Logo&Rights -->
                        <div class="col">
                            <div class="navbar-brand">
                                <a  href="{{ url('/') }}">
                                    <img  src="{{asset('images/logo.png')}}" alt="ThisCounted Logo" width="70%" height="70%">
                                </a>
                                <div>
                                    <p>
                                        <strong>2022 ThisCounted. All rights reserved.
                                            <br>design by Avant Gaea
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END Logo&Rights -->

                        <div class="col mt-auto mb-auto">
                            <img src="https://img.icons8.com/fluency/48/000000/telegram-app.png"/>
                            <img src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/>
                            <img src="https://img.icons8.com/ios/50/000000/chat-message--v1.png"/>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
</html>
