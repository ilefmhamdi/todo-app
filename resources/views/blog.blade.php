@extends('layouts.app')

@section('title', 'Blog')

@section('content')

    <h1 style="color: #FF2D20;">Notre Blog</h1>
    <p>Découvrez nos derniers articles sur Laravel et le développement web.</p>

    <div style="margin-top: 30px;">
        @foreach ($articles as $article)
            <div style="background: white; padding: 20px; margin: 20px 0; border-left: 4px solid #FF2D20; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <h3>
                    <a href="/article/{{ $article['id'] }}" style="color: #FF2D20; text-decoration: none;">
                        {{ $article['titre'] }}
                    </a>
                </h3>
                <div style="color: #666; margin: 10px 0; font-size: 14px;">
                    <span>Par {{ $article['auteur'] }}</span> | 
                    <span>{{ $article['date'] }}</span>
                </div>
                <p>{{ $article['extrait'] }}</p>
                <a href="/article/{{ $article['id'] }}" style="color: #FF2D20; text-decoration: none; font-weight: bold;">Lire la suite →</a>
            </div>
        @endforeach
    </div>

@endsection
