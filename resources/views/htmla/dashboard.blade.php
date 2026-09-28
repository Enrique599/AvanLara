<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Sistema DAV</title>
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
    <a href="dashboard.html" class="ni act">
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
      <div class="tb-title">Dashboard</div>
      <div style="font-size:11.5px;color:var(--muted)">
        Home / <span style="color:var(--accent)">Dashboard</span>
      </div>
      <div class="tb-right">
        <div class="tb-icon"><i class="fas fa-bell"></i><span class="bdot">3</span></div>
        <div class="av" style="cursor:pointer">AP</div>
      </div>
    </div>
    <!-- CONTENT START -->
    
    <div id="content">

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:10px">
  <div>
    <div class="ptitle" style="margin-bottom:2px">Dashboard</div>
    <div class="psub" style="margin-bottom:0">☀️ ¡Buenos días! — Resumen general del sistema</div>
  </div>
  <div style="font-size:11.5px;color:var(--muted)">Home / <span style="color:var(--accent)">Dashboard</span></div>
</div>

<div class="stat-grid">
  <div class="sc sc-teal">
    <div><div class="sc-val">128</div><div class="sc-lbl">Clientes Registrados</div>
      <a href="clientes.html" class="sc-more" style="color:rgba(255,255,255,.85)">Ver clientes <i class="fas fa-arrow-right"></i></a></div>
    <i class="fas fa-users sc-icon"></i>
  </div>
  <div class="sc sc-green">
    <div><div class="sc-val">342</div><div class="sc-lbl">Ventas Totales</div>
      <a href="ventas.html" class="sc-more" style="color:rgba(255,255,255,.85)">Ver ventas <i class="fas fa-arrow-right"></i></a></div>
    <i class="fas fa-chart-bar sc-icon"></i>
  </div>
  <div class="sc sc-amber">
    <div><div class="sc-val">57</div><div class="sc-lbl">Prendas</div>
      <a href="prendas.html" class="sc-more" style="color:rgba(255,255,255,.85)">Ver prendas <i class="fas fa-arrow-right"></i></a></div>
    <i class="fas fa-tshirt sc-icon"></i>
  </div>
  <div class="sc sc-red">
    <div><div class="sc-val">$184,320.00</div><div class="sc-lbl">Monto Total Ventas</div>
      <a href="ventas.html" class="sc-more" style="color:rgba(255,255,255,.85)">Más info <i class="fas fa-arrow-right"></i></a></div>
    <i class="fas fa-dollar-sign sc-icon"></i>
  </div>
</div>

<div class="chart-row">
  <div class="chart-card">
    <div class="ch-hdr">
      <div class="ch-ttl"><i class="fas fa-chart-bar" style="color:var(--accent)"></i> Ventas por Mes</div>
      <div class="ch-btns">
        <button class="ch-btn act" onclick="switchChart('bar',this)">Barras</button>
        <button class="ch-btn" onclick="switchChart('line',this)">Línea</button>
      </div>
    </div>
    <canvas id="graficaVentas" height="200"></canvas>
  </div>
  <div class="chart-card">
    <div class="ch-hdr"><div class="ch-ttl"><i class="fas fa-pie-chart" style="color:var(--accent2)"></i> Resumen</div></div>
    <canvas id="graficaDonut" height="160"></canvas>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-top:14px;text-align:center">
      <div><div style="font-size:10px;color:var(--muted)">Clientes</div><div style="font-size:20px;font-weight:800;color:var(--accent)">128</div></div>
      <div><div style="font-size:10px;color:var(--muted)">Ventas</div><div style="font-size:20px;font-weight:800;color:var(--accent2)">342</div></div>
      <div><div style="font-size:10px;color:var(--muted)">Prendas</div><div style="font-size:20px;font-weight:800;color:var(--accent3)">57</div></div>
    </div>
  </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:20px">
  <div class="tcard">
    <div class="tcard-hdr">
      <div class="tcard-ttl"><i class="fas fa-user-clock" style="color:var(--accent)"></i> Últimos 5 Clientes</div>
      <a href="clientes.html" class="btn btn-sm btn-primary">Ver todos</a>
    </div>
    <table>
      <thead><tr><th>ID</th><th>Nombre</th><th>Teléfono</th><th>Dirección</th></tr></thead>
      <tbody>
        <tr><td>128</td><td>Ana López Ramos</td><td>2481234567</td><td>Av. Reforma 12</td></tr>
        <tr><td>127</td><td>Jorge Pérez Cano</td><td>2489876543</td><td>Calle 5 de Mayo 34</td></tr>
        <tr><td>126</td><td>Mariana Ruiz Gil</td><td>2225551234</td><td>Priv. Hidalgo 8</td></tr>
        <tr><td>125</td><td>Luis Cruz Ortega</td><td>2221239876</td><td>Blvd. Xicoténcatl 56</td></tr>
        <tr><td>124</td><td>Sofía Torres Ibáñez</td><td>2461112233</td><td>Camino Real 21</td></tr>
      </tbody>
    </table>
  </div>
  <div class="tcard">
    <div class="tcard-hdr">
      <div class="tcard-ttl"><i class="fas fa-receipt" style="color:var(--accent2)"></i> Últimas 5 Ventas</div>
      <a href="ventas.html" class="btn btn-sm btn-success">Ver todas</a>
    </div>
    <table>
      <thead><tr><th>ID</th><th>Cliente</th><th>Total</th><th>Fecha</th></tr></thead>
      <tbody>
        <tr><td>#342</td><td>Ana López Ramos</td><td>$650.00</td><td>2026-09-04</td></tr>
        <tr><td>#341</td><td>Jorge Pérez Cano</td><td>$1,200.00</td><td>2026-09-03</td></tr>
        <tr><td>#340</td><td>Mariana Ruiz Gil</td><td>$430.50</td><td>2026-09-02</td></tr>
        <tr><td>#339</td><td>Luis Cruz Ortega</td><td>$980.00</td><td>2026-09-01</td></tr>
        <tr><td>#338</td><td>Sofía Torres Ibáñez</td><td>$310.00</td><td>2026-08-31</td></tr>
      </tbody>
    </table>
  </div>
</div>

<script>
const commonOpts = {
  responsive:true,
  plugins:{legend:{labels:{color:'#e4e8f0',font:{size:11}}}},
  scales:{
    x:{ticks:{color:'#7a8099'},grid:{color:'rgba(255,255,255,.05)'}},
    y:{ticks:{color:'#7a8099'},grid:{color:'rgba(255,255,255,.05)'}}
  }
};
const labelsData = ['Abr 2026','May 2026','Jun 2026','Jul 2026','Ago 2026','Sep 2026'];
const totalesData = [21000, 25800, 19600, 31200, 27650, 30800];
let salesChart;
function buildChart(type){
  const ctx = document.getElementById('graficaVentas').getContext('2d');
  if(salesChart) salesChart.destroy();
  salesChart = new Chart(ctx,{
    type,
    data:{ labels: labelsData, datasets:[{
      label:'Total Ventas ($)', data: totalesData,
      backgroundColor: type==='bar' ? 'rgba(79,142,247,.55)' : 'rgba(79,142,247,.2)',
      borderColor:'#4f8ef7', borderWidth:2, borderRadius: type==='bar' ? 8 : 0,
      fill: type==='line', tension:.4
    }]},
    options: commonOpts
  });
}
function switchChart(type, btn){
  document.querySelectorAll('.ch-btn').forEach(b=>b.classList.remove('act'));
  btn.classList.add('act'); buildChart(type);
}
buildChart('bar');
new Chart(document.getElementById('graficaDonut').getContext('2d'),{
  type:'doughnut',
  data:{ labels:['Clientes','Ventas','Prendas'],
    datasets:[{ data:[128,342,57], backgroundColor:['#4f8ef7','#22d3a5','#f7c948'], borderWidth:0 }]},
  options:{plugins:{legend:{position:'bottom',labels:{color:'#e4e8f0',font:{size:11}}}}}
});
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
