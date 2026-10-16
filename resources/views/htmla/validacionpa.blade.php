<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de Pago — Sistema DAV</title>
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

    <a href="{{ route('admin.validacion-pago.index') }}" class="ni act">
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
      <div class="tb-title">Validación de Pago</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Validación de Pago</span>
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

<style>.pago-badge{padding:4px 12px;border-radius:20px;font-size:11px;font-weight:800;letter-spacing:.5px}</style>
<div class="ptitle">Validación de Pago</div>
<div class="psub">{{ $saludo }} — Gestiona y valida el estado de pago de las ventas</div>

<div class="stat-grid" style="margin-bottom:20px">
  <div class="sc sc-green"><div><div class="sc-val">{{ $pagados }}</div><div class="sc-lbl">Pagados</div></div><i class="fas fa-check-circle sc-icon"></i></div>
  <div class="sc sc-amber"><div><div class="sc-val">{{ $pendientes }}</div><div class="sc-lbl">Pendientes</div></div><i class="fas fa-clock sc-icon"></i></div>
  <div class="sc sc-teal"><div><div class="sc-val">{{ $parciales }}</div><div class="sc-lbl">Pago parcial</div></div><i class="fas fa-adjust sc-icon"></i></div>
  <div class="sc sc-red"><div><div class="sc-val">${{ number_format($montoPendiente, 2) }}</div><div class="sc-lbl">Monto pendiente</div></div><i class="fas fa-dollar-sign sc-icon"></i></div>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-money-check-dollar" style="color:var(--accent)"></i> Ventas — Estado de pago</div></div>
  <table>
    <thead><tr><th>ID</th><th>Cliente</th><th>Fecha</th><th>Total</th><th>Método</th><th>Estado pago</th><th>Validar</th></tr></thead>
    <tbody>
      @foreach($ventas as $v)
      @php
        $est = [
          'PAGADO'    => ['#22d3a5', '✅ PAGADO'],   'PENDIENTE' => ['#f7c948', '⏳ PENDIENTE'],
          'PARCIAL'   => ['#4f8ef7', '🔶 PARCIAL'],  'CANCELADO' => ['#f75e5e', '❌ CANCELADO'],
        ][$v->estado_pago] ?? ['#7a8099', $v->estado_pago];
      @endphp
      <tr><td>#{{ $v->Id_venta }}</td><td>{{ $v->cliente?->nombre_completo ?? '—' }}</td><td>{{ $v->Fecha->format('Y-m-d') }}</td><td><strong>${{ number_format($v->Total, 2) }}</strong></td>
        <td>{{ $v->metodo_pago ?: '—' }}</td>
        <td><span class="pago-badge" style="background:{{ $est[0] }}22;color:{{ $est[0] }}">{{ $est[1] }}</span></td>
        <td><button type="button" class="btn btn-sm btn-primary" onclick="abrirModal({{ $v->Id_venta }},'{{ $v->estado_pago }}','{{ $v->metodo_pago ?: 'EFECTIVO' }}')"><i class="fas fa-pen"></i> Validar</button></td></tr>
      @endforeach
      @if($ventas->isEmpty())<tr><td colspan="7" style="text-align:center;color:var(--muted);padding:24px">No hay ventas registradas.</td></tr>@endif
    </tbody>
  </table>
</div>

<div class="modal-overlay" id="modalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:9999;align-items:center;justify-content:center">
  <div class="modal-box" style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:32px;min-width:380px;max-width:480px">
    <div class="modal-title" style="font-size:18px;font-weight:700;color:var(--text);margin-bottom:20px"><i class="fas fa-money-check-dollar" style="color:var(--accent)"></i> Validar pago — Venta #<span id="modalId"></span></div>
    <form id="formPago" action="#" method="post">
      @csrf @method('PUT')
      <div class="fg" style="margin-bottom:14px"><label>Estado del pago</label>
        <select class="fc" id="modalEstado" name="estado_pago">
          <option value="PENDIENTE">⏳ Pendiente</option><option value="PAGADO">✅ Pagado</option>
          <option value="PARCIAL">🔶 Pago parcial</option><option value="CANCELADO">❌ Cancelado</option>
        </select></div>
      <div class="fg" style="margin-bottom:14px"><label>Método de pago</label>
        <select class="fc" id="modalMetodo" name="metodo_pago">
          <option value="EFECTIVO">💵 Efectivo</option><option value="TRANSFERENCIA">🏦 Transferencia</option>
          <option value="TARJETA">💳 Tarjeta</option><option value="CHEQUE">📄 Cheque</option>
        </select></div>
      <div class="fg" style="margin-bottom:18px"><label>Notas (opcional, máx. 10)</label><input class="fc" type="text" name="notas" maxlength="10" placeholder="Folio, ref."></div>
      <div style="display:flex;gap:10px">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-outline" onclick="cerrarModal()">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
const urlPago = "{{ url('admin/validacion-pago') }}";
function abrirModal(id, estado, metodo) {
  document.getElementById('modalId').textContent = id;
  document.getElementById('formPago').action = urlPago + '/' + id;
  document.getElementById('modalEstado').value = estado;
  document.getElementById('modalMetodo').value = metodo;
  document.getElementById('modalOverlay').style.display = 'flex';
}
function cerrarModal(){ document.getElementById('modalOverlay').style.display = 'none'; }
document.getElementById('modalOverlay').addEventListener('click', function(e){ if(e.target === this) cerrarModal(); });
</script>

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
