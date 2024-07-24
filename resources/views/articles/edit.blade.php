@extends('layouts.master')

@section('title')
  Créer un article
@endsection

@section('contenu')
<form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {{-- Cross Site Resource Forgery --}}
  <div class="mb-3">
    <label for="title" class="form-label">Titre de l'article</label>
    <input 
      type="text" 
      class="form-control @error('title') is-invalid @enderror" 
      name="title" 
      id="title"
      value="{{ old('title', $article->title) }}" 
    >
    {{-- Message d'erreur pour le titre --}}
    @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3 form-floating">
    <textarea 
      class="form-control  @error('body') is-invalid @enderror" 
      placeholder="Entrez le contenu de l'article" name="body" 
      style="height: 300px;" 
      id="body"
    >{{old('body', $article->body   )}}</textarea>
    <label for="body">Corps de l'article</label>
    {{-- Message d'erreur pour le body --}}
    @error('body')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Choisir une image pour l'article</label>

    @if ($article->image)
    <img 
        src="{{ asset('storage/' . $article->image) }}" 
        alt="Image de l'article" 
        class="img-thumbnail mb-3"
        width="200"
    >
    @endif
    
    <input 
    class="form-control @error('image') is-invalid @enderror"
    type="file" 
    id="image" 
    name="image" >
    {{-- Message d'erreur pour l'image --}}
    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">
    Envoyer
  </button>
</form>
@endsection