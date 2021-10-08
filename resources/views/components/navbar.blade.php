<?php
  $countadd = App\Models\Add::ToBeRevisionedCount();
  $countrev = App\Models\User::ToBeRevisionedCount();
  $counttot = $countadd + $countrev;
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
  <div class="container-xl">
    <a class="navbar-brand" href="{{route('home')}}">
      <div class="logoDiv">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.37 423.426" enable-background="new 0 0 487.37 423.426" xml:space="preserve" role="img" aria-label="Red Triangle Vector">
            <g id="__id15_ssov0hhx">
                <path d="M483.181,385.631l0.002-0.006L261.219,12.169l-0.114-0.008C256.922,4.927,249.19,0,240.231,0   c-8.034,0-15.099,3.957-19.499,9.979l-0.062-0.002l-0.146,0.254c-0.815,1.148-1.504,2.379-2.112,3.663L4.081,385.785l0.003,0.006   C1.509,389.637,0,394.254,0,399.229c0,13.363,10.833,24.197,24.198,24.197h438.981c13.361,0,24.191-10.834,24.191-24.197   C487.37,394.186,485.821,389.508,483.181,385.631z" style="fill: #b2fdf8;"></path>
            </g>
        </svg>
      </div>
    </a>
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
      
