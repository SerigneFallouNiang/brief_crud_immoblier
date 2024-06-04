<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
   public function inscription(){
    return view('utilisateurs.inscription');
   }

   public function inscriptionPost(Request $request){
    $request->validate([
        'nom' => 'required|string|max:30|regex:/^[\pL\s\-]+$/u',
        'prenom' => 'required|string|max:50|regex:/^[\pL\s\-]+$/u',
        'telephone' => 'required|string|max:15|regex:/^[0-9\s\+\-\(\)]+$/',
        'email' => 'required|email|unique:users,email|max:255',
        'password' => 'required|string|min:8|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
    ], [
        // Messages pour le champ 'nom'
        'nom.required' => 'Le champ nom est obligatoire.',
        'nom.string' => 'Le nom doit être une chaîne de caractères.',
        'nom.max' => 'Le nom ne doit pas dépasser 30 caractères.',
        'nom.regex' => 'Le nom ne doit contenir que des lettres, espaces et tirets.',
    
        // Messages pour le champ 'prenom'
        'prenom.required' => 'Le champ prénom est obligatoire.',
        'prenom.string' => 'Le prénom doit être une chaîne de caractères.',
        'prenom.max' => 'Le prénom ne doit pas dépasser 50 caractères.',
        'prenom.regex' => 'Le prénom ne doit contenir que des lettres, espaces et tirets.',
    
        // Messages pour le champ 'telephone'
        'telephone.required' => 'Le champ numéro de téléphone est obligatoire.',
        'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
        'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser 15 caractères.',
        'telephone.regex' => 'Le numéro de téléphone ne doit contenir que des chiffres, espaces et caractères (+, -, (, )).',
    
        // Messages pour le champ 'email'
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Veuillez entrer une adresse email valide.',
        'email.unique' => 'Cette adresse email est déjà utilisée.',
        'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
    
        // Messages pour le champ 'password'
        'password.required' => 'Le champ mot de passe est obligatoire.',
        'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
        'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
        'password.max' => 'Le mot de passe ne doit pas dépasser 100 caractères.',
        'password.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial (@, $, !, %, *, ?, &).',
    ]);
    $user= new User();
    $user->nom=$request->nom;
    $user->prenom=$request->prenom;
    $user->telephone=$request->telephone;
    $user->email=$request->email;
    $user->role="admin";
    $user->password=Hash::make($request->password);
    $user->save();
    return redirect()->route('connexion');

   }

   public function connexion(){
    return view('utilisateurs.connexion');
   }

   public function connexionPost(Request $request){
    $creditials=[
        'email'=>$request->email,
        'password' => $request->password,
    ];
    if(Auth::attempt($creditials)){
        return redirect ('/')->with('success','connexion avec succes');
    }
 return back()->with('error','vérifier votre mail ou mot de passe');
   }

   public function deconnexion(){
    Auth::logout();
    return redirect()->route('connexion');
   }
}
