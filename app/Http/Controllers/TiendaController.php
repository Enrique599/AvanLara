<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{
    /** Datos de las 3 tarjetas de la portada (precios reales de la BD cuando existen). */
    private function portada(): array
    {
        $menos100 = Producto::where('Precioneto', '<', 100)->orderByDesc('Precioneto')->first();

        $masVendido = DB::table('detalleventa')
            ->join('registroproductos', 'registroproductos.Id_producto', '=', 'detalleventa.Id_producto')
            ->select('registroproductos.Precioneto', DB::raw('SUM(detalleventa.Cantidad) as vendidos'))
            ->groupBy('registroproductos.Id_producto', 'registroproductos.Precioneto')
            ->orderByDesc('vendidos')->first();

        return [
            'precioMenos100'  => $menos100?->Precioneto,
            'precioMasVendido' => $masVendido?->Precioneto,
        ];
    }

    public function inicio()
    {
        if (session()->has('cliente_id')) {
            return redirect()->route('tienda.tienda');
        }
        return view('htmlv.inicio', $this->portada());
    }

    public function tienda()
    {
        return view('htmlv.tienda', $this->portada() + ['nombre' => session('cliente_nombre')]);
    }

    public function categorias()
    {
        return view('htmlv.categorias', [
            'categorias' => Categoria::withCount('productos')->orderBy('Id_categoria')->get(),
            'imagenes'   => ['ves1.jpg', 'ves2.jpg', 'ves3.jpg', 'images.jpg'],
        ]);
    }
}
