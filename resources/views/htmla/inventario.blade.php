<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventario — Sistema DAV</title>
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

    <a href="productos.html" class="ni ">
      <i class="fas fa-box-open"></i><span>Productos</span>
    </a>

    <a href="usuarios.html" class="ni ">
      <i class="fas fa-user-gear"></i><span>Usuarios</span>
    </a>

    <a href="inventario.html" class="ni act">
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
      <div class="tb-title">Inventario</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Inventario</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div class="ptitle">Inventario</div>
<div class="psub">☀️ ¡Buenos días! — Visualización del inventario actual</div>

<div class="stat-grid" style="margin-bottom:20px">
  <div class="sc sc-teal"><div><div class="sc-val">57</div><div class="sc-lbl">Productos distintos</div></div><i class="fas fa-boxes sc-icon"></i></div>
  <div class="sc sc-green"><div><div class="sc-val">890</div><div class="sc-lbl">Unidades totales</div></div><i class="fas fa-warehouse sc-icon"></i></div>
  <div class="sc sc-amber"><div><div class="sc-val">$96,430.00</div><div class="sc-lbl">Valor del inventario</div></div><i class="fas fa-dollar-sign sc-icon"></i></div>
  <div class="sc sc-red"><div><div class="sc-val">6</div><div class="sc-lbl">Stock bajo (&lt;10)</div></div><i class="fas fa-exclamation-triangle sc-icon"></i></div>
</div>

<div class="tcard">
  <div class="tcard-hdr">
    <div class="tcard-ttl"><i class="fas fa-warehouse" style="color:var(--accent3)"></i> Estado del inventario</div>
    <small style="color:var(--muted)">Ordenado: menor stock primero</small>
  </div>
  <table>
    <thead><tr><th>ID</th><th>Producto</th><th>Categoría</th><th>Stock actual</th><th>Nivel</th><th>Precio venta</th><th>Valor stock</th><th>Ajustar</th></tr></thead>
    <tbody>
      <tr><td>2</td><td><strong>Pantalón Mezclilla</strong></td><td>Pantalones</td>
        <td><span style="font-size:18px;font-weight:800;color:#f97316">8</span></td>
        <td><span style="background:#f9731622;color:#f97316;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700">🟠 Bajo</span></td>
        <td>$380.00</td><td>$3,040.00</td>
        <td><form action="#" onsubmit="return false" style="display:flex;gap:6px;align-items:center">
          <input class="fc" type="number" value="8" min="0" style="width:70px;padding:5px 8px;font-size:13px">
          <button type="submit" class="btn btn-sm btn-primary" title="Guardar stock"><i class="fas fa-save"></i></button></form></td></tr>
      <tr><td>1</td><td><strong>Playera Básica</strong></td><td>Playeras</td>
        <td><span style="font-size:18px;font-weight:800;color:#22c55e">45</span></td>
        <td><span style="background:#22c55e22;color:#22c55e;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:700">🟢 Bueno</span></td>
        <td>$150.00</td><td>$6,750.00</td>
        <td><form action="#" onsubmit="return false" style="display:flex;gap:6px;align-items:center">
          <input class="fc" type="number" value="45" min="0" style="width:70px;padding:5px 8px;font-size:13px">
          <button type="submit" class="btn btn-sm btn-primary" title="Guardar stock"><i class="fas fa-save"></i></button></form></td></tr>
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
