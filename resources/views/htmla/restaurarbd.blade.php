<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurar Base de Datos — Sistema DAV</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- SIDEBAR -->
  <nav id="sb">
    <div class="sb-head">
      <div class="logo-c"><img src="{{ asset('img/logo.jpeg') }}" style="width:34px;height:34px;border-radius:50%;object-fit:cover;" onerror="this.style.display='none';this.parentElement.textContent='⚙'"></div>
      <div class="logo-t">SistemaCRUD</div>
    </div>
    <div class="sb-user">
      <div class="av">{{ collect(explode(' ', session('admin_nombre', 'Admin')))->map(fn($w) => mb_strtoupper(mb_substr($w, 0, 1)))->take(2)->implode('') }}</div>
      <div>
        <div class="un">{{ session('admin_nombre', 'Administrador') }}</div>
        <div class="ur">{{ ucfirst(session('admin_rol', 'admin')) }}</div>
      </div>
    </div>

    <div class="sb-lbl">Principal</div>
    <a href="{{ route('admin.dashboard') }}" class="ni ">
      <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>

    <div class="sb-lbl">Operatividad</div>

    <a href="{{ route('admin.ventas.index') }}" class="ni ">
      <i class="fas fa-dollar-sign"></i><span>Ventas</span>
    </a>

    <a href="{{ route('admin.pedidos-clientes.index') }}" class="ni ">
      <i class="fas fa-box"></i><span>Pedidos de clientes</span>
    </a>

    <a href="{{ route('admin.pedidos-proveedores.index') }}" class="ni ">
      <i class="fas fa-truck-loading"></i><span>Pedidos a proveedores</span>
    </a>

    <a href="{{ route('admin.proveedores.index') }}" class="ni ">
      <i class="fas fa-clipboard-list"></i><span>Registro proveedores</span>
    </a>

    <a href="{{ route('admin.validacion-pago.index') }}" class="ni ">
      <i class="fas fa-money-check-dollar"></i><span>Validación de pago</span>
    </a>

    <div class="sb-lbl">Catálogos</div>

    <a href="{{ route('admin.clientes.index') }}" class="ni ">
      <i class="fas fa-users"></i><span>Clientes</span>
    </a>

    <a href="{{ route('admin.prendas.index') }}" class="ni ">
      <i class="fas fa-shirt"></i><span>Prendas</span>
    </a>

    <a href="{{ route('admin.productos.index') }}" class="ni ">
      <i class="fas fa-box-open"></i><span>Productos</span>
    </a>

    <a href="{{ route('admin.usuarios.index') }}" class="ni ">
      <i class="fas fa-user-gear"></i><span>Usuarios</span>
    </a>

    <a href="{{ route('admin.inventario.index') }}" class="ni ">
      <i class="fas fa-warehouse"></i><span>Inventario</span>
    </a>

    <a href="{{ route('admin.proveedores.index') }}" class="ni">
      <i class="fas fa-truck"></i><span>Proveedores</span>
    </a>

    <div class="sb-lbl">Sistema</div>
    <a href="{{ route('admin.respaldo.index') }}" class="ni ">
      <i class="fas fa-download"></i><span>Respaldar BD</span>
    </a>
    <a href="{{ route('admin.restaurar.index') }}" class="ni act">
      <i class="fas fa-upload"></i><span>Restaurar BD</span>
    </a>
    <a href="{{ route('admin.reporte.index') }}" class="ni ">
      <i class="fas fa-file-pdf"></i><span>Reporte PDF</span>
    </a>
  </nav>

  <!-- MAIN -->
  <div id="main">
    <!-- TOPBAR -->
    <div class="topbar">
      <button class="tb-toggle" onclick="toggleSB()"><i class="fas fa-bars"></i></button>
      <div class="tb-title">Restaurar Base de Datos</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Restaurar Base de Datos</span>
      </div>
      <div class="tb-right">
                <form action="{{ route('admin.logout') }}" method="post" style="display:inline">@csrf<button type="submit" class="btn btn-sm btn-outline" title="Cerrar sesión"><i class="fas fa-sign-out-alt"></i> Salir</button></form>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

@if(session('ok'))<div class="alert alert-ok"><i class="fas fa-check-circle"></i> {{ session('ok') }}</div>@endif
@if(session('err'))<div class="alert alert-err"><i class="fas fa-exclamation-circle"></i> {{ session('err') }}</div>@endif
@if($errors->any())<div class="alert alert-err"><i class="fas fa-exclamation-circle"></i><div>@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div></div>@endif

<div class="ptitle">Restaurar Base de Datos</div>
<div class="psub">Importa un archivo .sql para restaurar los datos</div>

<div class="alert alert-warn" style="margin-bottom:18px">
  <i class="fas fa-exclamation-triangle"></i>
  <strong>Advertencia:</strong> Esta acción sobreescribirá la base de datos actual. No se puede deshacer.
</div>

<div class="fcard" style="max-width:500px">
  <form action="{{ route('admin.restaurar.store') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('Se sobreescribirá la base de datos actual. ¿Continuar?')">
    @csrf
    <div class="fg" style="margin-bottom:16px">
      <label>Selecciona un archivo .sql</label>
      <input class="fc" type="file" name="archivo" accept=".sql" required>
    </div>
    <div style="display:flex;gap:10px">
      <button type="submit" class="btn btn-orange"><i class="fas fa-upload"></i> Restaurar</button>
      <a href="{{ route('admin.dashboard') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </div>
  </form>
</div>

    </div><!-- end #content -->
  </div><!-- end #main -->

  <script>
  function toggleSB(){
    document.getElementById('sb').classList.toggle('col');
    document.body.classList.toggle('col-mode');
  }
  </script>
</body>
</html>
