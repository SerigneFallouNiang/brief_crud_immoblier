@include('nav')
{{-- navbar --}}
@if (!Auth::user())
    <div class="row ml-96 container justify-center items-center center">
        <h1>
            Désolé, vous n'êtes pas autorisé à accéder à cette page </h1>
        <a href="{{ route('biens.index') }}">Retour</a>
    @else
        <div class="center justify-center mt-20  ml-96 pl-48 items-center">

            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('biens.update', $bien->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categorie_id">Catégorie</label>
                        <select name="categorie_id" id="categorie_id" class="w-full p-2 border border-gray-300 rounded"
                            rows="4" required>

                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="w-full p-2 border border-gray-300 rounded" value="{{ $bien->nom }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="w-full p-2  border-gray-300 rounded">Description</label>
                        <textarea name="description" class="w-full p-2 border border-gray-300 rounded" required>{{ $bien->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="adresse" >Adresse</label>
                        <input type="text" name="adresse" class="w-full p-2 border border-gray-300 rounded" value="{{ $bien->adresse }}" required>
                    </div>
                    <div class="form-group" >
                        <label for="statut">Statut</label>
                        <select name="statut" class="w-full p-2 border border-gray-300 rounded" required>
                            <option value="1" {{ $bien->statut ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ !$bien->statut ? 'selected' : '' }}>Occupé</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="surface" >Surface (m²)</label>
                        <input type="number" name="surface" class="w-full p-2 border border-gray-300 rounded" value="{{ $bien->surface }}"
                            required>
                    </div>
                    <div class="form-group" >
                        <label for="prix">Prix (€)</label>
                        <input type="number" name="prix" class="w-full p-2 border border-gray-300 rounded" value="{{ $bien->prix }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        @if ($bien->image)
                            <div>
                                <img src="{{ asset('storage/blog/' . $bien->image) }}" alt="{{ $bien->nom }}"
                                    class="img-thumbnail" style="width: 150px;">
                            </div>
                        @endif
                        <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded mt-2" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
