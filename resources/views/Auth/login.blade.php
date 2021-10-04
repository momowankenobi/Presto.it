<x-layout>

  <x-slot name='title'>Login</x-slot>

  <h1 class="text-center my-5 display-4">Login</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
    

            <form method="POST" action="{{route('login')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Indirizzo mail</label>
                  <input name="email" type="email" class="form-control" value="{{old('email')}}">
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary">Invia</button>
                <p class="mt-3">Non hai un account? <a href="{{route('register')}}">Registrati</a>
            </form>
        
        
            </div>

    </div>

</div>





</x-layout>