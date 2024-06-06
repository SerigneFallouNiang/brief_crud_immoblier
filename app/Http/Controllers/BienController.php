<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Categorie;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function index()
    {
        $biens = Bien::all();
        $categories = Categorie::all();
        return view('welcome', compact('biens','categories'));
    }
    public function create()
    {
        $categories=Categorie::All();
        return view('biens.create',compact('categories') );
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
             'categorie_id' => 'required|exists:categories,id',
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
        $article->categorie_id = $request->categorie_id;
        $article->utilisateur_id =  auth()->id();
        $article->save();


        return redirect()->route('biens.index')->with('success', 'Bien créé avec succès.');
    }

       // Affiche les détails d'un bien
       public function show($id)
       {
        $commentaires=Commentaire::All();

           $bien = Bien::findOrFail($id);
           return view('biens.show', compact('bien','commentaires'));
       }

       // Supprime un bien de la base de données
    public function destroy($id)
    {
        $bien = Bien::findOrFail($id);
        $bien->delete();

        return redirect()->route('biens.index')->with('success', 'Bien supprimé avec succès.');
    }
    public function edit($id)
    {
        $bien = Bien::findOrFail($id);
        $categories=Categorie::All();
        return view('biens.edit', compact('bien','categories'));
    }

    // Met à jour un bien dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adresse' => 'required|string|max:255',
            'statut' => 'required|boolean',
            'surface' => 'required|integer',
            'prix' => 'required|integer',
        ]);

        $bien = Bien::findOrFail($id);

        if ($request->hasFile('image')) {
            // // Supprimer l'ancienne image si elle existe
            // if ($bien->image) {
            //     Storage::put('public/blog' . $bien->image);
            // }

            // Stocker la nouvelle image
            $chemin_image = $request->file('image')->store('public/blog');
            $image = basename($chemin_image);
            $bien->image = $image;
        }

        $bien->nom = $request->nom;
        $bien->description = $request->description;
        $bien->adresse = $request->adresse;
        $bien->statut = $request->statut;
        $bien->surface = $request->surface;
        $bien->prix = $request->prix;

        $bien->save();

        return redirect()->route('biens.index')->with('success', 'Bien mis à jour avec succès.');
    }

}
