<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta — DAV Tienda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cuenta.css">
</head>
<body>

    <header class="site-header">
        <img src="../img/logo.jpg" alt="Logo">
        <div class="brand">DAV <span>Tienda</span></div>
    </header>

    <div class="card-wrap">
        <h1>Crear cuenta</h1>
        <p class="subtitle">Regístrate para empezar a comprar</p>

        <div class="form-card">

            <form action="crear-cuenta-exito.html" method="get">
                <div class="form-row">
                    <div class="fg">
                        <label>Nombre</label>
                        <div class="icon-input"><span>👤</span>
                            <input type="text" name="nombre" placeholder="Tu nombre" required>
                        </div>
                    </div>
                    <div class="fg">
                        <label>Apellido Paterno</label>
                        <div class="icon-input"><span>👥</span>
                            <input type="text" name="paterno" placeholder="Apellido" required>
                        </div>
                    </div>
                </div>

                <div class="fg">
                    <label>Teléfono (se usará para iniciar sesión)</label>
                    <div class="icon-input"><span>📞</span>
                        <input type="tel" name="telefono" placeholder="10 dígitos" maxlength="10" pattern="[0-9]{10}"
                               title="Por favor, introduce exactamente 10 dígitos numéricos." required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="fg">
                        <label>Contraseña</label>
                        <div class="icon-input"><span>🔒</span>
                            <input type="password" name="contrasena" placeholder="Mínimo 6 caracteres" required>
                        </div>
                    </div>
                    <div class="fg">
                        <label>Confirmar contraseña</label>
                        <div class="icon-input"><span>🔑</span>
                            <input type="password" name="confirmar" placeholder="Repite la contraseña" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="fg">
                        <label>Dirección</label>
                        <div class="icon-input"><span>🏠</span>
                            <input type="text" name="direccion" placeholder="Tu dirección" required>
                        </div>
                    </div>
                    <div class="fg">
                        <label>Código Postal</label>
                        <div class="icon-input"><span>📮</span>
                            <input type="text" name="cp" placeholder="5 dígitos" maxlength="5" required>
                        </div>
                    </div>
                </div>

                <div class="btn-row">
                    <button type="submit" class="btn-primary">✅ Crear cuenta</button>
                    <a href="inicio.html" class="btn-cancel">✖ Cancelar</a>
                </div>
            </form>

            <div class="divider">— ¿Ya tienes cuenta? —</div>
            <div class="link-login"><a href="login.html">Iniciar sesión aquí</a></div>

        </div>
    </div>

</body>
</html>
