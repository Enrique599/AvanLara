<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de Pago — Sistema DAV</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <!-- SIDEBAR -->
  <nav id="sb">
    <div class="sb-head">
      <div class="logo-c"><img src="../img/logo.jpeg" style="width:34px;height:34px;border-radius:50%;object-fit:cover;" onerror="this.style.display='none';this.parentElement.textContent='⚙'"></div>
      <div class="logo-t">SistemaCRUD</div>
    </div>
    <div class="sb-user">
      <div class="av">CM</div>
      <div>
        <div class="un">Carlos Morales</div>
        <div class="ur">Administrador</div>
      </div>
    </div>

    <div class="sb-lbl">Principal</div>
    <a href="dashboard.html" class="ni ">
      <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>

    <div class="sb-lbl">Operatividad</div>

    <a href="ventas.html" class="ni ">
      <i class="fas fa-dollar-sign"></i><span>Ventas</span>
    </a>

    <a href="pedidos-clientes.html" class="ni ">
      <i class="fas fa-box"></i><span>Pedidos de clientes</span>
    </a>

    <a href="pedidos-proveedores.html" class="ni ">
      <i class="fas fa-truck-loading"></i><span>Pedidos a proveedores</span>
    </a>

    <a href="registro-proveedores.html" class="ni ">
      <i class="fas fa-clipboard-list"></i><span>Registro proveedores</span>
    </a>

    <a href="validacion-pago.html" class="ni act">
      <i class="fas fa-money-check-dollar"></i><span>Validación de pago</span>
    </a>

    <div class="sb-lbl">Catálogos</div>

    <a href="clientes.html" class="ni ">
      <i class="fas fa-users"></i><span>Clientes</span>
    </a>

    <a href="prendas.html" class="ni ">
      <i class="fas fa-shirt"></i><span>Prendas</span>
    </a>

    <a href="productos.html" class="ni ">
      <i class="fas fa-box-open"></i><span>Productos</span>
    </a>

    <a href="usuarios.html" class="ni ">
      <i class="fas fa-user-gear"></i><span>Usuarios</span>
    </a>

    <a href="inventario.html" class="ni ">
      <i class="fas fa-warehouse"></i><span>Inventario</span>
    </a>

    <a href="#" class="ni">
      <i class="fas fa-truck"></i><span>Proveedores</span>
    </a>

    <div class="sb-lbl">Sistema</div>
    <a href="respaldar-bd.html" class="ni ">
      <i class="fas fa-download"></i><span>Respaldar BD</span>
    </a>
    <a href="restaurar-bd.html" class="ni ">
      <i class="fas fa-upload"></i><span>Restaurar BD</span>
    </a>
    <a href="reporte-pdf.html" class="ni ">
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
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <style>
    .pago-badge { padding:4px 12px; border-radius:20px; font-size:11px; font-weight:800; letter-spacing:.5px; }
    </style>

    <div id="content">

<div class="ptitle">Validación de Pago</div>
<div class="psub">☀️ ¡Buenos días! — Gestiona y valida el estado de pago de las ventas</div>

<div class="stat-grid" style="margin-bottom:20px">
  <div class="sc sc-green"><div><div class="sc-val">18</div><div class="sc-lbl">Pagados</div></div><i class="fas fa-check-circle sc-icon"></i></div>
  <div class="sc sc-amber"><div><div class="sc-val">5</div><div class="sc-lbl">Pendientes</div></div><i class="fas fa-clock sc-icon"></i></div>
  <div class="sc sc-teal"><div><div class="sc-val">2</div><div class="sc-lbl">Pago parcial</div></div><i class="fas fa-adjust sc-icon"></i></div>
  <div class="sc sc-red"><div><div class="sc-val">$3,450.00</div><div class="sc-lbl">Monto pendiente</div></div><i class="fas fa-dollar-sign sc-icon"></i></div>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-money-check-dollar" style="color:var(--accent)"></i> Ventas — Estado de pago</div></div>
  <table>
    <thead><tr><th>ID</th><th>Cliente</th><th>Fecha</th><th>Total</th><th>Método</th><th>Estado pago</th><th>Validar</th></tr></thead>
    <tbody>
      <tr><td>#342</td><td>Ana López Ramos</td><td>2026-09-04</td><td><strong>$650.00</strong></td><td>EFECTIVO</td>
        <td><span class="pago-badge" style="background:#22d3a522;color:#22d3a5">✅ PAGADO</span></td>
        <td><button class="btn btn-sm btn-primary" onclick="abrirModal(342,'PAGADO','EFECTIVO')"><i class="fas fa-pen"></i> Validar</button></td></tr>
      <tr><td>#341</td><td>Jorge Pérez Cano</td><td>2026-09-03</td><td><strong>$1,200.00</strong></td><td>—</td>
        <td><span class="pago-badge" style="background:#f7c94822;color:#f7c948">⏳ PENDIENTE</span></td>
        <td><button class="btn btn-sm btn-primary" onclick="abrirModal(341,'PENDIENTE','EFECTIVO')"><i class="fas fa-pen"></i> Validar</button></td></tr>
    </tbody>
  </table>
</div>

<div class="modal-overlay" id="modalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:9999;align-items:center;justify-content:center">
  <div class="modal-box" style="background:var(--card);border:1px solid var(--border);border-radius:16px;padding:32px;min-width:380px;max-width:480px">
    <div class="modal-title" style="font-size:18px;font-weight:700;color:var(--text);margin-bottom:20px"><i class="fas fa-money-check-dollar" style="color:var(--accent)"></i> Validar pago — Venta #<span id="modalId"></span></div>
    <form action="#" method="post" onsubmit="return false">
      <div class="fg" style="margin-bottom:14px"><label>Estado del pago</label>
        <select class="fc" id="modalEstado">
          <option value="PENDIENTE">⏳ Pendiente</option><option value="PAGADO">✅ Pagado</option>
          <option value="PARCIAL">🔶 Pago parcial</option><option value="CANCELADO">❌ Cancelado</option>
        </select></div>
      <div class="fg" style="margin-bottom:14px"><label>Método de pago</label>
        <select class="fc" id="modalMetodo">
          <option value="EFECTIVO">💵 Efectivo</option><option value="TRANSFERENCIA">🏦 Transferencia</option>
          <option value="TARJETA">💳 Tarjeta</option><option value="CHEQUE">📄 Cheque</option>
        </select></div>
      <div class="fg" style="margin-bottom:18px"><label>Notas (opcional)</label><input class="fc" type="text" placeholder="Referencia, folio, etc."></div>
      <div style="display:flex;gap:10px">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
        <button type="button" class="btn btn-outline" onclick="cerrarModal()">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
function abrirModal(id, estado, metodo) {
  document.getElementById('modalId').textContent = id;
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
