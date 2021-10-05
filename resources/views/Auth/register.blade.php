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
            <div class="form-signin col-12 col-md-4">
                <form method="POST" action="{{route('register')}}">
                    @csrf
<<<<<<< HEAD

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
    
=======
                      <div class="form-floating mb-2">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Mario Rossi">
                        <label for="floatingInput">Nome e Cognome</label>
                      </div>
                      <div class="form-floating mb-2">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Indirizzo email</label>
                      </div>
                      <div class="form-floating mb-2">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
                      <div class="form-floating mb-2">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Conferma Password</label>
                      </div>
                      <button class="w-100 btn btn-lg btn-primary" type="submit">Registrati</button>
                      <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
                </form>
            </div>
>>>>>>> 30dd2dcb2fe434b5f5658c4dad744e0fc8a2e809
        </div>
    </div>
</x-layout>