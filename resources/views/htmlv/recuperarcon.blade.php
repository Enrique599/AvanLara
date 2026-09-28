<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña — DAV Tienda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/recuperar.css">
</head>
<body>

<header class="site-header">
    <img src="../img/logo.jpg" alt="Logo">
    <div class="brand">DAV <span>Tienda</span></div>
</header>

<div class="card-wrap">

    <div class="steps">
        <div class="step-dot active">1</div>
        <div class="step-line"></div>
        <div class="step-dot">2</div>
        <div class="step-line"></div>
        <div class="step-dot">3</div>
    </div>

    <h1>🔑 Recuperar contraseña</h1>
    <p class="subtitle">Verifica tu número de teléfono</p>

    <div class="form-card">

        <form action="recuperar-password-paso2.html" method="get">
            <div class="fg">
                <label>Número de teléfono</label>
                <div class="icon-input"><span>📞</span>
                <input type="tel" name="telefono" placeholder="El teléfono de tu cuenta" required autofocus></div>
                <span class="help-text">Ingresa el número con el que creaste tu cuenta</span>
            </div>

            <button type="submit" class="btn-primary">🔍 Buscar cuenta</button>
            <a href="login.html" class="btn-back">← Volver al inicio de sesión</a>
        </form>

    </div>
</div>

</body>
</html>
