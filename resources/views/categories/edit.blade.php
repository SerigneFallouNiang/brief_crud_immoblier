{{-- navbar --}}
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
                <h1 class="text-xl font-bold text-gray-900 mb-5">Créer une catégorie</h1>
                <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom" class="w-full p-2  border-gray-300 rounded">Nom</label>
                        <input type="text" name="nom" class="w-full p-2 border border-gray-300 rounded"
                            id="nom" value="{{ $categorie->nom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="w-full p-2  border-gray-300 rounded">Description</label>
                        <textarea name="description" class="w-full p-2 border border-gray-300 rounded" id="description"
                             rows="4">{{ $categorie->description }}</textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Envoyer</button>
                        <button type="button" onclick="closePopup()"
                            class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
