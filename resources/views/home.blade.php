<x-layout>
    <x-slot name='title'>Home</x-slot>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {{-- Header e searchbar --}}
    <div class="container-fluid d-flex justify-content-center headContainer vh-75 bg-night">
        <div class="container">
            <div class="d-flex flex-column d-xl-flex align-items-center">
                <div class="d-xl-flex justify-content-center col-10">
                    <div class="col-12 col-xl-6">
                        <img src="/img/discountsale.png" class="img-fluid img-header" alt="">
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        {{-- <h1 class="text-center my-5 display-1 fw-bold text-blue" id="benvenuti">Presto.it</h1> --}}
                        <div class="col-12 d-flex justify-content-center">
                            <img src="/img/logo/croppedgreenlogow.png" class="img-fluid" style="width: 300px" alt="">
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <div class="mt-3" id="cover">
                                <form method="get" class="formSearch" action="{{route('search')}}">
                                    <div class="tb">
                                    <div class="td"><input class="buttonInput" name="q" type="text" placeholder="{{__('ui.search')}}" required></div>
                                    <div class="td" id="s-cover">
                                        <button class="buttonSearch" type="submit">
                                        <div id="s-circle"></div>
                                        <span class="buttonSpan"></span>
                                        </button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <div>
            <div class="wave wave1"></div>
            <div class="wave wave2"></div>
            <div class="wave wave3"></div>
            <div class="wave wave4"></div>
        </div>
    </div>

    {{-- Icone categorie --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="justify-content-evenly col-10 row bg-sec p-4 categoryList">
                @foreach ($categories as $category)
                <div class="col-4 my-2 my-xl-0 d-flex justify-content-center align-items-center col-xl-1 {{$category->color}}">
                    <a class="anchorCustom" href="{{route('public.adds.category', [$category->name, $category->id])}}">
                        <i class="{{$category->icon}}"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="container categorycontainer">
        <img src="https://unsplash.it/400/400" alt="" />
        <div class="overlay categoryoverlay">
          <span>Hello.</span>
        </div>
      </div> --}}

    {{-- annunci old --}}
    {{-- <div class="card-block" onclick="{{route('add.show', compact('add'))}}">
        <div class="image-block">
            <div class="image-block__wrapper">
                <img class="image-block__image" src="hhttps://via.placeholder.com/300x150Q" alt="">
            </div>
        </div>
        <div class="preview-block__content">
            <div class="block">
                <button class="btn">
                    <span>More</span>
                    <span>
                        <svg viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                    </span>
                </button>
                <h2 class="block__title">{{$add->title}}</h2>
                <h3 class="block__name">{{$add->price}}</h3>
            </div>
            <div class="block__tags">
                <strong class="text-darker block__tags-item">Categoria:&nbsp&nbsp
                    <a href="{{route('public.adds.category', [
                        $add->category->name,
                        $add->category->id
                        ])}}"> {{$add->category->name}}</a></strong>
                <div class="block__tags-item">moods</div>
            </div>
            <div class="page-actions">
                <button class="page-actions__button page-actions__button--prev">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                    </svg>
                </button>
                <button class="page-actions__button page-actions__button--chat">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <path d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z"></path>
                    </svg>
                </button>
                <button class="page-actions__button page-actions__button--like">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z"></path>
                    </svg>
                </button>
                <button class="page-actions__button page-actions__button--next">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                </button>
            </div>
        </div>
</div> --}}
   

    {{-- annunci --}}
    <div class="my-3 container">
        <div class="row justify-content-center">
            <h1 class="text-center display-4">{{__('ui.best')}}</h1>
        </div>
        <div class="row justify-content-center">
            @foreach ($adds as $add)
                @include('components.card')
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        {{ $adds->links() }}
    </div>

</x-layout>