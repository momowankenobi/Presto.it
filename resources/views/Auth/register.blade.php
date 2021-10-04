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
        </div>
    </div>
</x-layout>