<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le bien</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier le bien</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('biens.update', $bien->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $bien->nom }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required>{{ $bien->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="{{ $bien->adresse }}" required>
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut" class="form-control" required>
                    <option value="1" {{ $bien->statut ? 'selected' : '' }}>Disponible</option>
                    <option value="0" {{ !$bien->statut ? 'selected' : '' }}>Occupé</option>
                </select>
            </div>
            <div class="form-group">
                <label for="surface">Surface (m²)</label>
                <input type="number" name="surface" class="form-control" value="{{ $bien->surface }}" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix (€)</label>
                <input type="number" name="prix" class="form-control" value="{{ $bien->prix }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                @if ($bien->image)
                    <div>
                        <img src="{{ asset('storage/blog/' . $bien->image) }}" alt="{{ $bien->nom }}" class="img-thumbnail" style="width: 150px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control mt-2" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
