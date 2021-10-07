<x-layout>
    <x-slot name="title">{{$category->name}}</x-slot>
    <div class="container mt-3">
        @if($adds)
        <div class="row justify-content-center">
            @foreach ($adds as $add)
                @include('components.card')    
            @endforeach       
        </div>
        @else
        <h3>No</h3>
        @endif
    </div>


</x-layout>

