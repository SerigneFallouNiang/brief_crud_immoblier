<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //


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
}
