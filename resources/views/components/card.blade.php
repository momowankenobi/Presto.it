<div class="col-10 col-md-8">
    <div class="card">
        <div class="card-header">{{$add->title}}</div>
        <div class="card-body">
            <p>
                <img src="https://via.placeholder.com/300x150" class="rounded float-end" alt="">
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