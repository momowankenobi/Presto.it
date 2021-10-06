<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-slot name='title'>Nuovo Articolo</x-slot>
    <h1 class="text-center my-5 display-4">Nuovo Articolo</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{route('article.store')}}">
                    @csrf
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
                    <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
        </div>
    </div>
</x-layout>