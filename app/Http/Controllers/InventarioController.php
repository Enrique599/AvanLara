<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->orderBy('Stock')->orderBy('Id_producto')->get();

        return view('htmla.inventario', [
            'saludo'    => $this->saludo(),
            'productos' => $productos,
            'totalProductos' => $productos->count(),
            'totalStock'     => (int) $productos->sum('Stock'),
            'valor'          => (float) $productos->sum(fn ($p) => $p->Stock * $p->Precioneto),
            'stockBajo'      => $productos->where('Stock', '<', 10)->count(),
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
        $d = $this->validar($request, ['stock' => 'required|integer|min:0']);
        $producto->update(['Stock' => $d['stock']]);

        return redirect()->route('admin.inventario.index')->with('ok', 'Stock de "' . $producto->Nombre . '" actualizado.');
    }
}
