<div class="col-12 d-flex justify-content-center mt-5">
    {{-- <div class="card" style="width: 100%" onclick="{{route('add.show', compact('add'))}}">
        <div class="card-header text-sec bg-red fw-bold">{{$add->title}}</div>
        <div class="card-body d-flex align-items-center justify-content-between text-dark">
            <div>
                <b class="fs-3">€{{$add->price}}</b>
            </div>
            <div class="">
                <img src="https://via.placeholder.com/300x150" class="rounded float-end" alt="">
            </div>
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
    </div> --}}


    
            <div class="col-md-6">
                <div class="card-sl">
                    <div class="card-image">
                        <img class="img-fluid"
                            src="https://via.placeholder.com/900x450" />
                    </div>

                    
                    <div class="card-heading">
                        <a href="{{route('add.show', compact('add'))}}">{{$add->title}}</a>
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
                    <a href="{{route('add.show', compact('add'))}}" class="card-button">Scopri di più</a>
                </div>  
            </div>
        </div>