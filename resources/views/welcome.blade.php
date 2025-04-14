@extends('layouts.app')

@section('content')
<!-- Hero Section com Background -->
<div class="hero-section position-relative mb-5">
    <div class="overlay"></div>
    <div class="container position-relative">
        <div class="row min-vh-50 align-items-center">
            <div class="col-md-8 text-white">
                <h1 class="display-4 fw-bold">Bem-vindo ao nosso Blog</h1>
                <p class="lead">Compartilhando conhecimento e experiências sobre desenvolvimento web</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Featured Posts -->
    <section class="mb-5">
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
@endsection
