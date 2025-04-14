<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title', 'Bem-vindo')</title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand code-text" href="{{ url('/') }}">
                <span class="text-primary">{</span> Self-DEV <span class="text-primary">}</span>
            </a>
            
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-code text-primary"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link code-nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="fas fa-home me-1"></i> _home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link code-nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-info-circle me-1"></i> _sobre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link code-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-paper-plane me-1"></i> _contato
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="footer bg-dark py-5 mt-auto">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="code-comment mb-3">// Sobre o projeto</div>
                    <h5 class="text-primary code-text mb-3">Self-DEV</h5>
                    <p class="text-light mb-0">Compartilhando conhecimento e experiências em desenvolvimento web.</p>
                </div>
                
                <div class="col-lg-4">
                    <div class="code-comment mb-3">// Links rápidos</div>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ route('home') }}" class="code-link">Home</a></li>
                        <li><a href="{{ route('about') }}" class="code-link">Sobre</a></li>
                        <li><a href="{{ route('contact') }}" class="code-link">Contato</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <div class="code-comment mb-3">// Conecte-se</div>
                    <div class="social-links">
                        <a href="#" class="tech-icon me-2" title="GitHub">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="tech-icon me-2" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="tech-icon" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-top border-secondary mt-4 pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="code-comment">&copy; {{ date('Y') }} Self-DEV</div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="code-comment">Feito com <i class="fas fa-heart text-danger"></i> e muito <i class="fas fa-coffee text-warning"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
