@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5 text-center">
                    <div class="code-comment mb-4"># Iniciar comunicação</div>
                    <h1 class="display-5 mb-4 code-text">contact.init()</h1>
                    
                    <p class="lead mb-5">Pronto para começar? Entre em contato via WhatsApp!</p>
                    
                    <a href="https://wa.me/5534997220530?text=Olá! Vim pelo site Self-DEV" 
                       target="_blank"
                       class="btn btn-primary btn-lg whatsapp-btn">
                        <i class="fab fa-whatsapp me-2"></i>
                        whatsapp.connect()
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
