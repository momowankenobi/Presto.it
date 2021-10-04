<nav class="navbar navbar-expand-lg navbar-light bg-transparent" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a href="{{route('home')}}">
        <img src="../../../public/img/Presto.png" alt="">
      </a>
      <a class="navbar-brand" href="{{route('home')}}">Container XL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route('articleNew')}}">Nuovo articolo</a>
          </li>
        </ul>
        <div>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
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
        </div>
      </div>
    </div>
  </nav>
      
