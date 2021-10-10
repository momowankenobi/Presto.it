<x-layout>
    <x-slot name="title">Revisor</x-slot>
@if ($add)
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-8">
            @include('components.card')
            

        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
      
        <div class="col-6">
            <form method="POST" action="{{route('revisor.accept', with($add->id))}}" >
                @csrf
                <button class="btn btn-success" type="submit">Accetta</button>
            </form>
        </div>
        <div class="col-6">
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



</x-layout>