<x-adminlayout>
    <x-slot name="title">Cestino annunci - Presto.it</x-slot>
    <x-slot name="style">
        <style>
          *{
            color: white;
          }
          .hiddenRow {
                padding: 0 !important;
            }
        </style>
    </x-slot>
  @if ($add)
  <div class="container">
      <div class="row justify-content-center mt-3">
          <div class="d-flex justify-content-center">
            <div class="col-12 col-md-6 p-4">
                <div class="card-sl">
                    <div class="card-image">
                        @if (count($add->images))
                          <div class="swiper rounded">
                              <!-- Additional required wrapper -->
                              <div class="swiper-wrapper">
                              <!-- Slides -->
                                @foreach ($add->images as $image)
                                    <div class="swiper-slide"><img src="{{$image->getUrl(300, 150)}}" style="width: 100%" class="" alt=""></div>
                                @endforeach      
                                {{-- @dd($add->images->getUrl(300,150)) --}}
                              </div>
                                <!-- If we need pagination -->
                              <div class="swiper-pagination"></div>
                                
                                <!-- If we need navigation buttons -->
                              <div class="{{$add->category->color}} swiper-button-prev"></div>
                              <div class="{{$add->category->color}} swiper-button-next"></div>
                          </div>
                        @else
                          <img src="https://via.placeholder.com/300x150" style="width: 100%" class="" alt="">
                        @endif
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
                       <ul class="">
                           @if ($image->labels)
                             @foreach ($image->labels as $label)
                                <li class="text-darker">{{$label}}</li>
                             @endforeach
                           @endif
                       </ul>
                       @endforeach
                        <b class="fs-3 text-darker">€{{$add->price}}</b>
                    </div>
                    <div class="card-footer bg-sec text-darker d-flex justify-content-start">
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
          
          <div class="col-3 text-end mx-auto">
              <form method="POST" action="{{route('revisor.back', with($add->id))}}" >
                  @csrf
                  <button class="btn btn-danger" type="submit">Revisiona</button>
              </form>
          </div>
      </div>
  </div>
  
  {{-- <div class="container">
    <div class="table-responsive"> --}}
        {{-- <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome Utente</th>
              <th scope="col">Email</th>
              <th scope="col">Immagine</th>
              <th scope="col">Rifiuta</th>
              <th scope="col">Accetta</th>
              <th scope="col">Creazione Account</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($adds as $add)
            <tr>
                <td>{{$add->id}}</td>
                <td>{{$add->title}}</td>
                <td>{{$add->description}}</td>
                <td>
                    @foreach ($add->images as $item)
                        <img class="img-fluid" style="height: 50px" src="{{Storage::url($item->file)}}" alt="">
                    @endforeach
                </td>
                <td>
                    <form method="POST" action="{{route('revisor.reject', with($add->id))}}" >
                        @csrf
                        <button class="btn btn-danger" type="submit">Rifiuta</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{route('revisor.accept', with($add->id))}}" >
                        @csrf
                        <button class="btn btn-success" type="submit">Accetta</button>
                    </form>
                </td>
                <td>{{$add->created_at}}</td>
            </tr>
            @endforeach    
          </tbody>
        </table> --}}
        {{-- <table class="table table-hover" style="border-collapse: collapse;">
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
                    @foreach ($adds as $add)
                        <tr data-bs-toggle="collapse" data-bs-target="#collapseSection-{{$add->id}}">
                        <td>{{$add->id}}</td>
                        <td>{{$add->title}}</td>
                        <td>{{$add->description}}</td>
                        <td>
                            <form method="POST" action="{{route('revisor.reject', with($add->id))}}" >
                                @csrf
                                <button class="btn rounded-pill btn-danger" type="submit">Rifiuta</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('revisor.accept', with($add->id))}}" >
                                @csrf
                                <button class="btn rounded-pill btn-success" type="submit">Accetta</button>
                            </form>
                        </td>
                        <td>{{$add->created_at}}</td>
                    </tr>
                    <tbody>
                        @foreach ($add->images as $item)
                        <tr>
                            <td class="hiddenRow">
                                <div id="collapseSection-{{$add->id}}" class="accordion-collapse collapse">
                                    <div>
                                        <img class="img-fluid" style="height: 150px" src="{{Storage::url($item->file)}}" alt="">
                                    </div>
                                </div>
                            </td>
                            <td class="hiddenRow">
                                <div>
                                    <p>{{$add->description}}</p>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            @endforeach
            </tbody>
        </table>
    </div>
  </div>
<x-slot name="script">
    <script>
        $('.collapse').on('show.bs.collapse', function () {
            $('.collapse.in').collapse('hide');
        });
    </script>
</x-slot> --}}
  @else
  <div class="container">
      <div class="row">
          <h2 class="text-center mt-5">Non ci sono annunci da revisionare</h2>
      </div>
  </div>

  @endif
</x-adminlayout>