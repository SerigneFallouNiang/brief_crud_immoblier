<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //

    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }


      // Afficher le formulaire de création de catégorie
      public function create()
      {
          return view('categories.create');
      }

      // Enregistrer une nouvelle catégorie
      public function store(Request $request)
      {
          $request->validate([
              'nom' => 'required|string|max:255',
              'description' => 'nullable|string',
          ]);

          Categorie::create($request->all());

          return redirect()->route('categories.index')
                           ->with('success', 'Catégorie créée avec succès.');
      }

      public function destroy(Categorie $categorie)
      {
          $categorie->delete();

          return redirect()->route('categories.index')
                           ->with('success', 'Catégorie supprimée avec succès.');
      }

      public function edit(Categorie $categorie)
      {
          return view('categories.edit', compact('categorie'));
      }

      // Mettre à jour une catégorie spécifique
      public function update(Request $request, Categorie $categorie)
      {
          $request->validate([
              'nom' => 'required|string|max:255',
              'description' => 'nullable|string',
          ]);

          $categorie->update($request->all());

          return redirect()->route('categories.index')
                           ->with('success', 'Catégorie mise à jour avec succès.');
      }
}
