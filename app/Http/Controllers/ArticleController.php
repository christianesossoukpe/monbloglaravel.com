<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les resources (articles)
     */
    public function index()
    {
        $articles = [
            [
                "title" => "Titre article 1",
                "body"  => "Contenu de l'article 1",
            ],
            [
                "title" => "Titre article 2",
                "body"  => "Contenu de l'article 2",
            ],
            [
                "title" => "Titre article 3",
                "body"  => "Contenu de l'article 3",
            ],
        ];
        
        return view(
            'layouts.articles', 
            ['articles' => $articles]
        );
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'1 article
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Stock la resource (l'article) dans la BDD
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Affiche une resource spécifique
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le forumlaire d'édition
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une resource spécifique dans la BDD
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer une resource (article) spécifique
     */
    public function destroy(Article $article)
    {
        //
    }
}
