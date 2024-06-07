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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
            .popup-form {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 50;
                opacity: 0;
                pointer-events: none;
                transition: opacity 0.3s ease-in-out;
            }

            .popup-form.active {
                opacity: 1;
                pointer-events: auto;
            }
        </style>
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

<body class="bg-slate-400">

    <header class="bg-white  border-x-2 shadow-2xl pb-16  ">
        <div class="container mx-auto bg-white shadow-lg border-x-2 h-20  fixed bg-fixed z-50 flex justify-between px-36 items-center py-">

            <a href="{{ route('biens.index') }}" class="text-3xl font-bold text-gray-800">FS Immobilier</a>
            <nav>
                <ul class="flex space-x-4">
                    @auth
                    <li>
                        <button onclick="openPopup()"
                        class="  text-blue-500 px-4 py-2 rounded hover:text-white hover:bg-blue-700">Ajouter un nouveau
                        bien</button>
                        <a href="{{ route('categories.index') }}" class=" text-blue-500 hover:text-white  px-4 py-2 rounded hover:bg-blue-700">Categories</a>
                        <a href="{{ route('biens.index') }}" class=" text-blue-500 hover:text-white  px-4 py-2 rounded hover:bg-blue-700">Biens</a>
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
