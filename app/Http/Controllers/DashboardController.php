<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prenda;
use App\Models\Venta;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClientes = Cliente::count();
        $totalVentas   = Venta::reales()->count();
        $totalPrendas  = Prenda::count();
        $montoTotal    = (float) Venta::reales()->sum('Total');

        // Ventas por mes (últimos 6 meses, aunque no tengan ventas)
        $porMes = Venta::reales()->get(['Fecha', 'Total'])
            ->groupBy(fn ($v) => $v->Fecha->format('Y-m'))
            ->map(fn ($g) => (float) $g->sum('Total'));

        $labels = [];
        $totales = [];
        for ($i = 5; $i >= 0; $i--) {
            $mes = Carbon::now()->startOfMonth()->subMonths($i);
            $labels[]  = ucfirst($mes->translatedFormat('M Y'));
            $totales[] = $porMes[$mes->format('Y-m')] ?? 0;
        }

        $ultimosClientes = Cliente::orderByDesc('Id_cliente')->limit(5)->get();
        $ultimasVentas   = Venta::reales()->with('cliente')->orderByDesc('Id_venta')->limit(5)->get();

        return view('htmla.dashboard', [
            'saludo' => $this->saludo(),
            'totalClientes' => $totalClientes,
            'totalVentas'   => $totalVentas,
            'totalPrendas'  => $totalPrendas,
            'montoTotal'    => $montoTotal,
            'labels'  => $labels,
            'totales' => $totales,
            'ultimosClientes' => $ultimosClientes,
            'ultimasVentas'   => $ultimasVentas,
        ]);
    }
}
