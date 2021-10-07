<x-layout>
    <x-slot name="title">{{$add->title}} - Presto.it</x-slot>
    {{-- <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card">
                    <div class="card-header">{{$add->title}}</div>
                    <div class="card-body d-flex  align-items-center justify-content-between">
                        <div class="d-flex-column pe-3">
                            <div>
                                {{$add->description}}
                            </div>
                            <div>
                                <b>€{{$add->price}}</b>
                            </div>
                            <div class="text-end">
                                <a href="{{route('home')}}" class="btn btn-primary">Torna alla home</a>
                            </div>
                        </div>
                        <div>
                            <!-- Slider main container -->
                            <div class="swiper rounded float-end">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide"><img src="https://picsum.photos/300/150" class="" alt=""></div>
                                <div class="swiper-slide"><img src="https://picsum.photos/300/150" class="" alt=""></div>
                                <div class="swiper-slide"><img src="https://picsum.photos/300/150" class="" alt=""></div>
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <strong>Category: 
                            <a href="{{route('public.adds.category', [
                                $add->category->name,
                                $add->category->id
                                ])}}">{{$add->category->name}}</a>
                        </strong>
                        <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container py-5">
        <div class="row justify-content-center">
            <h1 class="text-center display-4">Il miglior sito di annunci!</h1>
            <div class="col-md-6">
                <div class="card-sl">
                    <div class="swiper rounded">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide"><img src="https://picsum.photos/900/450" class="" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/900/450" class="" alt=""></div>
                        <div class="swiper-slide"><img src="https://picsum.photos/900/450" class="" alt=""></div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="card-heading">
                        <a href="{{route('add.show', compact('add'))}}">{{$add->title}}</a>
                    </div>
                    <div>
                        {{$add->description}}
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
                        <div class="ms-auto">
                            <i>{{$add->created_at->format('d/m/Y')}} - {{$add->user->name}}</i>
                        </div>
                    </div>
                    <a href="{{route('home')}}" class="card-button">Torna alla Home</a>
                </div> 
        </div>
         
        </div>
    </div>

    <x-slot name="script">
        <script>
            const swiper = new Swiper('.swiper', {
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            });
        </script>
    </x-slot>
</x-layout>