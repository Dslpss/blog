@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="post-content">
                @if($post->poster)
                <div class="post-image-wrapper mb-4">
                    <img src="{{ $post->poster_url }}" class="img-fluid rounded shadow-lg" alt="{{ $post->title }}">
                </div>
                @endif

                <div class="post-meta mb-4">
                    <span class="post-category">{{ $post->category->name }}</span>
                    <span class="text-muted">
                        <i class="far fa-calendar-alt me-1"></i>
                        {{ $post->created_at->format('d/m/Y') }}
                    </span>
                </div>

                <h1 class="post-title display-4 fw-bold mb-4">{{ $post->title }}</h1>
                
                <div class="post-excerpt lead mb-4 text-muted">
                    {{ $post->excerpt }}
                </div>

                <div class="post-content">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <!-- Navegação entre posts -->
                <div class="post-navigation border-top border-bottom my-5 py-4">
                    <div class="row">
                        <div class="col-6">
                            @if($previousPost = \App\Models\Post::where('id', '<', $post->id)->latest('id')->first())
                                <a href="{{ route('posts.show', $previousPost) }}" class="text-decoration-none">
                                    <small class="text-muted d-block">Post Anterior</small>
                                    <span class="text-primary">← {{ Str::limit($previousPost->title, 30) }}</span>
                                </a>
                            @endif
                        </div>
                        <div class="col-6 text-end">
                            @if($nextPost = \App\Models\Post::where('id', '>', $post->id)->first())
                                <a href="{{ route('posts.show', $nextPost) }}" class="text-decoration-none">
                                    <small class="text-muted d-block">Próximo Post</small>
                                    <span class="text-primary">{{ Str::limit($nextPost->title, 30) }} →</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
