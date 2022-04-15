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
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-warning">Sign-up</button>
        </div>
      </div>
    </div>
  </header>
  
 