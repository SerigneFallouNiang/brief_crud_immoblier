<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        return view('biens.index', compact('biens'));
    }
    public function create()
    {
        return view('biens.create', );
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'surface' => 'required|integer',
            'prix' => 'required|integer',
            // 'category_id' => 'required|exists:categories,id'
        ]);

        $image = null;
        // Vérifier si un fichier image est uploadé
        if ($request->hasFile('image')) {
            // Stocker l'image dans le répertoire 'public/blog'
            $chemin_image = $request->file('image')->store('public/blog');

            // Vérifier si le chemin de l'image est bien généré
            if (!$chemin_image) {
                return redirect()->back()->with('error', 'Erreur lors du téléchargement de l\'image.');
            }

            // Récupérer le nom du fichier de l'image
            $image = basename($chemin_image);
        }

        $article = new Bien();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->image = $image; // Nom du fichier de l'image
        $article->adresse = $request->adresse;
        $article->statut = 1;
        $article->surface = $request->surface;
        $article->prix = $request->prix;
        $article->save();


        return redirect()->route('biens.index')->with('success', 'Bien créé avec succès.');
    }

       // Affiche les détails d'un bien
       public function show($id)
       {
           $bien = Bien::findOrFail($id);
           return view('biens.show', compact('bien'));
       }
}
