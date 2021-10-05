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


    <div class="container">
        <div class="row justify-content-center">
            @foreach ($adds as $add)
            <div class="col-10 col-md-8">
                <div class="card">
                    <div class="card-header">{{$add->title}}</div>
                    <div class="card-body">
                        <p>
                            <img src="https://via.placeholder.com/300x150" class="rounded float-end" alt="">
                            {{$add->description}}
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <strong>Category: 
                            <a href="{{route('public.adds.category', [
                                $add->category->name,
                                $add->category->id
                            ])}}">{{$add->category->name}}</a>
                        </strong>
                        <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
                    </div>
                
                
                </div>
            </div>
                
            @endforeach
        </div>
    </div>


   
   
   
   
   
   

    
    

</x-layout>