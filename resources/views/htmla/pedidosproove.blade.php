<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedidos a Proveedores — Sistema DAV</title>
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

    <a href="pedidos-proveedores.html" class="ni act">
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
      <div class="tb-title">Pedidos a Proveedores</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Pedidos a Proveedores</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div class="ptitle">Pedidos a Proveedores</div>
<div class="psub">Registro de pedidos realizados a proveedores</div>

<div class="fcard" style="margin-bottom:20px">
  <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:14px"><i class="fas fa-truck-loading" style="color:var(--accent2)"></i> Registrar pedido a proveedor</div>
  <form action="#" method="post" onsubmit="return false">
    <div class="fgrid">
      <div class="fg"><label>Proveedor *</label><select class="fc" required><option value="">— Selecciona proveedor —</option><option>1 - Textiles del Centro</option></select></div>
      <div class="fg"><label>Fecha *</label><input class="fc" type="date" required></div>
      <div class="fg"><label>Total ($) *</label><input class="fc" type="number" step="0.01" placeholder="0.00" required></div>
      <div class="fg"><label>Total piezas *</label><input class="fc" type="number" placeholder="0" required></div>
      <div class="fg"><label>Estado</label><select class="fc"><option>Pendiente</option><option>Enviado</option><option>Recibido</option><option>Cancelado</option></select></div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar pedido</button>
  </form>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-truck-loading" style="color:var(--accent2)"></i> Pedidos realizados</div></div>
  <table>
    <thead><tr><th>ID</th><th>Proveedor</th><th>Teléfono</th><th>Fecha</th><th>Total</th><th>Piezas</th><th>Estado</th><th>Eliminar</th></tr></thead>
    <tbody>
      <tr><td>#12</td><td>Textiles del Centro</td><td>2225557890</td><td>2026-09-01</td><td>$8,500.00</td><td>200</td>
        <td><span style="background:#4f8ef722;color:#4f8ef7;padding:3px 12px;border-radius:20px;font-size:11px;font-weight:800">ENVIADO</span></td><td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
      <tr><td>#11</td><td>Confecciones Puebla</td><td>2221239900</td><td>2026-08-25</td><td>$5,200.00</td><td>120</td>
        <td><span style="background:#22d3a522;color:#22d3a5;padding:3px 12px;border-radius:20px;font-size:11px;font-weight:800">RECIBIDO</span></td><td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
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
