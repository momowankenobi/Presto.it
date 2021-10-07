<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="container-fluid vh-75 bg-main">
        <div class="row justify-content-center">
            <div class="d-md-flex col-10">
                <div class="col-12 col-md-6">
                    <img src="/img/discountsale.png" class="img-fluid img-header" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        {{-- <h1 class="text-center my-5 display-1 fw-bold text-blue" id="benvenuti">Presto.it</h1> --}}
                        <div class="col-12 d-flex justify-content-center">
                            <img src="/img/logo/croppedredlogo.png" class="img-fluid" style="width: 300px" alt="">
                        </div>
                        <div class="col-12">
                            <div class="searchContain">
                                <div class="mt-3" id="cover">
                                    <form method="get" class="formSearch" action="{{route('search')}}">
                                      <div class="tb">
                                        <div class="td"><input class="buttonInput" name="q" type="text" placeholder="Cosa stai cercando oggi?" required></div>
                                        <div class="td" id="s-cover">
                                          <button class="buttonSearch" type="submit">
                                            <div id="s-circle"></div>
                                            <span class="buttonSpan"></span>
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
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="justify-content-evenly col-10 row bg-sec p-4 categoryList">
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-darker">
                    <i class="fas fa-car fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-danger">
                    <i class="fas fa-laptop-code fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-warning">
                    <i class="fas fa-blender fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-info">
                    <i class="fas fa-book fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-main">
                    <i class="fas fa-gamepad fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-blue">
                    <i class="fas fa-basketball-ball fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-red">
                    <i class="fas fa-house-user fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-accent">
                    <i class="fas fa-mobile-alt fa-5x"></i>
                </div>
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 text-success">
                    <i class="fas fa-chair fa-5x"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
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
    <div class="d-flex justify-content-center align-items-center">
        {{ $adds->links() }}
    </div>

</x-layout>