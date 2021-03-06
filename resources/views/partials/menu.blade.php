<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'ak14-blog') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" >
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button">
                        Категории <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @foreach(App\Categories::all() as $cat)
                            <li><a href={{route('categories',$cat->id)}}> {{$cat->title}}</a></li>
                        @endforeach
                    </ul>

                </li>
                <li><a href="#">Календарь</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Вход</a></li>
                    <li><a href="{{ url('/register') }}">Регистрация</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href={{url('profile')}}> Профиль</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    Выход
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
                    </ul>
                </div>
            </div>
        </nav>