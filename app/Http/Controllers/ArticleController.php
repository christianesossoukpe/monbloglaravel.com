<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * Affiche toutes les resources (articles)
     */
    public function index()
    {
        // $articles = Article::orderBy('created_at', 'desc');
        // $articles = Article::latest()->get();
        $articles = Article::latest()->paginate(2);
        // $articles = Article::orderByDesc('created_at')->get();

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
        return redirect()->route('articles.index')
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
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une resource spécifique dans la BDD
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // Les données validées sont déjà disponibles
        // via le UpdateArticleRequest
        $validated = $request->validated();

        // Gestion de l'image
        if ($request->hasFile('image')) { // si on a une image
            // Supprimer l'ancienne image si elle existe
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            // Stocker la nouvelle image
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        } else {
            // Garde l'image existante si aucune nouvelle
            // image n'est téléchargée
            $validated['image'] = $article->image;
        }
        // Mettre à jour l'article
        $article->update($validated);
        // Rediriger vers la page de l'article avec
        // un message de succès
        return redirect()->route('articles.show', $article->id)->with('success', 'Article modifié avec succès');
        
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
