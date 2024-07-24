@extends('layouts.master')

@section('contenu')
    
<article class="mb-5">
    <img src="{{ asset('storage/' . $article->image) }}" alt="" class="card-img-top">
    <div class="card-body">
        <h2 class="card-title mb-3 mt-3">
            {{ $article->title }}
        </h2>
    <p>Auteur: <strong>{{ $article->user->name }}</strong>. Créé le {{$article->created_at->format('j F Y')}}</p>
        
        <p class="card-text">{{ $article->body }}</p>
    </div>
</article>

<section class="mb-5">
    <div class="form-floating">
        <h2>
            <label for="comment-input">Commentaires</label>
        </h2>
        <form action="">
            <textarea 
            name="comment" 
            id="comment-input"
            class="form-control"
            placeholder="Laissez votre commentaire ici"
            ></textarea>
            <button type="submit" class="btn btn-primary">
                Envoyer
            </button>
        </form>

        <div class="mt-5">
            @forelse($article->comments as $comment)
                <div class="mb-3">
                    <p>
                        <span class="badge text-primary">
                           {{ $comment->user->name}}
                        </span>
                        <span class="badge text-bg-secondary">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </p>
                    <small>{{ $comment["comment"] }}</small>
                </div>
            @empty
                <p>Aucun commentaire trouvé</p>
            @endforelse
        </div>
    </div>
</section>
@endsection