@extends('layouts.master')

@section('contenu')
    
<article class="mb-5">
    <img src="{{ $article["image"] }}" alt="" class="card-img-top">
    <div class="card-body">
        <h2 class="card-title mb-3 mt-3">
            {{ $article["title"] }}
        </h2>
        <p class="card-text">{{ $article["body"] }}</p>
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
                        <strong class="text-primary">
                            User id : {{ $comment->user_id}}
                        </strong>
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