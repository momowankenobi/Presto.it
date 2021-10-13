<x-adminlayout>
    <x-slot name="title">Utenti Revisori - Presto.it</x-slot>
    <x-slot name="style">
        <style>
          *{
            color: white;
          }
        </style>
    </x-slot>
  @if(count($users))
      {{-- <div class="container">
          <div class="row justify-content-center mt-3">
              <div class="col-10 col-md-8">
                  <div class="card">
                      <div class="card-header text-dark fw-bold">{{$user->name}}</div>
                      <div class="card-body d-flex align-items-center justify-content-between text-dark">
                          <div>
                              <b class="fs-3">€{{$user->email}}</b>
                          </div>
                      </div>
                      <div class="card-footer text-darker d-flex justify-content-start">
                          <div class="ms-auto">
                              <i>{{$user->created_at->format('d/m/Y')}}</i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row justify-content-center mt-3">
              <div class="col-3">
                  <form method="POST" action="{{route('admin.accept', with($user->id))}}" >
                      @csrf
                      <button class="btn btn-success" type="submit">Accetta</button>
                  </form>
              </div>
              <div class="col-3 text-end">
                  <form method="POST" action="{{route('admin.reject', with($user->id))}}" >
                      @csrf
                      <button class="btn btn-danger" type="submit">Rifiuta</button>
                  </form>
              </div>
          </div>
      </div> --}}

      <div class="container">
        <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome Utente</th>
              <th scope="col">Email</th>
              <th scope="col">Rifiuta</th>
              <th scope="col">Accetta</th>
              <th scope="col">Creazione Account</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr >
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form method="POST" action="{{route('admin.reject', with($user->id))}}" >
                        @csrf
                        <button class="btn btn-danger" type="submit">Rifiuta</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('admin.accept', with($user->id))}}" >
                        @csrf
                        <button class="btn btn-success" type="submit">Accetta</button>
                    </form>
                </td>
                <td>{{$user->created_at}}</td>
            </tr>
            @endforeach    
          </tbody>
        </table>
    </div>
  </div>

  @else
      <h2 class="text-center mt-3">Non ci sono più utenti da assumere come revisori</h2>
  @endif
</x-adminlayout>