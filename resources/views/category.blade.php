<x-layout>
    <x-slot name="title">{{$category->name}}</x-slot>
    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach ($adds as $add)
                @include('components.card')    
            @endforeach       
        </div>
    </div>


</x-layout>

