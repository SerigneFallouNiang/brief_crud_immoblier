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
       Commentaire::create($request->all());

        return redirect()->back();
    }

}
