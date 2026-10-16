<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — DAV Tienda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/inicioses.css') }}">
</head>
<body>

<header class="site-header">
    <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
    <div class="brand">DAV <span>Tienda</span></div>
</header>

<div class="card-wrap">
    <h1>Iniciar sesión</h1>
    <p class="subtitle">Bienvenido de vuelta</p>

    <div class="form-card">

        <form action="{{ route('tienda.login.post') }}" method="post">
            @csrf
            @if(session('err'))<div style="background:#fde2e2;color:#b00020;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:14px">{{ session('err') }}</div>@endif
        @if($errors->any())<div style="background:#fde2e2;color:#b00020;padding:10px 14px;border-radius:8px;margin-bottom:14px;font-size:14px">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
            <div class="fg">
                <label>Teléfono</label>
                <div class="icon-input"><span>📞</span>
                <input type="tel" name="telefono" placeholder="Tu número de teléfono" value="{{ old('telefono') }}" required autofocus></div>
            </div>

            <div class="fg">
                <label>Contraseña</label>
                <div class="icon-input"><span>🔒</span>
                <input type="password" name="contrasena" placeholder="Tu contraseña" required></div>
            </div>

            <div class="recover-link">
                <a href="{{ route('tienda.recuperar') }}">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="btn-row">
                <button type="submit" class="btn-primary">→ Entrar</button>
                <a href="{{ route('tienda.inicio') }}" class="btn-cancel">✖ Cancelar</a>
            </div>
        </form>

        <div class="divider">— ¿No tienes cuenta? —</div>
        <div class="link-register"><a href="{{ route('tienda.registro') }}">Crear cuenta nueva</a></div>

    </div>
</div>

</body>
</html>
