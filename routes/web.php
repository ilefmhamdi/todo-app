<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'active'])->group(function () {
    Route::resource('tasks', TaskController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    $data = [
        'titre'       => 'À propos de nous',
        'description' => 'Nous sommes une équipe passionnée par Laravel !'
    ];
    return view('about', $data);
})->name('about');

Route::get('/services', function () {
    $services = [
        ['nom' => 'Développement Web', 'prix' => '1500€'],
        ['nom' => 'Design UI/UX', 'prix' => '800€'],
        ['nom' => 'SEO', 'prix' => '500€']
    ];
    return view('services', compact('services'));
})->name('services');

Route::get('/contact', function () {
    $contacts = [
        'email'     => 'contact@monsite.com',
        'telephone' => '01 23 45 67 89',
        'adresse'   => '123 Rue Laravel, Paris'
    ];
    return view('contact', ['contacts' => $contacts]);
})->name('contact');

Route::get('/blog', function () {
    $articles = [
        [
            'id' => 1,
            'titre' => 'Introduction à Laravel',
            'auteur' => 'Alice Martin',
            'date' => '2026-03-01',
            'extrait' => 'Découvrez les bases de laravel et comment commencer votre première application.',
            'contenu' => 'Laravel est un framework PHP moderne qui facilite le développement d\'applications web. Il offre une syntaxe expressive et élégante...'
        ],
        [
            'id' => 2,
            'titre' => 'Route et Contrôleurs',
            'auteur' => 'Bob Dupont',
            'date' => '2026-02-28',
            'extrait' => 'Apprenez comment définir les routes et organiser votre code avec les contrôleurs.',
            'contenu' => 'Les routes définissent comment votre application répond aux requêtes HTTP. Les contrôleurs organisent votre logique métier...'
        ],
        [
            'id' => 3,
            'titre' => 'Vues Blade avancées',
            'auteur' => 'Claire Lefebvre',
            'date' => '2026-02-26',
            'extrait' => 'Maîtrisez le moteur de templates Blade pour créer des interfaces dynamiques.',
            'contenu' => 'Blade est le moteur de templates de Laravel qui offre une syntaxe simple et puissante pour créer des vues HTML dynamiques...'
        ],
        [
            'id' => 4,
            'titre' => 'Interaction avec la base de données',
            'auteur' => 'Alice Martin',
            'date' => '2026-02-24',
            'extrait' => 'Utilisez Eloquent pour interagir facilement avec votre base de données.',
            'contenu' => 'Eloquent est l\'ORM (Object-Relational Mapping) de Laravel qui simplifie les opérations sur la base de données...'
        ],
        [
            'id' => 5,
            'titre' => 'Authentification et autorisation',
            'auteur' => 'Bob Dupont',
            'date' => '2026-02-22',
            'extrait' => 'Implémentez un système d\'authentification sécurisé pour votre application.',
            'contenu' => 'Laravel offre un système d\'authentification complet et flexible que vous pouvez utiliser pour sécuriser votre application...'
        ]
    ];
    return view('blog', compact('articles'));
})->name('blog');

Route::get('/article/{id}', function ($id) {
    $articles = [
        1 => [
            'titre' => 'Introduction à Laravel',
            'auteur' => 'Alice Martin',
            'date' => '2026-03-01',
            'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Laravel est un framework PHP moderne qui facilite le développement d\'applications web. Il offre une syntaxe expressive et élégante pour développer rapidement vos projets.'
        ],
        2 => [
            'titre' => 'Route et Contrôleurs',
            'auteur' => 'Bob Dupont',
            'date' => '2026-02-28',
            'contenu' => 'Les routes définissent comment votre application répond aux requêtes HTTP. Les contrôleurs organisent votre logique métier de manière propre et structurée.'
        ],
        3 => [
            'titre' => 'Vues Blade avancées',
            'auteur' => 'Claire Lefebvre',
            'date' => '2026-02-26',
            'contenu' => 'Blade est le moteur de templates de Laravel qui offre une syntaxe simple et puissante pour créer des vues HTML dynamiques avec des conditions et des boucles.'
        ],
        4 => [
            'titre' => 'Interaction avec la base de données',
            'auteur' => 'Alice Martin',
            'date' => '2026-02-24',
            'contenu' => 'Eloquent est l\'ORM de Laravel qui simplifie les opérations sur la base de données avec une API élégante et intuitive.'
        ],
        5 => [
            'titre' => 'Authentification et autorisation',
            'auteur' => 'Bob Dupont',
            'date' => '2026-02-22',
            'contenu' => 'Laravel offre un système d\'authentification complet et flexible que vous pouvez utiliser pour sécuriser votre application facilement.'
        ]
    ];

    if (!isset($articles[$id])) {
        abort(404, 'Article not found');
    }

    return view('article', ['id' => $id, 'article' => $articles[$id]]);
})->where('id', '[0-9]+')->name('article');

require __DIR__.'/auth.php';
