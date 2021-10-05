<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
 {{-- <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1 class="text-center my-5 display-4" id="benvenuti">Benvenuto/a, </h1>
                <h2>Cosa stai cercando oggi?</h2>
                <form action="">
                    <input type="text" placeholder="Trova annuncio">
                    <button type="submit">Cerca</button>
                </form>

            </div>
        </div>
    </div> --}}

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