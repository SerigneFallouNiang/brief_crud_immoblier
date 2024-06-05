<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $bien->nom }}</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
}
.property-image {
    border-radius: 10px;
    transition: transform 0.3s;
}
.property-image:hover {
    transform: scale(1.05);
}
.popup-form {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
.popup-form.active {
    display: flex;
}
</style>
</head>
<body>
    <header class="bg-white shadow-md pb-16  ">
        <div class="container mx-auto bg-white  fixed bg-fixed z-50 flex justify-between px-36 items-center py-4">
            <a href="#" class="text-3xl font-bold text-gray-800">Mon Blog Immobilier</a>
            <nav>
                <ul class="flex space-x-4">
                    @auth
                    <li>
                        <button onclick="openPopup()"
                        class="  text-blue-500 px-4 py-2 rounded hover:text-white hover:bg-blue-700">Ajouter un nouveau
                        bien</button>
                        <a href="{{ route('categories.index') }}" class=" text-blue-500 hover:text-white  px-4 py-2 rounded hover:bg-blue-700">Categories</a>
                    </li>
                    <li>

                            <form action="{{ route('deconnexion') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger  text-red-600 px-4 py-2 rounded hover:text-white hover:bg-red-700" border-t-neutral-400 text-"
                                    type="submit">Déconnexion</button>
                            </form>

                    </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
<div class="container mx-auto  mt-5">
    <a href="{{ route('biens.index') }}" class="text-blue-500 hover:text-blue-700 mb-5">← Retour</a>
    <div class="grid grid-cols-1 container md:grid-cols-4 gap-20 mx-9   ">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/blog/'.$bien->image )}}" alt="{{ $bien->nom }}" class="w-full h-80 object-cover property-image">
        </div>
        <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-900">{{ $bien->nom }}</h1>
            <p class="text-gray-700 mt-4"><strong>Description:</strong> {{ $bien->description }}</p>
            <p class="text-gray-700 mt-2"><strong>Adresse:</strong> {{ $bien->adresse }}</p>
            <p class="text-gray-700 mt-2">
                <strong>Statut:</strong>
                <span class="inline-block px-2 py-1 text-sm font-semibold leading-none text-white rounded {{ $bien->statut ? 'bg-green-500' : 'bg-red-500' }}">
                    {{ $bien->statut ? 'Disponible' : 'Occupé' }}
                </span>
            </p>
            <p class="text-gray-700 mt-2"><strong>Surface:</strong> {{ $bien->surface }} m²</p>
            <p class="text-gray-700 mt-2"><strong>Prix:</strong> <span class="text-xl font-bold">{{ number_format($bien->prix, 0, ',', ' ') }} XOF</span></p>
            <p class="text-gray-700 mt-2"><strong>Catégorie:</strong> <span class="inline-block px-2 py-1 text-sm font-semibold leading-none text-white bg-blue-500 rounded">{{ $bien->categorie->nom }}</span></p>
            <p class="text-gray-700 mt-2"><strong>Utilisateur:</strong> <span class="inline-block px-2 py-1 text-sm font-semibold leading-none text-white bg-yellow-500 rounded">{{ $bien->utilisateur->nom }}</span></p>
        </div>
    </div>

    <section class="comments-section content-center mt-10">
        <button onclick="openPopup()" class="mb-10 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Ajouter un commentaire</button>

        <h2 class="text-2xl font-bold text-gray-900 mb-5">Commentaires</h2>
        @if(Session::has('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-5">
                {{ Session::get('error') }}
            </div>
        @endif

        <ul class="list-none space-y-4">
            @foreach ($commentaires as $commentaire)
                <li class="bg-gray-200 container p-4 rounded-lg shadow-md">
                    <div class="flex container justify-between items-start">
                        <div>
                            <h5 class="text-lg font-semibold text-gray-900 mb-2">{{$commentaire->auteur}}</h5>
                            <p class="text-gray-700">{{$commentaire->contenu}}</p>
                        </div>
                        <div class="comment-actions text-sm space-x-2">
                            <a onclick="return confirm('Confirmer la suppression')" href="/supprimer/{{$commentaire->id}}" class="text-red-500">Supprimer</a>
                            <a href="/modifier/{{$commentaire->id}}" class="text-yellow-500">Modifier</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>


        <div id="commentForm" class="popup-form">
            <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
                <h3 class="text-xl font-bold text-gray-900 mb-5">Ajouter un commentaire</h3>
                <form action="{{route('commentaire')}}" method="post">
                    @csrf
                    <input type="hidden" name="bien_id" value="{{$bien->id}}">
                    <div class="mb-4">
                        <label for="auteur" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded" id="auteur" placeholder="Votre nom" name="auteur" required>
                    </div>
                    <div class="mb-4">
                        <label for="contenu" class="block text-gray-700 font-semibold mb-2">Contenu</label>
                        <textarea name="contenu" id="contenu" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Votre commentaire..." required></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Envoyer</button>
                        <button type="button" onclick="closePopup()" class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
function openPopup() {
    document.getElementById('commentForm').classList.add('active');
}

function closePopup() {
    document.getElementById('commentForm').classList.remove('active');
}
</script>
</body>
</html>
