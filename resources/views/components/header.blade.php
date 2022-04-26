  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{route('main')}}" class="nav-link px-2 @if(request()->routeIs('main')) text-secondary @else text-white @endif">Главная</a></li>
          <li><a href="{{route('news')}}" class="nav-link px-2 @if(request()->routeIs('news') || request()->routeIs('news.*')) text-secondary @else text-white @endif">Новости</a></li>
          <li><a href="{{route('cat')}}" class="nav-link px-2 @if(request()->routeIs('cat') || request()->routeIs('cat.*')) text-secondary @else text-white @endif">Категории</a></li>
          <li><a href="{{route('info')}}" class="nav-link px-2 @if(request()->routeIs('info')) text-secondary @else text-white @endif">О нас</a></li>
        </ul>


        <div class="text-end">
           @guest
                        @if (Route::has('login'))
                                <a href="{{ route('login') }}" type="button" class="btn btn-outline-light me-2">Войти</a>
                        @endif

                        @if (Route::has('register'))
                                <a href="{{ route('register') }}" type="button" class="btn btn-warning">Регистрация</a>
                        @endif
                        @else
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  @if(Auth::user()->is_admin)
                                   <a class="dropdown-item" href="{{ route('admin.index') }}">В админку</a>
                                   @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
             @endguest
        </div>
      </div>
    </div>
  </header>
  
