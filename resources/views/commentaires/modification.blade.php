<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<title>Modifier le commentaire</title>
<style>
body { font-family: 'Inter', sans-serif; background-color: #f0f2f5; }
.container { max-width: 800px; }
.card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
.card-header { background-color: #4a5568; color: white; border-top-left-radius: 15px; border-top-right-radius: 15px; }
h1 { font-size: 1.5rem; font-weight: 600; }
label { font-weight: 500; color: #2d3748; }
textarea { resize: none; border-color: #cbd5e0; }
textarea:focus { box-shadow: 0 0 0 0.25rem rgba(74, 85, 104, 0.25); }
.btn-primary { background-color: #4a5568; border-color: #4a5568; font-weight: 500; }
.btn-primary:hover, .btn-primary:focus { background-color: #2d3748; border-color: #2d3748; }
.btn-secondary { color: #4a5568; background-color: white; border-color: #4a5568; font-weight: 500; }
.btn-secondary:hover { color: white; background-color: #4a5568; border-color: #4a5568; }
.alert-danger { border-left: 4px solid #e53e3e; }
</style>
</head>
<body>
<div class="container mt-5">
<div class="card">
<div class="card-header p-4">
<h1 class="mb-0"><i class="fas fa-edit"></i> Modifier le commentaire</h1>
</div>
<div class="card-body p-4">
@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
<i class="fas fa-exclamation-triangle"></i> {{ Session::get('error') }}
</div>
@endif

<form action="/modifier/traitement/" method="post">
@csrf
<input type="hidden" name="id" value="{{$commentaires->id}}">
<div class="mb-4">
<label for="auteur" class="form-label">Nom complet</label>
<input type="text" class="form-control form-control-lg" id="auteur" placeholder="Votre nom" name="auteur" value="{{$commentaires->auteur}}" required>
</div>
<div class="mb-4">
<label for="contenu" class="form-label">Contenu</label>
<textarea name="contenu" id="contenu" class="form-control form-control-lg" rows="6" placeholder="Votre commentaire..." required>{{$commentaires->contenu}}</textarea>
</div>
<input type="hidden" name="bien_id" value="{{$commentaires->bien_id}}">
<div class="d-flex justify-content-between">
<a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left"></i> Retour</a>
<button type="submit" class="btn btn-primary btn-lg">Modifier <i class="fas fa-check"></i></button>
</div>
</form>
</div>
</div>

<div class="text-center mt-4 text-muted">
<p>Ce commentaire sera visible par tous les utilisateurs. Veuillez rester respectueux.</p>
</div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>