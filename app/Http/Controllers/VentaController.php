<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    private function reglas(): array
    {
        return [
            'fecha'        => 'required|date',
            'realizacion'  => 'required|string|max:40',
            'total'        => 'required|numeric|min:0',
            'id_cliente'   => 'required|exists:cliente,Id_cliente',
            'total_piezas' => 'required|integer|min:0',
        ];
    }

    private function datos(array $d): array
    {
        return [
            'Fecha' => $d['fecha'], 'Realizacion' => $d['realizacion'], 'Total' => $d['total'],
            'Id_cliente' => $d['id_cliente'], 'Total_piezas' => $d['total_piezas'],
        ];
    }

    public function index()
    {
        return $this->vista(null);
    }

    private function vista(?Venta $editar)
    {
        return view('htmla.ventas', [
            'ventas'   => Venta::reales()->with('cliente')->orderByDesc('Id_venta')->get(),
            'clientes' => Cliente::orderBy('Nombre')->get(),
            'editar'   => $editar,
        ]);
    }

    public function store(Request $request)
    {
        Venta::create($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.ventas.index')->with('ok', 'Venta guardada correctamente.');
    }

    public function edit(Venta $venta)
    {
        abort_if(str_starts_with($venta->Realizacion, 'PROV:'), 404);
        return $this->vista($venta);
    }

    public function update(Request $request, Venta $venta)
    {
        abort_if(str_starts_with($venta->Realizacion, 'PROV:'), 404);
        $venta->update($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.ventas.index')->with('ok', 'Venta actualizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        abort_if(str_starts_with($venta->Realizacion, 'PROV:'), 404);
        return $this->borrar(fn () => $venta->delete(), 'Venta eliminada.', route('admin.ventas.index'));
    }
}
