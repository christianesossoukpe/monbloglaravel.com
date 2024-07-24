<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
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
        $articles = Article::all();

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
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stock la resource (l'article) dans la BDD
     */
    public function store(StoreArticleRequest $request)
    {
         // récupère les données déjà validées par le StoreArticleRequest
        $validated = $request->validated();
        // Gérer la sauvegarde de l'image (s'il y en a)
        if($request->hasFile('image')) {
            $path = $request
                ->file('image')
                ->store('images', 'public');
            $validated['image'] = $path;
        }

        $validated['user_id'] = 1;
        
        // Envoyer l'article dans la BDD
        Article::create($validated);

        // retourne sur la page des articles
        return redirect('/articles')
        ->with('success', 'Article créé avec succès !');
    }

    /**
     * Display the specified resource.
     * Affiche une resource spécifique
     */
    public function show(string $id)
    {
        // $article = Article::where("id", $id)->with('comments')->first();
        $article = Article::with("comments.user")->find($id);
        return view('articles.show', ['article' => $article]);
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
