<?php
  $countadd = App\Models\Add::ToBeRevisionedCount();
  $countrev = App\Models\User::ToBeRevisionedCount();
  $counttot = $countadd + $countrev;
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
  <div class="container-xl">
    <a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo/croppedgreenlogow.png" class="img-fluid logo-nav" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample07XL">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li> --}}
          <li class="nav-item">
            <a class="nav-link text-light" href="{{route('articleNew')}}">Crea annuncio</a>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" data-bs-toggle="dropdown">Categorie</a>
          <ul class="dropdown-menu">
           @foreach ($categories as $category)
           <li>
            <a class="dropdown-item" href="{{route('public.adds.category', [
              $category->name,
              $category->id
          ])}}">{{$category->name}}</a>
           </li>
            @endforeach
          </ul>
        </li>
      </ul>
      <div>
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link text-light dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">
                  @auth
                      @if(Auth::user()->is_admin)
                        Benvenuto, {{Auth::user()->name}} <span class="badge badge-pill bg-danger"> {{$counttot}}</span>
                      @elseif(Auth::user()->is_revisor)
                        Benvenuto, {{Auth::user()->name}} <span class="badge badge-pill bg-danger"> {{$countadd}}</span>
                      @else                     
                        Benvenuto, {{Auth::user()->name}}
                      @endif
                  @else
                      Area Personale
                  @endauth
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                @guest
                  <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                  <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                @else
                @if(Auth::user()->is_admin)
                    <li><a class="dropdown-item" href="{{route('admin.index')}}">Pannello di controllo <span class="badge badge-pill bg-danger">{{$counttot}}</span></a></li>
                    @elseif(Auth::user()->is_revisor)
                    <li><a class="dropdown-item" href="{{route('admin.index')}}">Pannello di controllo <span class="badge badge-pill bg-danger">{{$countadd}}</span></a></li>
                    @endif
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
      </div>
    </div>
  </div>
</nav>
      
