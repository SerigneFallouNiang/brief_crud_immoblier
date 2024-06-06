{{-- navbar --}}

@include('nav')
{{-- navbar --}}
<div class="container mx-auto ml-5 mt-5">
    <a href="{{ route('biens.index') }}" class="text-blue-500 hover:text-blue-700 ml-14 py-16">← Retour</a>
    <div class="grid grid-cols-1 container md:grid-cols-4 gap-20    ">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/blog/'.$bien->image )}}" alt="{{ $bien->nom }}" class="w-full h-96 object-cover mt-10 property-image">
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
            <p class="text-gray-700 mt-2"><strong>Prix:</strong> <span class="text-xl font-bold">{{ number_format($bien->prix, 0, ',', ' ') }} Cfa</span></p>
            <p class="text-gray-700 mt-2"><strong>Catégorie:</strong> <span class="inline-block px-2 py-1 text-sm font-semibold leading-none text-white bg-blue-500 rounded">{{ $bien->categorie->nom }}</span></p>
            <p class="text-gray-700 mt-2"><strong>Utilisateur:</strong> <span class="inline-block px-2 py-1 text-sm font-semibold leading-none text-white bg-yellow-500 rounded">{{ $bien->utilisateur->nom }}</span></p>
        </div>
    </div>

    <section class="comments-section content-center mt-10">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class=" ml-14 text-2xl font-bold text-gray-900 mb-5">Commentaires</h2>
                @if(Session::has('error'))
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-5">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <ul class="list-none space-y-4">
                    @foreach ($commentaires as $commentaire)
                        <li class="bg-white ml-14 p-6 rounded-lg shadow-md border border-gray-300">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h5 class="text-lg font-semibold text-gray-900 mb-2">{{$commentaire->auteur}}</h5>
                                    <p class="text-gray-700 mb-4">{{$commentaire->contenu}}</p>
                                    <p class="text-gray-500 text-sm">{{ $commentaire->created_at->format('d M Y, H:i') }}</p>
                                </div>
                                @auth


                                <div class="comment-actions text-sm space-x-2">
                                    <a onclick="return confirm('Confirmer la suppression')" href="/supprimer/{{$commentaire->id}}" class="text-red-500 hover:text-red-700">Supprimer</a>
                                    <a href="/modifier/{{$commentaire->id}}" class="text-yellow-500 hover:text-yellow-700">Modifier</a>
                                </div>
                                @endauth
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="commentForm" class="">
                <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto">
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
        </div>
    </section>

    <script>
    function openPopup() {
        document.getElementById('commentForm').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('commentForm').classList.add('hidden');
    }
    </script>

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
