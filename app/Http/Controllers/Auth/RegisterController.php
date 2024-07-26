<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        // on récupère les données déjà validées
        $validated = $request->validated();

        // créer le nouvel utilsateur
        User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => bcrypt($validated["password"]),
        ]);

        // connecter l'utilisateur
        $user = User::where('email', $validated["email"])->firstOrFail();
        Auth::login($user);

        // rediriger l'utilsateur sur la page des articles
        return redirect()->route('articles.index');
    }
}
