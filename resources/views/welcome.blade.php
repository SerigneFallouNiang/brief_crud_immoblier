<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog immobilier</title>
    <meta name="description" content="Blog immobilier pour trouver votre maison de rêve">
    <meta name="keywords" content="immobilier, maison, appartement, vente, location">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog immobilier</title>
        <meta name="description" content="Blog immobilier pour trouver votre maison de rêve">
        <meta name="keywords" content="immobilier, maison, appartement, vente, location">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
            .carousel-item {
                background-size: cover;
                background-position: center;
                transition: opacity 1s ease-in-out;
            }

            .carousel-item.hidden {
                opacity: 0;
            }

            .carousel-item.active {
                opacity: 1;
            }
        </style>
    </head>

    <body>

        <header class="bg-white shadow-md">
            <div class="container mx-auto flex justify-between items-center py-4">
                <a href="#" class="text-3xl font-bold text-gray-800">Mon Blog Immobilier</a>
                <nav>
                    <ul class="flex space-x-4">
                        <li>
                            @auth
                            <form action="{{ route('deconnexion') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger border-t-neutral-400 text-" type="submit">Déconnexion</button>
                            </form>
                            @endauth
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="carousel mb-12 relative">
            <div class="container mx-auto">
                <div class="carousel-inner h-full relative overflow-hidden">
                    <div class="carousel-item h-96 bg-no-repeat items-center bg-cover bg-gradient-to-b active"
                        style="background-image: url('https://content.refindly.com/quailwestnapleshomes_com/uploads/2015/09/Astbury-Villa.jpg')">
                        <div class="carousel-caption  text-center pt-16 justify-items-center p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                            <h5 class="text-white font-bold">Titre du slide 1</h5>
                            <p class="text-white">Description du slide 1</p>
                        </div>
                    </div>
                    <div class="carousel-item h-96 bg-no-repeat bg-cover bg-gradient-to-b hidden"
                    style="background-image: url('https://content.refindly.com/quailwestnapleshomes_com/uploads/2015/09/Astbury-Villa.jpg')">
                    <div class="carousel-caption  text-center p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                        <h5 class="text-white font-bold">Titre du slide 2</h5>
                            <p class="text-white">Description du slide 2</p>
                        </div>
                    </div>
                    <div class="carousel-item h-96 bg-no-repeat bg-cover bg-gradient-to-b hidden"
                        style="background-image: url('https://content.refindly.com/quailwestnapleshomes_com/uploads/2015/09/Astbury-Villa.jpg')">
                        <div class="carousel-caption  text-center bottom-0 p-4 align-middle items-center justify-center bg-black bg-opacity-50 text-white">
                            <h5 class="text-white font-bold">Titre du slide 3</h5>
                            <p class="text-white">Description du slide 3</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="container mx-auto py-12">
        <div class="container">
            @auth
            <a href="{{ route('biens.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">← Ajouter un nouveau bien</a>
            @endauth

            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Nos derniers biens immobiliers</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-24 gap-12">
                @foreach ($biens as $bien)
                <div
                    class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105">
                    <img src="{{ asset('storage/blog/' . $bien->image) }}" alt="{{ $bien->nom }}"
                        class="w-full h-60 object-cover property-image">
                    <div class="p-4">
                        <div class="flex items-center justify-between my-4">
                            <span class="bg-purple-100 text-purple-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                {{-- Catégorie: {{ $bien->categorie->nom }} --}}
                            </span>
                            <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                Prix: {{ $bien->prix }} XOF
                            </span>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">{{ $bien->nom }}</h3>
                        <p class="text-gray-600">{{ $bien->description }}</p>
                        <div class="flex items-center justify-between mt-4">
                            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                                Surface: {{ $bien->surface }} m²
                            </span>
                            <a href="{{ url('biens/show/' . $bien->id) }}"
                                class="text-blue-500 hover:text-blue-700 font-medium">
                                Voir détail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto">
            <p class="text-center">© 2024 Mon Blog Immobilier</p>
        </div>
    </footer>

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
</body>
</html>
