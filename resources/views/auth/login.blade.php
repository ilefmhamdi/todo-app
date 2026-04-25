@extends('layouts.app')

@section('title', 'Connexion')

@section('content')

    <h1 style="color: #FF2D20;">Connexion</h1>

    @if (session('status'))
        <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" style="max-width: 500px;">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @if ($errors->get('email'))
                <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $errors->get('email')[0] }}</div>
            @endif
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            @if ($errors->get('password'))
                <div style="color: #dc3545; font-size: 14px; margin-top: 5px;">{{ $errors->get('password')[0] }}</div>
            @endif
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input type="checkbox" name="remember" style="width: 18px; height: 18px;">
                <span>Se souvenir de moi</span>
            </label>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
            <button type="submit" style="background: #FF2D20; color: white; padding: 10px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">
                Se connecter
            </button>

            <div style="display: flex; gap: 15px;">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #FF2D20; text-decoration: none;">Mot de passe oublié ?</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="background: #333; color: white; padding: 8px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">S'inscrire</a>
                @endif
            </div>
    </form>

@endsection
