<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="container-fluid d-flex justify-content-center bg-main vh-65">
        <div class="row vh-65 vw-50 justify-content-center">
            <div class="d-flex col-10 align-items-center">
                <div class="col-12 col-md-6">
                    <img src="/img/discountsale.png" class="img-fluid img-header" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                        {{-- <h1 class="text-center my-5 display-1 fw-bold text-blue" id="benvenuti">Presto.it</h1> --}}
                        <img src="/img/logo_blue_nobg.png" class="img-fluid logo-header" alt="">
                        <div>
                            {{-- <form action="">
                                <input class="label-head" style="width: 80%" type="text" placeholder="Trova annuncio">
                                <button type="submit">Cerca</button>
                            </form> --}}
                            <div class="mt-2" id="cover">
                                <form method="get" action="">
                                  <div class="tb">
                                    <div class="td"><input type="text" placeholder="Cosa stai cercando oggi?" required></div>
                                    <div class="td" id="s-cover">
                                      <button type="submit">
                                        <div id="s-circle"></div>
                                        <span></span>
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                        </div>
                </div>    
            </div>
        </div>
    </div>

    <div class="container bg-sec py-4 categoryList">
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-1 text-darker">
                <i class="fas fa-car fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-danger">
                <i class="fas fa-laptop-code fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-warning">
                <i class="fas fa-blender fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-info">
                <i class="fas fa-book fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-main">
                <i class="fas fa-gamepad fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-blue">
                <i class="fas fa-basketball-ball fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-red">
                <i class="fas fa-house-user fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-accent">
                <i class="fas fa-mobile-alt fa-5x"></i>
            </div>
            <div class="col-12 col-md-1 text-success">
                <i class="fas fa-chair fa-5x"></i>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach ($adds as $add)
                <div class="my-3 d-flex justify-content-center">
                    <a href="{{route('add.show', compact('add'))}}">
                        @include('components.card')
                    </a>
                </div>
            @endforeach
        </div>
    </div>


</x-layout>