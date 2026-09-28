<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — DAV Tienda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/inicioses.css">
</head>
<body>

<header class="site-header">
    <img src="../img/logo.jpg" alt="Logo">
    <div class="brand">DAV <span>Tienda</span></div>
</header>

<div class="card-wrap">
    <h1>Iniciar sesión</h1>
    <p class="subtitle">Bienvenido de vuelta</p>

    <div class="form-card">

        <form action="tienda.html" method="get">
            <div class="fg">
                <label>Teléfono</label>
                <div class="icon-input"><span>📞</span>
                <input type="tel" name="telefono" placeholder="Tu número de teléfono" required autofocus></div>
            </div>

            <div class="fg">
                <label>Contraseña</label>
                <div class="icon-input"><span>🔒</span>
                <input type="password" name="contrasena" placeholder="Tu contraseña" required></div>
            </div>

            <div class="recover-link">
                <a href="recuperar-password.html">¿Olvidaste tu contraseña?</a>
            </div>

            <div class="btn-row">
                <button type="submit" class="btn-primary">→ Entrar</button>
                <a href="inicio.html" class="btn-cancel">✖ Cancelar</a>
            </div>
        </form>

        <div class="divider">— ¿No tienes cuenta? —</div>
        <div class="link-register"><a href="crear-cuenta.html">Crear cuenta nueva</a></div>

    </div>
</div>

</body>
</html>
