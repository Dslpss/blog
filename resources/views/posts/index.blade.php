@extends('layouts.app')

@section('title', isset($currentCategory) ? $currentCategory->name : 'Posts')

@section('content')
<div class="container py-4">
    <div class="row">
        <!-- Lista de Posts -->
        <div class="col-md-8">
            <h2 class="mb-4">
                {{ isset($currentCategory) ? $currentCategory->name : 'Todos os Posts' }}
            </h2>
            
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <img src="{{ $post->poster_url }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Ler mais</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{ $posts->links() }}
        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                        <li class="mb-2">
                            <a href="{{ route('posts.category', $category) }}" class="text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
