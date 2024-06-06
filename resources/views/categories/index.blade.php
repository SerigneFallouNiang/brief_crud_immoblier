{{-- navbar --}}
@include('nav')
{{-- navbar --}}

<div class="container mt-5">
    @if (!Auth::user())
        <div class="flex flex-col items-center justify-center h-screen">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Désolé, vous n'êtes pas autorisé à accéder à cette page
            </h1>
            <a href="{{ route('biens.index') }}" class="text-blue-500 hover:text-blue-700">Retour</a>
        </div>
    @else
        <div class="container pl-60 mx-auto mt-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Catégories</h1>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <button onclick="openPopup()"
            class="  text-blue-500 px-4 py-2 rounded hover:text-white hover:bg-blue-700">Ajouter un nouveau
            bien</button>
           
            <div class="overflow-x-auto items-center justify-center w-5/6  bg-white rounded-lg shadow-md">
                <table class=" w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Description</th>
                            <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($categories as $categorie)
                            <tr class="border-b">
                                <td class="w-1/3 py-3 px-4">{{ $categorie->nom }}</td>
                                <td class="w-1/3 py-3 px-4">{{ $categorie->description }}</td>
                                <td class="w-1/3 py-3 px-4 flex space-x-2">
                                    <a href="{{ route('categories.edit', $categorie->id) }}"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Modifier</a>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
           {{-- popup ajoute pour biens --}}
           <div id="commentForm" class="popup-form">
            @include('categories.create')
        </div>
        {{-- Fin popup ajoute pour biens --}}
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
