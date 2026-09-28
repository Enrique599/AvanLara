<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedidos de Clientes — Sistema DAV</title>
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

    <a href="pedidos-clientes.html" class="ni act">
      <i class="fas fa-box"></i><span>Pedidos de clientes</span>
    </a>

    <a href="pedidos-proveedores.html" class="ni ">
      <i class="fas fa-truck-loading"></i><span>Pedidos a proveedores</span>
    </a>

    <a href="registro-proveedores.html" class="ni ">
      <i class="fas fa-clipboard-list"></i><span>Registro proveedores</span>
    </a>

    <a href="validacion-pago.html" class="ni ">
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
      <div class="tb-title">Pedidos de Clientes</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Pedidos de Clientes</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;flex-wrap:wrap;gap:10px">
  <div><div class="ptitle">Pedidos de Clientes</div>
  <div class="psub">Ordenados por prioridad — alertas automáticas por tiempo de espera</div></div>
</div>

<div style="display:flex;gap:10px;margin-bottom:18px;flex-wrap:wrap">
  <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted)"><span style="width:12px;height:12px;border-radius:50%;background:#ef4444;display:inline-block"></span> Urgente (+7 días)</div>
  <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted)"><span style="width:12px;height:12px;border-radius:50%;background:#f97316;display:inline-block"></span> Alta prioridad (3–6 días)</div>
  <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--muted)"><span style="width:12px;height:12px;border-radius:50%;background:#22c55e;display:inline-block"></span> Normal (0–2 días)</div>
</div>

<div class="fcard" style="margin-bottom:20px">
  <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:14px"><i class="fas fa-plus-circle" style="color:var(--accent)"></i> Registrar nuevo pedido</div>
  <form action="#" method="post" onsubmit="return false">
    <div class="fgrid">
      <div class="fg"><label>Cliente *</label><select class="fc" required><option value="">— Selecciona cliente —</option><option>128 - Ana López Ramos</option></select></div>
      <div class="fg"><label>Fecha del pedido *</label><input class="fc" type="date" required></div>
      <div class="fg"><label>Total ($) *</label><input class="fc" type="number" step="0.01" placeholder="0.00" required></div>
      <div class="fg"><label>Total piezas *</label><input class="fc" type="number" placeholder="0" required></div>
      <div class="fg"><label>Prioridad</label><select class="fc"><option value="NORMAL">Normal</option><option value="ALTA">Alta</option><option value="URGENTE">Urgente</option></select></div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar pedido</button>
  </form>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-box" style="color:var(--accent)"></i> Lista de Pedidos</div></div>
  <table>
    <thead><tr><th>#</th><th>Cliente</th><th>Teléfono</th><th>Fecha</th><th>Días espera</th><th>Total</th><th>Piezas</th><th>Prioridad</th><th>Acción</th></tr></thead>
    <tbody>
      <tr style="border-left:3px solid #ef4444">
        <td>21</td><td><strong>Ana López Ramos</strong></td><td>2481234567</td><td>2026-08-27</td>
        <td><span style="background:#ef444422;color:#ef4444;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700">9 días</span></td>
        <td>$650.00</td><td>3</td>
        <td><span style="background:#ef444422;color:#ef4444;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:800;letter-spacing:.5px">🚨 URGENTE</span></td>
        <td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
      <tr style="border-left:3px solid #22c55e">
        <td>22</td><td><strong>Jorge Pérez Cano</strong></td><td>2489876543</td><td>2026-09-04</td>
        <td><span style="background:#22c55e22;color:#22c55e;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700">1 día</span></td>
        <td>$1,200.00</td><td>6</td>
        <td><span style="background:#22c55e22;color:#22c55e;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:800;letter-spacing:.5px">✅ NORMAL</span></td>
        <td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
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
