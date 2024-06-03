<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Commentaire</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Detail</h1>
<div class="container"><div class="row">
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('error') }}
</div>
 @endif
    
 

  <form action="/modifier/traitement/" method="post">
    @csrf
<input type="text" name="id" style="display: none;"  value="{{$commentaires->id}}">

<div class="mb-3">
<label for="auteur" class="form-label">Nom complet</label>
<input type="text" class="form-control" id="auteur" placeholder="auteur" name="auteur" value="{{$commentaires->auteur}}">
</div>
<div class="mb-3">
<label for="prenom" class="form-label">Contenue</label>
<textarea name="contenu" id="contenu" cols="30" rows="10">{{$commentaires->contenu}}</textarea>
</div>

<div class="d-grid">
<button class="btn btn-primary">Modifier</button>
</div>
</form> 
</div>
</div>