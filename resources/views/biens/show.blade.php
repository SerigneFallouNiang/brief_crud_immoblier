<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $bien->nom }}</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<style>
body { font-family: 'Roboto', sans-serif; background-color: #f4f4f4; }
.container { max-width: 1000px; }
h1 { color: #333; font-weight: 700; margin-bottom: 1rem; }
.property-image { border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
.property-info { background-color: white; padding: 2rem; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
.btn-primary { background-color: #007bff; border: none; transition: all 0.3s; }
.btn-primary:hover { background-color: #0056b3; }
.back-button { position: absolute; top: 20px; left: 20px; }
.comments-section { background-color: white; padding: 2rem; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-top: 2rem; }
.comment-item { background-color: #f8f9fa; border-radius: 5px; margin-bottom: 1rem; }
.comment-actions a { font-size: 0.9rem; }
.comment-form { background-color: #e9ecef; padding: 1.5rem; border-radius: 10px; }
</style>
</head>
<body>
<div class="container mt-5">
<a href="{{ route('biens.index') }}" class="btn btn-primary back-button">← Retour</a>
<div class="row">
<div class="col-md-6">
<img src="{{ asset('storage/blog/'.$bien->image )}}" alt="{{ $bien->nom }}" class="img-fluid property-image">
</div>
<div class="col-md-6">
<div class="property-info">
<h1>{{ $bien->nom }}</h1>
<p><strong>Description:</strong> {{ $bien->description }}</p>
<p><strong>Adresse:</strong> {{ $bien->adresse }}</p>
<p><strong>Statut:</strong> <span class="badge {{ $bien->statut ? 'badge-success' : 'badge-danger' }}">{{ $bien->statut ? 'Disponible' : 'Occupé' }}</span></p>
<p><strong>Surface:</strong> {{ $bien->surface }} m²</p>
<p><strong>Prix:</strong> <span class="h4">{{ number_format($bien->prix, 0, ',', ' ') }} €</span></p>
</div>
</div>
</div>

<section class="comments-section mt-5">
<h2>Commentaires</h2>
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
{{ Session::get('error') }}
</div>
@endif

<ul class="list-unstyled">
@foreach ($commentaires as $commentaire)
<li class="comment-item p-3 mb-3">
<div class="d-flex justify-content-between align-items-start">
<div>
<h5 class="mb-1">{{$commentaire->auteur}}</h5>
<p class="mb-1">{{$commentaire->contenu}}</p>
</div>
<div class="comment-actions">
<a onclick="return confirm('Confirmer la suppression')" href="/supprimer/{{$commentaire->id}}" class="text-danger mr-2">Supprimer</a>
<a href="/modifier/{{$commentaire->id}}" class="text-warning">Modifier</a>
</div>
</div>
</li>
@endforeach
</ul>

<div class="comment-form mt-4">
<h3>Ajouter un commentaire</h3>
<form action="{{route('commentaire')}}" method="post">
@csrf
<input type="hidden" name="bien_id" value="{{$bien->id}}">
<div class="mb-3">
<label for="auteur" class="form-label">Nom complet</label>
<input type="text" class="form-control" id="auteur" placeholder="Votre nom" name="auteur" required>
</div>
<div class="mb-3">
<label for="contenu" class="form-label">Contenu</label>
<textarea name="contenu" id="contenu" class="form-control" rows="4" placeholder="Votre commentaire..." required></textarea>
</div>
<div class="d-grid">
<button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
</div>
</form>
</div>
</section>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>