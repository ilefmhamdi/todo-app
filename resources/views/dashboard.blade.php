@extends('layouts.app')

@section('title', 'TODO')

@section('content')

    <h1 style="color: #FF2D20;">Bienvenue sur TODO</h1>
    <p>Gérez vos tâches efficacement !</p>

    <div style="background: #f5f5f5; padding: 30px; margin-top: 30px; border-radius: 10px;">
        <h2>Pourquoi nous choisir ?</h2>
        <ul>
            <li>Gestion facile des tâches</li>
            <li>Interface intuitive</li>
            <li>Gratuit et simple</li>
        </ul>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-4">Voir mes tâches</a>

@endsection
