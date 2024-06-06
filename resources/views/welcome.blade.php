{{-- navbar --}}
@include('nav')
{{-- navbar --}}

    <section class="carousel mb-12 relative bg-slate-400">
        <div class="container mx-auto">
            <div class="carousel-inner h-full relative overflow-hidden">
                <div class="carousel-item h-96 bg-no-repeat items-center bg-cover bg-gradient-to-b active"
                    style="background-image: url('https://content.refindly.com/quailwestnapleshomes_com/uploads/2015/09/Astbury-Villa.jpg')">
                    <div
                        class="carousel-caption w-full absolute bottom-0 text-center pt-16 justify-items-center p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                        <h5 class="text-white font-bold">
                            Agent immobilier </h5>
                        <p class="text-white">L’agent immobilier accompagne des clients qui souhaitent vendre, acheter ou louer un bien immobillier. </p>
                    </div>
                </div>
                <div class="carousel-item h-96 bg-no-repeat bg-cover bg-gradient-to-b hidden"
                    style="background-image: url('https://www.mahapremium.ma/upload/slides/road_2.jpg')">
                    <div
                        class="carousel-caption w-full absolute bottom-0 text-center pt-16 justify-items-center p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                        <h5 class="text-white font-bold">
                            Agent immobilier </h5>
                        <p class="text-white">L’agent immobilier accompagne des clients qui souhaitent vendre, acheter ou louer un bien immobillier. </p>
                    </div>
                </div>
                <div class="carousel-item h-96 bg-no-repeat bg-cover bg-gradient-to-b hidden"
                    style="background-image: url('https://www.sciencesetavenir.fr/assets/img/2022/09/22/cover-r4x3w1200-632c594538d70-bien-virtuel-immobilier.jpg')">
                    <div
                    class="carousel-caption w-full absolute bottom-0 text-center pt-16 justify-items-center p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                    <h5 class="text-white font-bold">
                        Agent immobilier </h5>
                    <p class="text-white">L’agent immobilier accompagne des clients qui souhaitent vendre, acheter ou louer un bien immobillier. </p>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container bg-slate-400 mx-auto py-12">
        <div class="container bg-slate-400">


            <h2 class="text-3xl font-bold text-center mb-16 text-gray-800">Nos derniers biens immobiliers</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-24 gap-12">
                @foreach ($biens as $bien)
                    <div
                        class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                        <img src="{{ asset('storage/blog/' . $bien->image) }}" alt="{{ $bien->nom }}"
                            class="w-full h-60 object-cover property-image">
                        <div class="p-4">
                            <div class="flex items-center justify-between my-4">
                                <span
                                    class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                    <i class="fa-solid fa-layer-group"></i>Catégorie: {{ $bien->categorie->nom }}
                                </span>
                                <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>: {{ $bien->prix }} XOF
                                </span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900">{{ $bien->nom }}</h3>
                            <p class="text-gray-600">{{ Str::limit($bien->description, 100) }}</p>
                            <div class="flex items-center justify-between mt-4">
                                <span class=" text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                    <i class="fa-solid fa-border-top-left"></i>: {{ $bien->surface }} m²
                                </span>
                                <a href="{{ url('biens/show/' . $bien->id) }}"
                                    class="text-blue-500 hover:text-blue-700 font-medium">
                                    Voir détail <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>

                        </div>

                        @auth
                        <div class=" justify-center flex items-center">
                            {{-- btn trois poins pour admin --}}
                            <button onclick="openModal('modal-{{ $bien->id }}')"
                                class="  justify-center place-items-center  text-gray-700  ">
                                <i class="fa-solid fa-ellipsis-h text-lg"></i>
                            </button>
                        </div>
                        @endauth

                    </div>
                    {{-- B --}}
                    <div id="modal-{{ $bien->id }}"
                        class="fixed inset-0 z-40 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
                        <div class="bg-white rounded-lg p-6 w-full max-w-md">
                            <h3 class="text-xl font-semibold mb-4">Actions</h3>
                            <div class="flex space-x-4 mb-4 justify-between">
                                <a href="{{ route('biens.edit', $bien->id) }}" class="text-blue-500 hover:underline">
                                    <i class="fa-regular fa-pen-to-square"></i> Modifier
                                </a>
                                <form action="{{ route('biens.destroy', $bien->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm text-red-600 hover:underline"> <i class="fa-solid fa-trash"></i>Supprimer</button>
                                </form>
                                <button onclick="closeModal('modal-{{ $bien->id }}')"
                                    class="mt-4 bg-gray-200 text-gray-700 rounded-full p-2">Fermer</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- popup ajoute pour biens --}}
            <div id="commentForm" class="popup-form">
                @include('biens.create')
            </div>
            {{-- Fin popup ajoute pour biens --}}

    </section>
    </div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto">
            <p class="text-center">© 2024 Mon Blog Immobilier</p>
        </div>
    </footer>

    {{--  Popup js --}}

    <script>
        function openPopup() {
            document.getElementById('commentForm').classList.add('active');
        }

        function closePopup() {
            document.getElementById('commentForm').classList.remove('active');
        }
    </script>

    {{-- modal bouton trois poins pour admin a voir btn Suppression et modification --}}
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>

    {{-- Slider js --}}
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
                slide.classList.toggle('hidden', i !== index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 3000);

        function openPopup() {
            document.getElementById('commentForm').classList.add('active');
        }

        function closePopup() {
            document.getElementById('commentForm').classList.remove('active');
        }

        showSlide(currentSlide);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
