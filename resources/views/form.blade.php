<x-layout>
    <x-slot name="meta"><meta name="csrf-token" content="{{ csrf_token() }}"></x-slot>
    <x-slot name="title">Nuovo annuncio</x-slot>
    <x-slot name="style">
        <style>
            body{
                background-color: #23395B !important;
            }
            .dropzone {
                min-height: 150px;
                border: 2px solid white;
                border-radius: 25px; 
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                background: #fff;
                padding: 20px 20px;
            }
            .mainCard{
                background-color: #fff;
                border-radius: 50px;
            }
            .formCard{
                height: 580px;
                border-radius: 50px;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                background: rgba(0, 0, 0, 0.9);
                padding: 0px 20px;
            }
            .formCard::before{
                content: '';
                height: 100%;
                width: 100%;
                border-radius: 50px;
                background-image: url('/img/snow.jpg');
                background-size: cover;
                position: absolute;
                top: 0px;
                right: 0px;
                bottom: 0px;
                left: 0px;
                opacity: 0.8;
            }
            .formText{
                z-index: 1;
            }
        </style>
    </x-slot>
    @if ($errors->any())
        <div class="d-flex justify-content-center">
            <div class="alert mt-2 text-light alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10 d-flex p-0 mainCard">
                <div class="col-5 formCard">
                    <div class="formText text-light">
                        <h1>Crea il tuo annuncio!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod sequi amet dolorem?</p>
                    </div>
                </div>
                <div class="col-7">
                    <div class="col-10 mx-auto mt-4">
                        <div>
                            <form method="POST" enctype="multipart/form-data" action="{{route('add.store')}}">
                                @csrf
                                <input 
                                    type="hidden"
                                    name="uniqueSecret"
                                    value="{{$uniqueSecret}}">
                                <div class="form-floating mb-3">
                                    <input style="border-radius: 25px" name="title" type="text" class="form-control" value="{{old('title')}}">
                                    <label class="form-label">Titolo</label>
                                </div>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div class="me-auto d-flex justify-content-between align-items-center">
                                        <label class="form-label mx-2 text-darker">Categorie</label>
                                        <select class="form-control" style="border-radius: 25px" name="category" style="width: 100%">
                                            <option value="">Seleziona una categoria</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="d-flex ms-auto justify-content-between align-items-center">
                                        <label class="text-darker mx-2 form-label">Prezzo</label>
                                        <input style="border-radius: 25px" class="form-control" name="price" type="number" value="{{old('price')}}">
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" style="height: auto" name="description" placeholder="Scrivi un articolo" rows="5">
                                        {{old('description')}} 
                                    </textarea>
                                    <label class="form-label">Descrizione prodotto</label>
                                </div>
                                <div class="mb-3">
                                    <div class="dropzone svelte-12uhhij dz-clickable" id="drophere">
                                        <div class="dz-message svelte-12uhhij">
                                            <h1><i class="fas fa-file-import"></i> Carica!</h1> 
                                            <p>Drag and drop files here</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn bg-night rounded-pill text-light">Invia</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>