<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\CommentaireController;

class CommentaireController extends Controller
{
    public function commentaire(){
        $commentaires=Commentaire::All();
        return view('commentaires.index',compact('commentaires'));
    }

    public function commentairePost(Request $request){
        $request->validate([
            'auteur' => 'required|string|max:30|min:3',
            'contenu' => 'required|string|min:3'],
        
            [ 'auteur.required' => 'Le champ nom est obligatoire.',
        'auteur.string' => 'Le nom doit être une chaîne de caractères.',
        'contenu.required' => 'Le champ commentaire est obligatoire.',]);



       Commentaire::create($request->all());

        return redirect()->back();
    }

    public function supprimer($id){
        $commentaire=Commentaire::findOrfail($id);
        $commentaire->delete();
        return redirect()->back()->with('success','commentaire supprimer avec succes');
    }

    public function modifier($id){
        $commentaires=Commentaire::find($id);
        return view('commentaires.modification',compact('commentaires'));

    }

    public function modifierPost(Request $request){
        $commentaire= Commentaire::find($request->id);
         $commentaire->auteur=$request->auteur;
         $commentaire->contenu=$request->contenu;
         $commentaire->update();
        return redirect()->route('biens.show', $commentaire->bien_id)->with('status', 'Commentaire mis à jour avec succès');


    }

}
