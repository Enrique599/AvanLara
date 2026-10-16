<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private function reglas(): array
    {
        return [
            'nombre'       => 'required|string|max:20',
            'stock'        => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categoria,Id_categoria',
            'preciopro'    => 'required|numeric|min:0',
            'precioneto'   => 'required|numeric|min:0',
        ];
    }

    private function datos(array $d): array
    {
        return [
            'Nombre' => $d['nombre'], 'Stock' => $d['stock'], 'Id_categoria' => $d['id_categoria'],
            'Preciopro' => $d['preciopro'], 'Precioneto' => $d['precioneto'],
        ];
    }

    public function index()
    {
        return $this->vista(null);
    }

    private function vista(?Producto $editar)
    {
        $productos = Producto::with('categoria')->orderBy('Id_producto')->get();

        return view('htmla.productos', [
            'saludo'     => $this->saludo(),
            'productos'  => $productos,
            'categorias' => Categoria::orderBy('Nombre')->get(),
            'totalProductos' => $productos->count(),
            'totalStock'     => (int) $productos->sum('Stock'),
            'stockBajo'      => $productos->where('Stock', '<', 10)->count(),
            'editar'     => $editar,
        ]);
    }

    public function store(Request $request)
    {
        Producto::create($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.productos.index')->with('ok', 'Producto guardado correctamente.');
    }

    public function edit(Producto $producto)
    {
        return $this->vista($producto);
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->update($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.productos.index')->with('ok', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        return $this->borrar(fn () => $producto->delete(), 'Producto eliminado.', route('admin.productos.index'));
    }
}
