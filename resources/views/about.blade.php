@extends('layouts.app')

@section('title', 'Sobre Nós')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="display-4 mb-4">Sobre Nós</h1>
            <p class="lead">Compartilhando conhecimento e experiências no mundo do desenvolvimento web. Nossa missão é tornar o aprendizado de programação mais acessível e prático.</p>
        </div>
    </div>

    <!-- Features -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-code fs-2 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Desenvolvimento Web</h3>
                    <p class="text-muted">Tutoriais e dicas sobre as melhores práticas em desenvolvimento web moderno.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-laptop-code fs-2 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Laravel</h3>
                    <p class="text-muted">Conteúdo especializado em Laravel e seu ecossistema de desenvolvimento.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-users fs-2 text-primary"></i>
                    </div>
                    <h3 class="h4 mb-3">Comunidade</h3>
                    <p class="text-muted">Uma comunidade ativa de desenvolvedores compartilhando conhecimento.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="bg-primary text-white p-5 rounded-3 text-center">
                <h2 class="mb-4">Junte-se à Nossa Comunidade</h2>
                <p class="lead mb-4">Aprenda, compartilhe e cresça conosco!</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Entre em Contato</a>
            </div>
        </div>
    </div>
</div>
@endsection
