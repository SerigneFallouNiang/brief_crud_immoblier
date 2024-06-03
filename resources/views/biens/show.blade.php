<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $bien->nom }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <div class="container mt-5">
        <div> <button  class="btn-primary"><a href="{{ route("biens.index") }}"></a></button></div>
        <h1>{{ $bien->nom }}</h1>
        <img src="{{ asset('storage/blog/'.$bien->image )}}" alt="{{ $bien->nom }}" class="img-fluid">
        <p><strong>Description:</strong> {{ $bien->description }}</p>
        <p><strong>Adresse:</strong> {{ $bien->adresse }}</p>
        <p><strong>Statut:</strong> {{ $bien->statut ? 'Disponible' : 'Occupé' }}</p>
        <p><strong>Surface:</strong> {{ $bien->surface }} m²</p>
        <p><strong>Prix:</strong> {{ $bien->prix }} €</p>
        <a href="{{ route('biens.index') }}" class="btn btn-primary">Retour à la liste des biens</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
