@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title mb-4">{{ isset($post) ? 'Editar Post' : 'Novo Post' }}</h2>
            
            <form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                @if(isset($post)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $post->title ?? '') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                @selected(old('category_id', $post->category_id ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Poster</label>
                    <input type="file" name="poster" class="form-control @error('poster') is-invalid @enderror">
                    @if(isset($post) && $post->poster)
                        <img src="{{ $post->poster_url }}" class="mt-2" style="max-height: 200px">
                    @endif
                    @error('poster')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Resumo</label>
                    <textarea name="excerpt" class="form-control @error('excerpt') is-invalid @enderror" rows="2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Conteúdo</label>
                    <textarea name="content" rows="5" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
