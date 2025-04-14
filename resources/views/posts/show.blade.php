@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article>
                @if($post->poster)
                <img src="{{ $post->poster_url }}" class="img-fluid rounded mb-4" alt="{{ $post->title }}">
                @endif

                <h1 class="mb-4">{{ $post->title }}</h1>
                
                <div class="mb-3 text-muted">
                    <small>
                        Categoria: <a href="{{ route('posts.category', $post->category) }}">{{ $post->category->name }}</a>
                        | {{ $post->created_at->format('d/m/Y') }}
                    </small>
                </div>

                <div class="content">
                    {{ $post->content }}
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
