<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'TODO')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
            }

            /* Navigation */
            nav {
                background: #FF2D20;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }

            nav ul {
                list-style: none;
                display: flex;
                gap: 20px;
                max-width: 1200px;
                margin: 0 auto;
                align-items: center;
            }

            nav a {
                color: white;
                text-decoration: none;
                font-weight: bold;
                padding: 10px 15px;
                border-radius: 5px;
                transition: background 0.3s;
            }

            nav a:hover {
                background: rgba(255,255,255,0.2);
            }

            /* Contenu */
            .container {
                max-width: 1200px;
                margin: 40px auto;
                padding: 20px;
            }

            /* Footer */
            footer {
                background: #333;
                color: white;
                text-align: center;
                padding: 30px;
                margin-top: 50px;
            }

            .auth-nav {
                margin-left: auto;
                display: flex;
                gap: 5px;
                align-items: center;
            }

            .auth-nav form {
                margin: 0;
            }
        </style>

        @yield('styles')
    </head>
    <body class="font-sans antialiased">
        {{-- Navigation --}}
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li><a href="{{ route('about') }}">À propos</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('tasks.index') }}">Tâches</a></li>
                <li class="auth-nav">
                    @auth
                        <a href="{{ route('profile.edit') }}">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Déconnexion</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>
                        <a href="{{ route('register') }}">Inscription</a>
                    @endauth
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <main>
            @isset($slot)
                {{ $slot }}
            @else
                @if (session('success'))
                    <div class="container py-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                        </div>
                @endif
                <div class="container">
                    @yield('content')
                </div>
            @endisset
        </main>

        {{-- Footer --}}
        <footer>
            <p>&copy; {{ date('Y') }} TODO App. Tous droits réservés.</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        @yield('scripts')
    </body>
</html>
