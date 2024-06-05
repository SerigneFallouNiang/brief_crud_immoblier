{{-- popup ajoute pour biens --}}

<div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-xl font-bold text-gray-900 mb-5">Créer un bien</h1>
    <form action="{{ route('biens.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id"
                class="w-full p-2 border border-gray-300 rounded" rows="4" required>
                <option value="">Choisissez une catégorie</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border border-gray-300 rounded"
                rows="4" id="nom" required>
        </div>
        <div class="from-group">
            <label for="description" class="w-full p-2  border-gray-300 rounded"
                rows="4">Description</label>
            <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded" rows="4"
                placeholder="Votre description..." required></textarea>
        </div>
        <div class="form-group">
            <label for="adresse" class="w-full p-2  border-gray-300 rounded"
                rows="4">Adresse</label>
            <input type="text" name="adresse" class="w-full p-2 border border-gray-300 rounded"
                rows="4" id="adresse" required>
        </div>
        <div class="form-group">
            <label for="surface" class="w-full p-2 rounded" rows="4">Surface</label>
            <input type="number" name="surface" class="w-full p-2 border border-gray-300 rounded"
                rows="4" id="surface" required>
        </div>
        <div class="form-group">
            <label for="prix" class="w-full p-2  border-gray-300 rounded"
                rows="4">Prix</label>
            <input type="number" name="prix" class="w-full p-2 border border-gray-300 rounded"
                rows="4" id="prix" required>
        </div>
        <div class="mb-3">
            <label for="image" class="w-full p-2  border-gray-300 rounded" rows="4"
                class="form-label">Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded"
                rows="4" id="image">
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Envoyer</button>
            <button type="button" onclick="closePopup()"
                class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Annuler</button>
        </div>
    </form>

</div>
