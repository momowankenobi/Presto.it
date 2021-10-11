<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{$meta ?? ''}}
    <title>{{$title ?? ''}}</title>
    {{-- Swiper --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    {{$style ?? ''}}
</head>
<body>
    <x-navbar/>
    <div id="page-container">
        <div id="content-wrap bg-sec">
            {{$slot}}
        </div>
        <div id="footer">
            <x-footer/>
        </div>
    </div>
    {{-- Swiper JS --}}
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    {{$script ?? ''}}
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- js  bootstrap--}}
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>