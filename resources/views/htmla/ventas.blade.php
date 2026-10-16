<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Ventas — Sistema DAV</title>
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

    <a href="{{ route('admin.ventas.index') }}" class="ni act">
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
    <a href="{{ route('admin.restaurar.index') }}" class="ni ">
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
      <div class="tb-title">Registro de Ventas</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Registro de Ventas</span>
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

<div class="ptitle">Registro de Ventas</div>
<div class="psub">Registra y consulta las ventas realizadas</div>

<div class="fcard">
  @php $e = $editar ?? null; @endphp
  <form action="{{ $e ? route('admin.ventas.update', $e) : route('admin.ventas.store') }}" method="post">
    @csrf
    @if($e) @method('PUT') @endif
    <div class="fgrid">
      <div class="fg"><label>Fecha *</label><input class="fc" type="date" name="fecha" value="{{ old('fecha', $e ? $e->Fecha->format('Y-m-d') : now()->format('Y-m-d')) }}" required></div>
      <div class="fg"><label>Realización *</label><input class="fc" type="text" name="realizacion" maxlength="40" placeholder="Descripción" value="{{ old('realizacion', $e->Realizacion ?? '') }}" required></div>
      <div class="fg"><label>Total ($) *</label><input class="fc" type="number" step="0.01" min="0" name="total" placeholder="0.00" value="{{ old('total', $e->Total ?? '') }}" required></div>
      <div class="fg"><label>Cliente *</label>
        <select class="fc" name="id_cliente" required>
          <option value="">-- Selecciona Cliente --</option>
          @foreach($clientes as $c)
          <option value="{{ $c->Id_cliente }}" @selected(old('id_cliente', $e->Id_cliente ?? '') == $c->Id_cliente)>{{ $c->Id_cliente }} - {{ $c->nombre_completo }}</option>
          @endforeach
        </select>
      </div>
      <div class="fg"><label>Total Piezas *</label><input class="fc" type="number" min="0" name="total_piezas" placeholder="0" value="{{ old('total_piezas', $e->Total_piezas ?? '') }}" required></div>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{ $e ? 'Actualizar Venta' : 'Guardar Venta' }}</button>
    @if($e)<a href="{{ route('admin.ventas.index') }}" class="btn btn-outline"><i class="fas fa-times"></i> Cancelar edición</a>@endif
  </form>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-list" style="color:var(--green)"></i> Lista de Ventas</div></div>
  <table>
    <thead><tr><th>ID Venta</th><th>Fecha</th><th>Realización</th><th>Total</th><th>Cliente</th><th>Total Piezas</th><th>Eliminar</th><th>Modificar</th></tr></thead>
    <tbody>
      @foreach($ventas as $v)
      <tr><td>#{{ $v->Id_venta }}</td><td>{{ $v->Fecha->format('Y-m-d') }}</td>
        <td>@if(\Illuminate\Support\Str::startsWith($v->Realizacion, 'PAGO:')) Pago: {{ explode(':', $v->Realizacion)[1] ?? '' }} @else {{ $v->Realizacion }} @endif</td>
        <td>${{ number_format($v->Total, 2) }}</td><td>{{ $v->cliente?->nombre_completo ?? '—' }}</td><td>{{ $v->Total_piezas }}</td>
        <td><form action="{{ route('admin.ventas.destroy', $v) }}" method="post" style="display:inline" onsubmit="return confirm('¿Eliminar este registro?')">@csrf @method('DELETE')<button type="submit" class="ib ib-del" title="Eliminar"><i class="fas fa-times"></i></button></form></td>
        <td><a href="{{ route('admin.ventas.edit', $v) }}" class="ib ib-edit" title="Modificar"><i class="fas fa-pencil-alt"></i></a></td></tr>
      @endforeach
      @if($ventas->isEmpty())<tr><td colspan="8" style="text-align:center;color:var(--muted);padding:24px">No hay ventas registradas.</td></tr>@endif
    </tbody>
  </table>
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
