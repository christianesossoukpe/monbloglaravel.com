@extends('layouts.auth')

@section('title', 'Register')

@section('contenu')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Se connecter</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                type="email" 
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{old('email')}}"
                required
                >
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input 
                type="password" 
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                value="{{old('password')}}"
                required
                >
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Créer le compte</button>
        </form>
        <p class="mt-3">
            Vous n'avez pas de compte ?
            <a href="{{ route('register')}}">créer un compte</a>.
        </p>
    </div>
</div>
@endsection