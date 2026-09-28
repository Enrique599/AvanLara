<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos — Sistema DAV</title>
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

    <a href="productos.html" class="ni act">
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
      <div class="tb-title">Productos</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Productos</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div class="ptitle">Productos</div>
<div class="psub">☀️ ¡Buenos días! — Catálogo y registro de productos</div>

<div class="stat-grid" style="margin-bottom:20px">
  <div class="sc sc-teal"><div><div class="sc-val">57</div><div class="sc-lbl">Productos registrados</div></div><i class="fas fa-box-open sc-icon"></i></div>
  <div class="sc sc-amber"><div><div class="sc-val">890</div><div class="sc-lbl">Unidades en stock total</div></div><i class="fas fa-warehouse sc-icon"></i></div>
  <div class="sc sc-red"><div><div class="sc-val">6</div><div class="sc-lbl">Stock bajo (&lt;10)</div></div><i class="fas fa-exclamation-triangle sc-icon"></i></div>
</div>

<div class="fcard" style="margin-bottom:20px">
  <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:14px"><i class="fas fa-plus-circle" style="color:var(--accent)"></i> Agregar nuevo producto</div>
  <form action="#" method="post" onsubmit="return false">
    <div class="fgrid">
      <div class="fg"><label>Nombre del producto *</label><input class="fc" type="text" placeholder="Nombre" required></div>
      <div class="fg"><label>Stock inicial *</label><input class="fc" type="number" min="0" placeholder="0" required></div>
      <div class="fg"><label>Categoría *</label>
        <select class="fc" required><option value="">— Categoría —</option><option>Playeras</option><option>Pantalones</option><option>General</option></select>
      </div>
      <div class="fg"><label>Precio proveedor ($) *</label><input class="fc" type="number" step="0.01" placeholder="0.00" required></div>
      <div class="fg"><label>Precio neto / venta ($) *</label><input class="fc" type="number" step="0.01" placeholder="0.00" required></div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar producto</button>
  </form>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-box-open" style="color:var(--accent)"></i> Catálogo de Productos</div></div>
  <table>
    <thead><tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Stock</th><th>Precio proveedor</th><th>Precio venta</th><th>Margen</th><th>Eliminar</th></tr></thead>
    <tbody>
      <tr><td>1</td><td><strong>Playera Básica</strong></td><td>Playeras</td>
        <td><span style="background:#22c55e22;color:#22c55e;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700">45 uds</span></td>
        <td>$85.00</td><td>$150.00</td>
        <td><span style="color:#22c55e;font-weight:700">+$65.00 <small style="opacity:.7">(76.5%)</small></span></td>
        <td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
      <tr><td>2</td><td><strong>Pantalón Mezclilla</strong></td><td>Pantalones</td>
        <td><span style="background:#f9731622;color:#f97316;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700">8 uds</span></td>
        <td>$220.00</td><td>$380.00</td>
        <td><span style="color:#22c55e;font-weight:700">+$160.00 <small style="opacity:.7">(72.7%)</small></span></td>
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
