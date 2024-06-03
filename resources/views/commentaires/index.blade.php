<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Detail</h1>
<div class="container"><div class="row"></div></div>
<ul class="list-group">
    @foreach ($commentaires as $commentaire)
 
    <li class="list-group-item">{{$commentaire->auteur}}</li>
    <li class="list-group-item">{{$commentaire->contenu}}</li>
    @endforeach
  </ul>
  <form action="{{route('commentaire')}}" method="post">
    @csrf

<div class="mb-3">
<label for="auteur" class="form-label">Nom complet</label>
<input type="text" class="form-control" id="auteur" placeholder="auteur" name="auteur">
</div>
<div class="mb-3">
<label for="prenom" class="form-label">Contenue</label>
<textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
</div>

<div class="d-grid">
<button class="btn btn-primary">S'incrire</button>
</div>
</form> 
