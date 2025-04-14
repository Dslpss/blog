@extends('layouts.app')

@section('content')
<div class="hero-section position-relative mb-5 d-flex align-items-center">
    <div class="container position-relative">
        <div class="row">
            <div class="col-md-8 text-white">
                <div class="fade-in-up" style="--delay: 0s">
                    <span class="code-text">$ echo "Welcome to Self-DEV!"</span>
                </div>
                <div class="fade-in-up" style="--delay: 0.3s">
                    <h1 class="display-4 fw-bold mb-4">Self-DEV</h1>
                </div>
                <div class="fade-in-up" style="--delay: 0.6s">
                    <p class="lead mb-4">Aprenda, Desenvolva, Compartilhe</p>
                </div>
                
                <div class="tech-stack mb-4 fade-in-up" style="--delay: 0.9s">
                    <div class="tech-icon">
                        <i class="fab fa-laravel"></i>
                    </div>
                    <div class="tech-icon">
                        <i class="fab fa-php"></i>
                    </div>
                    <div class="tech-icon">
                        <i class="fab fa-js"></i>
                    </div>
                    <div class="tech-icon">
                        <i class="fab fa-html5"></i>
                    </div>
                    <div class="tech-icon">
                        <i class="fab fa-css3-alt"></i>
                    </div>
                </div>

                <div class="fade-in-up" style="--delay: 1.2s">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-light btn-lg px-5">
                        <i class="fas fa-code me-2"></i> Explorar Código
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Estatísticas -->
<div class="stats-section py-5 mb-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="stat-item">
                    <i class="fas fa-file-code fa-2x mb-3"></i>
                    <h3 class="counter">{{ $postsCount }}</h3>
                    <p>Posts Publicados</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <i class="fas fa-folder fa-2x mb-3"></i>
                    <h3 class="counter">{{ $categoriesCount }}</h3>
                    <p>Categorias</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <i class="fas fa-code-branch fa-2x mb-3"></i>
                    <h3 class="counter">10+</h3>
                    <p>Tecnologias</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <h3 class="counter">1000+</h3>
                    <p>Desenvolvedores</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Featured Posts -->
    <section class="mb-5 fade-in-up">
        <h2 class="section-title">Posts em Destaque</h2>
        <div class="row g-4">
            @foreach($featuredPosts ?? [] as $post)
            <div class="col-md-4">
                <div class="card post-card h-100">
                    <img src="{{ $post->poster_url }}" class="card-img-top post-img" alt="{{ $post->title }}">
                    <div class="card-body">
                        <div class="post-category">{{ $post->category->name }}</div>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary btn-sm">Ler mais</a>
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <div class="row">
        <!-- Latest Posts -->
        <div class="col-lg-8">
            <h2 class="section-title">Últimos Posts</h2>
            @foreach($posts ?? [] as $post)
            <article class="post-list-item mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $post->poster_url }}" class="img-fluid rounded" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="post-category">{{ $post->category->name }}</div>
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->excerpt, 150) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-link px-0">Continue lendo →</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-widget">
                <h4>Categorias</h4>
                <ul class="category-list">
                    @foreach($categories ?? [] as $category)
                    <li>
                        <a href="{{ route('posts.category', $category) }}" class="d-flex justify-content-between align-items-center">
                            {{ $category->name }}
                            <span class="badge bg-primary rounded-pill">{{ $category->posts_count ?? 0 }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section class="cta-section py-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="terminal-text mb-2">init dev_journey.sh</div>
                        <h2 class="text-white mb-4 display-5 fw-bold">Pronto para Começar?</h2>
                        <p class="text-white-50 mb-4 lead">Join our developer community and start your coding journey today!</p>
                        <div class="d-flex gap-3 justify-content-center">
                            <a href="{{ route('contact') }}" class="btn btn-lg px-5 py-3">
                                <i class="fas fa-code me-2"></i>
                                start_coding()
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
