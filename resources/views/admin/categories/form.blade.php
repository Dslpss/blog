@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ isset($category) ? 'Editar' : 'Nova' }} Categoria</h2>
            
            <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST">
                @csrf
                @if(isset($category)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
