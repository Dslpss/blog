<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Painel Administrativo - {{ config('app.name') }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-white">
            <div class="sidebar-header">
                <h3>Painel Admin</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="nav-link text-white">
                        Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                        Categorias
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div id="content" class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" class="btn btn-dark" id="sidebarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            @yield('content')
        </div>
    </div>
</body>
</html>
