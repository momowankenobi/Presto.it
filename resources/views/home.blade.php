<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

        <div class="container-fluid home-header justify-content-center">
            <div class="row justify-content-center welcome">
                <div class="col-12 col-md-6 content">
                    <h1 class="text-center my-5 display-4" id="benvenuti">Benvenuto/a, </h1>
                    <h2>Cosa stai cercando oggi?</h2>
                    <form action="">
                        <input type="text" placeholder="Trova annuncio">
                        <button type="submit">Cerca</button>
                    </form>
                </div>
            </div>
        </div>


</x-layout>