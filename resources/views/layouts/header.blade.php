<nav class="myNav navbar navbar-expand-md align-items-center ">

    <div class="navbar container-fluid">

        <!-- Logo -->
        <div class="col-xs-6 col-sm-12 col-md-3 ms-lg-4 ms-sm-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="ms-5 float-lg-end" src="{{asset('images/logo.png')}}" alt="ThisCounted Logo" width="70%" height="70%">
            </a>
        </div>

        <!-- Social Links -->
        <div class="mt-auto col-lg-2 mb-auto col-3 col-md-1 ms-md-3 me-md-3" >
            <a href="https://t.me/ThisCounted" target="_blank" class="btn telegramBut MainButt ms-xl-3"> Join Telegram channel</a>
            <a href="https://www.instagram.com/thiscounted/" target="_blank" class="btn instagramBut MainButt mt-1 ms-xl-4" > Instagram </a>
        </div>

        <!-- Search bar -->
        <div class="navbar-nav col-md-4 col-lg-4 col-6 pe-lg-5"  style="display: inline">
            <form type="get" action="{{route('deals.search')}}" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn MainButt" type="submit">Search</button>
            </form>
        </div>
        <!-- END Search bar -->

        <!-- Authentication Links -->
        <div class="navbar-nav col-2 me-lg-4">
            @guest
                <li class="nav-item">
                    <a class="nav-link  btn MainButt mx-2 mt-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link btn MainButt mt-sm-1 mt-1 " href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                          <!-- Favorite icon -->
                <a class=" ms-3 mt-1 me-2" href="{{route('favorites.show')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24" width="30px" fill="red"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </a>
                             <!-- username-->
                <div class="nav-item" style="position:relative">
                    <a id="navbarDropdown" class=" btn MainButt font-weight-bold nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                        {{ Auth::user()->name }}
                    </a>
                            <!-- username drop list-->
                    <div class="dropdown-menu dropdown-menu-end" style="position:absolute;" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
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
                        @if(Auth::id()<=4)
                            <a class="dropdown-item  " href="{{ route('admin_dashboard') }}">
                                {{ __('Admin dashboard') }}
                            </a>
                            <a class="dropdown-item  " href="{{ route('deals.create') }}">
                                {{ __('Create new deal') }}
                            </a>
                        @endif
                    </div>
                    <!-- END username drop list-->
                </div>
        </div>
        @endguest
    <!-- END Authentication Links -->

    </div>
</nav>
