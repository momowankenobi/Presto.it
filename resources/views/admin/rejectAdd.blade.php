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
            .slidecont{
                position: relative;
                height: 100%;
            }
            .swiper{
                width: auto;
                height: auto;
            }
            .swiper-slide{
                display: flex;
                justify-content: center;
                border-radius: 18px;
            }
        </style>
    </x-slot>
  @if (count($adds))
  {{-- <div class="container">
      <div class="row justify-content-center mt-3">
          <div class="d-flex justify-content-center">
            <div class="col-12 col-md-6 p-4">
                <div class="card-sl">
                    <div class="card-image">
                        @if (count($add->images))
                          <div class="swiper rounded">
                              <div class="swiper-wrapper">
                                @foreach ($add->images as $image)
                                    <div class="swiper-slide"><img src="{{$image->getUrl(300, 150)}}" style="width: 100%" class="" alt=""></div>
                                @endforeach      
                              </div>
                              <div class="swiper-pagination"></div>
                                
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
                        <p class="text-darker m-0">{{$add->description}}</p>
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
      <div class="row justify-content-center mt-2 mb-5">
          <div class="col-3 text-center">
              <form method="POST" action="{{route('revisor.back', with($add->id))}}" >
                  @csrf
                  <button class="btn btn-danger" type="submit">Revisiona</button>
              </form>
          </div>
      </div>
  </div> --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="swiper mySwiper rounded">
                <div class="swiper-wrapper">
                    @foreach ($adds as $add)
                      <div class="swiper-slide">
                          <div class="container">
                              <div class="row justify-content-center mt-3">
                                  <div class="d-flex justify-content-center">
                                    <div class="col-12 col-md-8 p-4">
                                        <div class="card-sl">
                                            <div class="card-image">
                                                @if (count($add->images))
                                                  <div class="swiper imageSwiper rounded">
                                                      <div class="swiper-wrapper">
                                                        @foreach ($add->images as $image)
                                                            <div class="swiper-slide"><img src="{{$image->getUrl(300, 150)}}" style="width: 100%" class="" alt=""></div>
                                                        @endforeach      
                                                      </div>
                                                      <div class="swiper-pagination"></div>
                                                      <div class="{{$add->category->color}} btnImagePrev swiper-button-prev"></div>
                                                      <div class="{{$add->category->color}} btnImageNext swiper-button-next"></div>
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
                                                            <p style="background-color: #000; font-size: 16px;" class="badge rounded-pill text-lighter">Adult</p>
                                                        @elseif($image->adult === 'VERY_UNLIKELY')
                                                            <p style="background-color: #0aff99; font-size: 16px;" class="badge rounded-pill text-darker">Adult</p>
                                                        @elseif($image->adult === 'UNLIKELY')
                                                            <p style="background-color: #caffbf; font-size: 16px;" class="badge rounded-pill text-darker">Adult</p>
                                                        @elseif($image->adult === 'POSSIBLE')
                                                            <p style="background-color: #ffee32; font-size: 16px;" class="badge rounded-pill text-darker">Adult</p>
                                                        @elseif($image->adult === 'LIKELY')
                                                            <p style="background-color: #ff8700; font-size: 16px;" class="badge rounded-pill text-darker">Adult</p>
                                                        @elseif($image->adult === 'VERY_LIKELY')
                                                            <p style="background-color: #ff0000; font-size: 16px;" class="badge rounded-pill text-darker">Adult</p>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        @if($image->spoof === 'UNKNOWN')
                                                            <p style="background-color: #000; font-size: 16px;" class="badge rounded-pill text-lighter">Spoof</p>
                                                        @elseif($image->spoof === 'VERY_UNLIKELY')
                                                            <p style="background-color: #0aff99; font-size: 16px;" class="badge rounded-pill text-darker">Spoof</p>
                                                        @elseif($image->spoof === 'UNLIKELY')
                                                            <p style="background-color: #caffbf; font-size: 16px;" class="badge rounded-pill text-darker">Spoof</p>
                                                        @elseif($image->spoof === 'POSSIBLE')
                                                            <p style="background-color: #ffee32; font-size: 16px;" class="badge rounded-pill text-darker">Spoof</p>
                                                        @elseif($image->spoof === 'LIKELY')
                                                            <p style="background-color: #ff8700; font-size: 16px;" class="badge rounded-pill text-darker">Spoof</p>
                                                        @elseif($image->spoof === 'VERY_LIKELY')
                                                            <p style="background-color: #ff0000; font-size: 16px;" class="badge rounded-pill text-darker">Spoof</p>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        @if($image->medical === 'UNKNOWN')
                                                            <p style="background-color: #000; font-size: 16px;" class="badge rounded-pill text-lighter">Medical</p>
                                                        @elseif($image->medical === 'VERY_UNLIKELY')
                                                            <p style="background-color: #0aff99; font-size: 16px;" class="badge rounded-pill text-darker">Medical</p>
                                                        @elseif($image->medical === 'UNLIKELY')
                                                            <p style="background-color: #caffbf; font-size: 16px;" class="badge rounded-pill text-darker">Medical</p>
                                                        @elseif($image->medical === 'POSSIBLE')
                                                            <p style="background-color: #ffee32; font-size: 16px;" class="badge rounded-pill text-darker">Medical</p>
                                                        @elseif($image->medical === 'LIKELY')
                                                            <p style="background-color: #ff8700; font-size: 16px;" class="badge rounded-pill text-darker">Medical</p>
                                                        @elseif($image->medical === 'VERY_LIKELY')
                                                            <p style="background-color: #ff0000; font-size: 16px;" class="badge rounded-pill text-darker">Medical</p>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        @if($image->violence === 'UNKNOWN')
                                                            <p style="background-color: #000; font-size: 16px;" class="badge rounded-pill text-lighter">Violence</p>
                                                        @elseif($image->violence === 'VERY_UNLIKELY')
                                                            <p style="background-color: #0aff99; font-size: 16px;" class="badge rounded-pill text-darker">Violence</p>
                                                        @elseif($image->violence === 'UNLIKELY')
                                                            <p style="background-color: #caffbf; font-size: 16px;" class="badge rounded-pill text-darker">Violence</p>
                                                        @elseif($image->violence === 'POSSIBLE')
                                                            <p style="background-color: #ffee32; font-size: 16px;" class="badge rounded-pill text-darker">Violence</p>
                                                        @elseif($image->violence === 'LIKELY')
                                                            <p style="background-color: #ff8700; font-size: 16px;" class="badge rounded-pill text-darker">Violence</p>
                                                        @elseif($image->violence === 'VERY_LIKELY')
                                                            <p style="background-color: #ff0000; font-size: 16px;" class="badge rounded-pill text-darker">Violence</p>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        @if($image->racy === 'UNKNOWN')
                                                            <p style="background-color: #000; font-size: 16px;" class="badge rounded-pill text-lighter">Racy</p>
                                                        @elseif($image->racy === 'VERY_UNLIKELY')
                                                            <p style="background-color: #0aff99; font-size: 16px;" class="badge rounded-pill text-darker">Racy</p>
                                                        @elseif($image->racy === 'UNLIKELY')
                                                            <p style="background-color: #caffbf; font-size: 16px;" class="badge rounded-pill text-darker">Racy</p>
                                                        @elseif($image->racy === 'POSSIBLE')
                                                            <p style="background-color: #ffee32; font-size: 16px;" class="badge rounded-pill text-darker">Racy</p>
                                                        @elseif($image->racy === 'LIKELY')
                                                            <p style="background-color: #ff8700; font-size: 16px;" class="badge rounded-pill text-darker">Racy</p>
                                                        @elseif($image->racy === 'VERY_LIKELY')
                                                            <p style="background-color: #ff0000; font-size: 16px;" class="badge rounded-pill text-darker">Racy</p>
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
                                                <p class="text-darker m-0">{{$add->description}}</p>
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
                              <div class="row justify-content-center mt-2 mb-5">
                                  <div class="col-3 text-center">
                                      <form method="POST" action="{{route('revisor.back', with($add->id))}}" >
                                          @csrf
                                          <button class="btn btn-danger" type="submit">Revisiona</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="text-lighter btnCardPrev swiper-button-prev"></div>
                <div class="text-lighter btnCardNext swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>


  {{-- <div class="container slidecont">
      <div class="row justify-content-center">
          <div class="col-10">
              <div class="mySwiper">
                  <div class="swiper-wrapper">
                      @foreach ($adds as $add)
                        <div class="swiper-slide">
                            <div class="container">
                                <div class="row justify-content-center mt-3">
                                    <div class="d-flex justify-content-center">
                                      <div class="col-12 col-md-8 p-4">
                                          <div class="card-sl">
                                              <div class="card-image">
                                                  @if (count($add->images))
                                                    <div class="swiper rounded">
                                                        <div class="swiper-wrapper">
                                                          @foreach ($add->images as $image)
                                                              <div class="swiper-slide"><img src="{{$image->getUrl(300, 150)}}" style="width: 100%" class="" alt=""></div>
                                                          @endforeach      
                                                        </div>
                                                        <div class="swiper-pagination"></div>
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
                                                  <p class="text-darker m-0">{{$add->description}}</p>
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
                                <div class="row justify-content-center mt-2 mb-5">
                                    <div class="col-3 text-center">
                                        <form method="POST" action="{{route('revisor.back', with($add->id))}}" >
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Revisiona</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
  @else
  <div class="container">
      <div class="row">
          <h2 class="text-center mt-5">Non ci sono annunci da revisionare</h2>
      </div>
  </div>

  @endif
</x-adminlayout>