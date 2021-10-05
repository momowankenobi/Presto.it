<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12 col-md-6">
                <img src="/img/discountsale.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-md-6">
                <div class="col-12">
                    <h1 class="text-center my-5 display-4" id="benvenuti">Presto.it</h1>
                </div>
                <div class="col-12">
                    <h2>Cosa stai cercando oggi?</h2>
                    <form action="">
                        <input style="width: 80%" type="text" placeholder="Trova annuncio">
                        <button type="submit">Cerca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center my-5">Benvenuto</h1>


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


   
   
   
   
   
   

    
    

</x-layout>