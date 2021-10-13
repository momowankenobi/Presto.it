<?php
  $countadd = App\Models\Add::ToBeRevisionedCount();
  $countrev = App\Models\User::ToBeRevisionedCount();
  $counttot = $countadd + $countrev;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$add->title}} - Presto.it</title>
    {{-- Swiper --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container-fluid {{$add->category->bgcolor}}" style="position: absolute; height: 350px;"></div>
    <nav class="navbar sticky-top navbar-expand-lg" aria-label="Ninth navbar example">
        <div class="container-xl">
          <a class="navbar-brand" href="{{route('home')}}">
            <div class="logoDiv">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.37 423.426" enable-background="new 0 0 487.37 423.426" xml:space="preserve" role="img" aria-label="Red Triangle Vector">
                  <g id="__id15_ssov0hhx">
                      <path d="M483.181,385.631l0.002-0.006L261.219,12.169l-0.114-0.008C256.922,4.927,249.19,0,240.231,0   c-8.034,0-15.099,3.957-19.499,9.979l-0.062-0.002l-0.146,0.254c-0.815,1.148-1.504,2.379-2.112,3.663L4.081,385.785l0.003,0.006   C1.509,389.637,0,394.254,0,399.229c0,13.363,10.833,24.197,24.198,24.197h438.981c13.361,0,24.191-10.834,24.191-24.197   C487.37,394.186,485.821,389.508,483.181,385.631z" style="stroke: black; stroke-width: 5%; fill: {{$add->category->hexcolor}};"></path>
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
                  <a class="nav-link text-light" href="{{route('add.new')}}">Crea annuncio</a>
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
                  <li class="nav-item">
                    @include('components.locale', ['lang'=>'it', 'nation'=>'it'])
                  </li>
                  <li class="nav-item">
                    @include('components.locale', ['lang'=>'en', 'nation'=>'gb'])
                  </li>
                  <li class="nav-item">
                    @include('components.locale', ['lang'=>'es', 'nation'=>'es'])
                  </li>
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
    <div id="page-container">
        <div id="content-wrap">
                <div class="container-fluid headContainer">
                    <div class="row {{$add->category->bgcolor}}">
                        <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <h1 class="text-light">{{$add->category->name}}</h1>
                            <h3 class="text-light muted">by Presto.it</h3>
                        </div>
                        <div class="col-12 imgWaveHeader col-md-6">
                            <img style="height: 350px" src="/img/discountsale.png" class="img-fluid img-header" alt="">
                        </div>
                    </div>
                    <div>
                      <div class="wave wave1"></div>
                      <div class="wave wave2"></div>
                      <div class="wave wave3"></div>
                      <div class="wave wave4"></div>
                    </div>
                </div>
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mt-4">
                            <div class="card-sl">
                                <div class="card-image">
                                  @if (count($add->images))
                                    <div class="swiper rounded">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                        <!-- Slides -->
                                          @foreach ($add->images as $image)
                                              <div class="swiper-slide"><img src="{{$image->getUrl(300, 150)}}" style="width: 100%" class="" alt=""></div>
                                          @endforeach      
                                          {{-- @dd($add->images->getUrl(300,150)) --}}
                                        </div>
                                          <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>
                                          
                                          <!-- If we need navigation buttons -->
                                        <div class="{{$add->category->color}} swiper-button-prev"></div>
                                        <div class="{{$add->category->color}} swiper-button-next"></div>
                                    </div>
                                  @else
                                    <img src="https://via.placeholder.com/300x150" style="width: 100%" class="" alt="">
                                  @endif
                                </div>
                                <div class="card-heading">
                                    <a href="{{route('add.show', compact('add'))}}">{{$add->title}}</a>
                                </div>
                                <div class="card-text">
                                    <b class="fs-3">€{{$add->price}}</b>
                                    <p class="text-darker m-0">{{$add->description}}</p>
                                </div>
                                <div class="card-footer text-darker d-flex justify-content-start">
                                    <strong class="text-darker">Categoria:&nbsp&nbsp
                                        <a href="{{route('public.adds.category', [
                                            $add->category->name,
                                            $add->category->id
                                            ])}}"> {{$add->category->name}}</a></strong>
                                <div class="ms-auto d-flex flex-column">
                                    <p class="m-0 text-muted text-end">{{$add->created_at->format('d/m/Y')}}</p>
                                    <p class="m-0">{{$add->user->name}}</p>
                                </div>
                                </div>
                                <a href="{{URL::previous()}}" class="card-button {{$add->category->bgcolor}}">Torna indietro</a>
                            </div>
                        </div>  
                    </div>
                </div>
        </div>
        <div id="footer">
            <x-footer/>
        </div>
    </div>
    {{-- Swiper JS --}}
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    {{$script ?? ''}}
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- js  bootstrap--}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
