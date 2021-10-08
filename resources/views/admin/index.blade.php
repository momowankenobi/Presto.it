@auth
<x-adminlayout>
  <x-slot name="title">Dashboard - Presto.it</x-slot>
    <div class="my-4">
      <h1>Dashboard</h1>
    </div>
    @if(Auth::user()->is_admin)
      <h2>Lista Utenti</h2>
      <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Utente</th>
            <th scope="col">Email</th>
            <th scope="col">Revisore</th>
            <th scope="col">Creazione Account</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              @if($user->is_admin)
                  <td>Amministratore</td>
              @elseif ($user->is_revisor)
                  <td>Revisore</td>
              @else
                  <td>Utente</td>
              @endif
              <td>{{$user->created_at}}</td>
          </tr>
          @endforeach    
        </tbody>
      </table>
      </div>
    @endif
    <h2>Lista Annunci</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo Annuncio</th>
            <th scope="col">Prezzo Annuncio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Creazione Annuncio</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($adds as $add)
          <tr>
              <td>{{$add->id}}</td>
              <td>{{$add->title}}</td>
              <td>{{$add->price}}</td>
              <td>{{$add->category->name}}</td>
              <td>{{$add->created_at}}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      </div>
</x-adminlayout>   
@endauth