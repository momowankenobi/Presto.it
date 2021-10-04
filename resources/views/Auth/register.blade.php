<x-layout>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    <x-slot name='title'>Registrati</x-slot>

    <h1 class="text-center my-5 display-4">Registrati</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
        
    
                <form method="POST" action="{{route('register')}}">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome Utente</label>
                        <input name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Indirizzo mail</label>
                        <input name="email" type="email" class="form-control" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Invia</button>
                    <p class="mt-3">Hai già un account? <a href="{{route('login')}}">Accedi</a>
                    </p>
                    </form>
            
            
                </div>
    
        </div>
    
    </div>
    
    
    
    
    
    </x-layout>