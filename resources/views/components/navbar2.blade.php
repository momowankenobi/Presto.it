<nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-beetween">
  <img src="public/img/Presto.png" alt="" class="logo">


  <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-el">
    <li class="nav-item">
      <a class="nav-link btn btn-newadd" href="{{route('articleNew')}}">Nuovo articolo</a>
    </li>
  </ul>

  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav-el">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">
        @auth
        Benvenuto, {{Auth::user()->name}}
        @else
        Area Personale
        @endauth
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
        @guest
        <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
        <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
        @else 
        <li><a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
      @endguest
    </ul>
  </li>  
  </ul>


</nav>