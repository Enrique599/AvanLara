<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios / Empleados — Sistema DAV</title>
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

    <a href="usuarios.html" class="ni act">
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
      <div class="tb-title">Usuarios / Empleados</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Usuarios / Empleados</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div class="ptitle">Usuarios / Empleados</div>
<div class="psub">☀️ ¡Buenos días! — Gestiona los accesos al sistema</div>

<div class="fcard" style="margin-bottom:20px">
  <div style="font-size:14px;font-weight:700;color:var(--text);margin-bottom:14px"><i class="fas fa-user-plus" style="color:var(--accent2)"></i> Registrar nuevo usuario/empleado</div>
  <form action="#" method="post" onsubmit="return false">
    <div class="fgrid">
      <div class="fg"><label>Nombre *</label><input class="fc" type="text" placeholder="Nombre" required></div>
      <div class="fg"><label>Apellido Paterno *</label><input class="fc" type="text" placeholder="Apellido" required></div>
      <div class="fg"><label>Teléfono *</label><input class="fc" type="text" placeholder="10 dígitos" maxlength="10" required></div>
      <div class="fg"><label>Dirección *</label><input class="fc" type="text" placeholder="Dirección" required></div>
      <div class="fg"><label>Contraseña * (mín. 6 car.)</label><input class="fc" type="password" placeholder="••••••••" required></div>
      <div class="fg"><label>Rol *</label>
        <select class="fc" required>
          <option value="admin">Administrador</option><option value="vendedor">Vendedor</option>
          <option value="almacen">Almacén</option><option value="contador">Contador</option>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar empleado</button>
  </form>
</div>

<div class="tcard">
  <div class="tcard-hdr"><div class="tcard-ttl"><i class="fas fa-user-gear" style="color:var(--accent2)"></i> Empleados registrados</div></div>
  <table>
    <thead><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Dirección</th><th>Rol</th><th>Editar</th><th>Eliminar</th></tr></thead>
    <tbody>
      <tr><td>1</td><td>Carlos</td><td>Morales</td><td>2481110022</td><td>Reforma 12</td>
        <td><span style="background:#f75e5e22;color:#f75e5e;padding:3px 12px;border-radius:20px;font-size:11px;font-weight:800;text-transform:uppercase">admin</span></td>
        <td><a href="#" class="ib ib-edit" onclick="return false"><i class="fas fa-pencil-alt"></i></a></td><td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
      <tr><td>2</td><td>Paola</td><td>Nava</td><td>2481230099</td><td>5 de Mayo 8</td>
        <td><span style="background:#4f8ef722;color:#4f8ef7;padding:3px 12px;border-radius:20px;font-size:11px;font-weight:800;text-transform:uppercase">vendedor</span></td>
        <td><a href="#" class="ib ib-edit" onclick="return false"><i class="fas fa-pencil-alt"></i></a></td><td><a href="#" class="ib ib-del" onclick="return false"><i class="fas fa-times"></i></a></td></tr>
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
