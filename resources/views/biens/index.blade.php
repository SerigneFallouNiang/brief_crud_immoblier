<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des biens</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des biens</h1>
        <a href="{{ route('biens.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau bien</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Statut</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($biens as $bien)
                <tr>
                    <td>{{ $bien->nom }}</td>
                    <td>        <img src="{{ asset('storage/blog/'.$bien->image )}}" alt="{{ $bien->nom }}" width="50" class="img-fluid">
                    </td>
                    {{-- <td><img src="{{ $bien->image }}" alt="{{ $bien->nom }}" width="100" class="img-fluid"></td> --}}
                    <td>{{ $bien->description }}</td>
                    <td>{{ $bien->adresse }}</td>
                    <td>{{ $bien->statut ? 'Disponible' : 'Occupé' }}</td>
                    <td>{{ $bien->surface }} m²</td>
                    <td>{{ $bien->prix }} Cfa</td>
                    @auth


                    <td>
                        <a href="{{ url('biens/' . $bien->id . '/edit') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Modifier</a>

                        <a href="{{ url('biens/show/'. $bien->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('biens.destroy', $bien->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                    
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
