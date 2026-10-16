<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValidacionPagoController extends Controller
{
    public const ESTADOS  = ['PENDIENTE', 'PAGADO', 'PARCIAL', 'CANCELADO'];
    public const METODOS  = ['EFECTIVO', 'TRANSFERENCIA', 'TARJETA', 'CHEQUE'];

    public function index()
    {
        $ventas = Venta::reales()->with('cliente')->orderByDesc('Id_venta')->get()->each(function ($v) {
            // El estado de pago vive en Realizacion: "PAGO:{ESTADO}:{METODO}:{notas}"
            $p = explode(':', $v->Realizacion, 4);
            $esPago = ($p[0] === 'PAGO');
            $v->estado_pago = $esPago ? ($p[1] ?? 'PENDIENTE') : 'PENDIENTE';
            $v->metodo_pago = $esPago ? ($p[2] ?? '') : '';
        });

        return view('htmla.validacionpa', [
            'saludo' => $this->saludo(),
            'ventas' => $ventas,
            'pagados'    => $ventas->where('estado_pago', 'PAGADO')->count(),
            'pendientes' => $ventas->where('estado_pago', 'PENDIENTE')->count(),
            'parciales'  => $ventas->where('estado_pago', 'PARCIAL')->count(),
            'montoPendiente' => (float) $ventas->whereIn('estado_pago', ['PENDIENTE', 'PARCIAL'])->sum('Total'),
            'metodos' => self::METODOS,
        ]);
    }

    public function update(Request $request, Venta $venta)
    {
        abort_if(str_starts_with($venta->Realizacion, 'PROV:'), 404);

        $d = $this->validar($request, [
            'estado_pago' => 'required|in:' . implode(',', self::ESTADOS),
            'metodo_pago' => 'required|in:' . implode(',', self::METODOS),
            'notas'       => 'nullable|string|max:10',
        ]);

        // Realizacion es varchar(40)
        $venta->Realizacion = Str::limit("PAGO:{$d['estado_pago']}:{$d['metodo_pago']}:" . ($d['notas'] ?? ''), 40, '');
        $venta->save();

        return redirect()->route('admin.validacion-pago.index')->with('ok', 'Estado de pago actualizado correctamente.');
    }
}
