@extends('layouts.app')

@section('title', $article['titre'])

@section('content')

    <div style="max-width: 800px; margin: 0 auto;">
        <a href="/blog" style="color: #FF2D20; text-decoration: none; margin-bottom: 20px; display: inline-block;">← Retour au blog</a>

        <h1 style="color: #FF2D20; margin-top: 20px;">{{ $article['titre'] }}</h1>

        <div style="color: #666; margin: 20px 0; font-size: 14px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
            <span>Par <strong>{{ $article['auteur'] }}</strong></span><br>
            <span>{{ $article['date'] }}</span>
        </div>

        <div style="line-height: 1.8; font-size: 16px; color: #333;">
            <p>{{ $article['contenu'] }}</p>
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="/blog" style="background: #FF2D20; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Revenir au blog</a>
        </div>

@endsection
