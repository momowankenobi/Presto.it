<x-adminlayout>
    <x-slot name="title">Revisione annunci - Presto.it</x-slot>
    <x-slot name="style">
        <style>
            *{
                color: white;
            }
            .hiddenRow {
                padding: 0 !important;
            }
            .dot{
                height: 15px;
                width: 15px;
                border-radius: 50%;
            }
            .tagCard{
                padding: 5px 15px;
                border-radius: 20px;
                width: fit-content;
                box-shadow: 0px 0px 7px 0px #000000;
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
                        <div class="d-flex justify-content-around">
                            <div>
                                @if($image->adult === 'UNKNOWN')
                                    <p style="background-color: #000; font-size: 16px;" class="badge text-lighter">Adult</p>
                                @elseif($image->adult === 'VERY_UNLIKELY')
                                    <p style="background-color: #0aff99; font-size: 16px;" class="badge text-darker">Adult</p>
                                @elseif($image->adult === 'UNLIKELY')
                                    <p style="background-color: #caffbf; font-size: 16px;" class="badge text-darker">Adult</p>
                                @elseif($image->adult === 'POSSIBLE')
                                    <p style="background-color: #ffee32; font-size: 16px;" class="badge text-darker">Adult</p>
                                @elseif($image->adult === 'LIKELY')
                                    <p style="background-color: #ff8700; font-size: 16px;" class="badge text-darker">Adult</p>
                                @elseif($image->adult === 'VERY_LIKELY')
                                    <p style="background-color: #ff0000; font-size: 16px;" class="badge text-darker">Adult</p>
                                @endif
                            </div>
                            <div>
                                @if($image->spoof === 'UNKNOWN')
                                    <p style="background-color: #000; font-size: 16px;" class="badge text-lighter">Spoof</p>
                                @elseif($image->spoof === 'VERY_UNLIKELY')
                                    <p style="background-color: #0aff99; font-size: 16px;" class="badge text-darker">Spoof</p>
                                @elseif($image->spoof === 'UNLIKELY')
                                    <p style="background-color: #caffbf; font-size: 16px;" class="badge text-darker">Spoof</p>
                                @elseif($image->spoof === 'POSSIBLE')
                                    <p style="background-color: #ffee32; font-size: 16px;" class="badge text-darker">Spoof</p>
                                @elseif($image->spoof === 'LIKELY')
                                    <p style="background-color: #ff8700; font-size: 16px;" class="badge text-darker">Spoof</p>
                                @elseif($image->spoof === 'VERY_LIKELY')
                                    <p style="background-color: #ff0000; font-size: 16px;" class="badge text-darker">Spoof</p>
                                @endif
                            </div>
                            <div>
                                @if($image->medical === 'UNKNOWN')
                                    <p style="background-color: #000; font-size: 16px;" class="badge text-lighter">Medical</p>
                                @elseif($image->medical === 'VERY_UNLIKELY')
                                    <p style="background-color: #0aff99; font-size: 16px;" class="badge text-darker">Medical</p>
                                @elseif($image->medical === 'UNLIKELY')
                                    <p style="background-color: #caffbf; font-size: 16px;" class="badge text-darker">Medical</p>
                                @elseif($image->medical === 'POSSIBLE')
                                    <p style="background-color: #ffee32; font-size: 16px;" class="badge text-darker">Medical</p>
                                @elseif($image->medical === 'LIKELY')
                                    <p style="background-color: #ff8700; font-size: 16px;" class="badge text-darker">Medical</p>
                                @elseif($image->medical === 'VERY_LIKELY')
                                    <p style="background-color: #ff0000; font-size: 16px;" class="badge text-darker">Medical</p>
                                @endif
                            </div>
                            <div>
                                @if($image->violence === 'UNKNOWN')
                                    <p style="background-color: #000; font-size: 16px;" class="badge text-lighter">Violence</p>
                                @elseif($image->violence === 'VERY_UNLIKELY')
                                    <p style="background-color: #0aff99; font-size: 16px;" class="badge text-darker">Violence</p>
                                @elseif($image->violence === 'UNLIKELY')
                                    <p style="background-color: #caffbf; font-size: 16px;" class="badge text-darker">Violence</p>
                                @elseif($image->violence === 'POSSIBLE')
                                    <p style="background-color: #ffee32; font-size: 16px;" class="badge text-darker">Violence</p>
                                @elseif($image->violence === 'LIKELY')
                                    <p style="background-color: #ff8700; font-size: 16px;" class="badge text-darker">Violence</p>
                                @elseif($image->violence === 'VERY_LIKELY')
                                    <p style="background-color: #ff0000; font-size: 16px;" class="badge text-darker">Violence</p>
                                @endif
                            </div>
                            <div>
                                @if($image->racy === 'UNKNOWN')
                                    <p style="background-color: #000; font-size: 16px;" class="badge text-lighter">Racy</p>
                                @elseif($image->racy === 'VERY_UNLIKELY')
                                    <p style="background-color: #0aff99; font-size: 16px;" class="badge text-darker">Racy</p>
                                @elseif($image->racy === 'UNLIKELY')
                                    <p style="background-color: #caffbf; font-size: 16px;" class="badge text-darker">Racy</p>
                                @elseif($image->racy === 'POSSIBLE')
                                    <p style="background-color: #ffee32; font-size: 16px;" class="badge text-darker">Racy</p>
                                @elseif($image->racy === 'LIKELY')
                                    <p style="background-color: #ff8700; font-size: 16px;" class="badge text-darker">Racy</p>
                                @elseif($image->racy === 'VERY_LIKELY')
                                    <p style="background-color: #ff0000; font-size: 16px;" class="badge text-darker">Racy</p>
                                @endif
                            </div>
                        </div>
                        @if ($image->labels)
                            <div class="tagCard mb-3">
                                @foreach ($image->labels as $label)
                                    <span class="text-darker">{{$label}}</span>
                                @endforeach
                            </div>
                        @endif
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