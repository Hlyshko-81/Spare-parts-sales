<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Магазин Запчастин')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">AutoParts</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Головна</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('parts.index') }}">Каталог запчастин</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Про нас</a></li>
                </ul>
                
                <div class="d-flex">
                    <a href="{{ route('admin.parts.index') }}" class="btn btn-warning btn-sm">⚙️ Адмін-панель</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; {{ date('Y') }} Магазин Автозапчастин. Усі права захищено.</p>
    </footer>
</body>
</html>