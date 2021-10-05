<x-layout>
    <div class="col-10 col-md-8">
        <div class="card">
            <div class="card-header">{{$add->title}}</div>
            <div class="card-body">
                <p>
                    {{-- <img src="https://via.placeholder.com/300x150" class="" alt=""> --}}
                    <!-- Slider main container -->
                    <div class="swiper rounded float-end">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">Slide 1</div>
                        <div class="swiper-slide">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                        ...
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    
                        <!-- If we need scrollbar -->
                        <div class="swiper-scrollbar"></div>
                    </div>
                    {{$add->description}}
                </p>
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
    <x-slot name="script">
        <script>
            const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'vertical',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            });
        </script>
    </x-slot>
</x-layout>