<x-layout>
    <x-slot name="meta"><meta name="csrf-token" content="{{ csrf_token() }}"></x-slot>
    <x-slot name="title">Nuovo annuncio</x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="text-center my-5 display-4">Nuovo Annuncio</h1>
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="text-center">DEBUG :: SECRET {{$uniqueSecret}}</h3>
            <div class="col-12 col-md-4">
                <form method="POST" enctype="multipart/form-data" action="{{route('article.store')}}">
                    @csrf
                    <input 
                        type="hidden"
                        name="uniqueSecret"
                        value="{{$uniqueSecret}}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titolo</label>
                        <input name="title" type="text" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categorie</label>
                        <select name="category" style="width: 100%">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prezzo</label>
                        <input class="form-control" name="price" type="number" value="{{old('price')}}">
                    </div>
                    <div class="form mb-3">
                        <label class="form-label">Descrizione prodotto</label>
                        <textarea class="form-control" name="description" placeholder="Scrivi un articolo" rows="5">
                            {{old('description')}} 
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <div class="dropzone" id="drophere"></div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</x-layout>