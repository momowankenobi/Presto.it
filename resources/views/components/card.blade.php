
    {{-- <div class="card" style="width: 100%" onclick="{{route('add.show', compact('add'))}}">
        <div class="card-header text-sec bg-red fw-bold">{{$add->title}}</div>
        <div class="card-body d-flex align-items-center justify-content-between text-dark">
            <div>
                <b class="fs-3">€{{$add->price}}</b>
            </div>
            <div class="">
                <img src="https://via.placeholder.com/300x150" class="rounded float-end" alt="">
            </div>
        </div>
        <div class="card-footer text-darker d-flex justify-content-start">
                <strong class="text-darker">Categoria:&nbsp&nbsp
                    <a href="{{route('public.adds.category', [
                        $add->category->name,
                        $add->category->id
                        ])}}"> {{$add->category->name}}</a></strong>
            <div class="ms-auto">
                <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
            </div>
        </div>
    </div> --}}


    
<div class="col-12 col-md-6 col-xl-4 p-4">
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
