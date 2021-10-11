
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


    
<div class="col-12 col-sm-6 col-xl-4 p-4">
    <div class="card-sl">
        <div class="card-image">
            <img class="img-fluid" style="width: 100%" src="https://via.placeholder.com/300x150"/>
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
        <div class="ms-auto d-flex flex-column">
            <p class="m-0 text-muted text-end">{{$add->created_at->format('d/m/Y')}}</p>
            <p class="m-0">{{$add->user->name}}</p>
        </div>
        </div>
        <a href="{{route('add.show', compact('add'))}}" class="card-button {{$add->category->bgcolor}}">Scopri di più</a>
    </div>  
</div>
