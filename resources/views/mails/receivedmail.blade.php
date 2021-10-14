<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <h1 class="display-3">Sei stato contattato dal sig. {{$contatto['user']}}</h1>
    <p>Verifica la sua richiesta per essere revisore</p>
    <p>Ecco il riepilogo del suo messaggio: {{$contatto['message']}}</p>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>