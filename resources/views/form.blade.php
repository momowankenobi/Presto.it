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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center">
        
    
                <form method="POST" action="{{route('article.store')}}">
                    @csrf

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Titolo</label>
                        <input name="title" type="text" class="form-control" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categorie</label>
                        <select name="category">
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <p>Descrizione</p>
                        <textarea name="description" cols="100" rows="10" placeholder="Inserisci qui il tuo articolo">
                            {{old('description')}}
                        </textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Invia</button>
                
                    </form>
            
            
                </div>
    
        </div>
    
    </div>
    
    
    
    
    
    </x-layout>