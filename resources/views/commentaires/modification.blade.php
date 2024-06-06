{{-- navbar --}}
@include('nav')
{{-- navbar --}}
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
    <div class="border-b pb-4 mb-4">
        <h1 class="text-2xl font-bold text-gray-900"><i class="fas fa-edit"></i> Modifier le commentaire</h1>
    </div>
    @if(Session::has('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-5" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ Session::get('error') }}
        </div>
    @endif

    <form action="/modifier/traitement/" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$commentaires->id}}">
        <div class="mb-4">
            <label for="auteur" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
            <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" id="auteur" placeholder="Votre nom" name="auteur" value="{{$commentaires->auteur}}" required>
        </div>
        <div class="mb-4">
            <label for="contenu" class="block text-gray-700 font-semibold mb-2">Contenu</label>
            <textarea name="contenu" id="contenu" class="w-full p-3 border border-gray-300 rounded-lg" rows="6" placeholder="Votre commentaire..." required>{{$commentaires->contenu}}</textarea>
        </div>
        <input type="hidden" name="bien_id" value="{{$commentaires->bien_id}}">
        <div class="flex justify-between items-center">
            <a href="{{ url()->previous() }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Modifier <i class="fas fa-check"></i>
            </button>
        </div>
    </form>
</div>



<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
