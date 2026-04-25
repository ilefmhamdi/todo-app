@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <h1 style="color: #FF2D20;">Contactez-nous</h1>
    <p>Voici nos coordonnées :</p>

    <div style="background: white; padding: 20px; margin-top: 20px; border: 2px solid #FF2D20; border-radius: 10px;">
        <p><strong>Email :</strong> {{ $contacts['email'] }}</p>
        <p><strong>Téléphone :</strong> {{ $contacts['telephone'] }}</p>
        <p><strong>Adresse :</strong> {{ $contacts['adresse'] }}</p>
    </div>

@endsection
