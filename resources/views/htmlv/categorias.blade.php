<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/categorias.css') }}">
</head>
<body>

<div class="contenedor">

    <header>
        <div class="top-header">
            <div class="logo">
                <img src="{{ asset('img/logo.jpg') }}" alt="Logo de Ventas">
            </div>

            <div class="barra-busqueda">
                <input type="text" placeholder="Buscar">
                <span>🔍</span>
            </div>
        </div>

        <nav>
            <a href="{{ route('tienda.categorias') }}">Categorías</a>
            <a href="#">Ofertas</a>
            @if(session('cliente_id'))
            <a href="{{ route('tienda.tienda') }}">Mi tienda</a>
            <a href="#" onclick="document.getElementById('logout').submit();return false">Cerrar sesión</a>
            <form id="logout" action="{{ route('tienda.logout') }}" method="post" style="display:none">@csrf</form>
            @else
            <a href="{{ route('tienda.login') }}">Iniciar sesión</a>
            <a href="{{ route('tienda.registro') }}">Crear Cuenta</a>
            @endif
        </nav>
    </header>

    <div class="categorias-titulo">Categorías</div>

    <section class="categorias-grid">
        @forelse($categorias as $cat)
        <a href="#" class="categoria-card">
            <img src="{{ asset('img/' . $imagenes[$loop->index % count($imagenes)]) }}" alt="{{ $cat->Nombre }}">
            <div class="nombre">{{ $cat->Nombre }}</div>
            <div class="cantidad">{{ $cat->productos_count }} {{ $cat->productos_count == 1 ? 'producto' : 'productos' }}</div>
        </a>
        @empty
        <p>No hay categorías registradas.</p>
        @endforelse
    </section>

    <footer>
        <p>Visítanos en:</p>
        <p>C. Reforma, San Lucas Atoyatenco,</p>
        <p>74053 San Martín Texmelucan de Labastida Puebla</p>
    </footer>

</div>

</body>
</html>
