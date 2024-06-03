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
    @foreach ($commentaires as $commentaire)
 
    <li class="list-group-item"></li>
    <li class="list-group-item"></li>
    @endforeach
  </ul>
  <ol class="list-group list-group-numbered">
    @foreach ($commentaires as $commentaire)

    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2 me-auto">
        <div class="fw-bold">Subheading</div>
        <p>{{$commentaire->contenu}}</p>
      </div>
      <div>
     <p><a onclick="return confirm('Confirmer la suppression')"  href="/supprimer/{{$commentaire->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Suprimer</a>  </p>
        <p><a href="#" class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Modifier</a></p>
</div>
    </li>
    @endforeach

  </ol>


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
<button class="btn btn-primary">Enregistrer</button>
</div>
</form> 
</div>
</div>