<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{Auth::user()->prenom}}</h1>

    <form action="{{route('deconnexion')}}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Déconnexion</button>

</form>
</body>
</html>
