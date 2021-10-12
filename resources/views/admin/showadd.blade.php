<x-adminlayout>
    <x-slot name="title">Revisione annunci - Presto.it</x-slot>
    <x-slot name="style">
        <style>
          *{
            color: white;
          }
        </style>
    </x-slot>
  @if ($add)
  <div class="container">
      <div class="row justify-content-center mt-3">
          <div class="d-flex justify-content-center">
            <div class="col-12 col-md-6 col-xl-4 p-4">
                <div class="card-sl">
                    <div class="card-image">
                        <img class="img-fluid" style="width: 100%" src="https://via.placeholder.com/300x150"/>
                    </div>
                    <div class="card-heading">
                        <a href="{{route('add.show', compact('add'))}}">{{$add->title}}</a>
                    </div>
                    <div class="card-text">
                       @foreach ($add->images as $image)
                       Adult: {{  $image->adult  }} <br>
                       spoof: {{  $image->spoof  }} <br>
                       medical: {{  $image->medical  }} <br>
                       violence: {{  $image->violence  }} <br>
                       racy: {{  $image->racy  }} <br>                        
                       {{  $image->id  }} <br>
                       {{  $image->file  }} <br>
                       {{  Storage::url($image->file)  }}

                       <ul>
                           @if ($image->labels)
                             @foreach ($image->labels as $label)
                                <li>{{$label}}</li>
                             @endforeach
                           @endif
                       </ul>
                       @endforeach


                        <b class="fs-3">€{{$add->price}}</b>
                    </div>
                    <div class="card-footer text-darker d-flex justify-content-start">
                        <strong class="text-darker">Categoria:&nbsp&nbsp
                            <a href="{{route('public.adds.category', [
                                $add->category->name,
                                $add->category->id
                                ])}}"> {{$add->category->name}}</a></strong>
                    <div class="ms-auto d-flex flex-column">
                        <p class="m-0 text-muted text-end">{{$add->created_at->format('d/m/Y')}}</p>
                        <p class="m-0">{{$add->user->name}}</p>
                    </div>
                    </div>
                    <a href="{{route('add.show', compact('add'))}}" class="card-button {{$add->category->bgcolor}}">Scopri di più</a>
                </div>  
            </div>
          </div>
      </div>
      <div class="row justify-content-center my-5">
          <div class="col-3 ms-auto">
              <form method="POST" action="{{route('revisor.accept', with($add->id))}}" >
                  @csrf
                  <button class="btn btn-success" type="submit">Accetta</button>
              </form>
          </div>
          <div class="col-3 text-end me-auto">
              <form method="POST" action="{{route('revisor.reject', with($add->id))}}" >
                  @csrf
                  <button class="btn btn-danger" type="submit">Rifiuta</button>
              </form>
          </div>
      </div>
  </div>
  @else
  <div class="container">
      <div class="row">
          <h2 class="text-center mt-5">Non ci sono annunci da revisionare</h2>
      </div>
  </div>

  @endif
</x-adminlayout>