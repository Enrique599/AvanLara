<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoClienteController extends Controller
{
    public function index()
    {
        // Más antiguos primero = más urgentes
        $pedidos = Pedido::with('cliente')->orderBy('Fecha')->orderBy('Id_pedido')->get()
            ->each(function ($p) {
                $dias = max(0, (int) $p->Fecha->startOfDay()->diffInDays(now()->startOfDay(), false));
                $p->dias = $dias;
                $p->prioridad = $dias >= 7 ? 'URGENTE' : ($dias >= 3 ? 'ALTA' : 'NORMAL');
            });

        return view('htmla.pedidosclien', [
            'pedidos'  => $pedidos,
            'clientes' => Cliente::orderBy('Nombre')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $d = $this->validar($request, [
            'id_cliente'   => 'required|exists:cliente,Id_cliente',
            'fecha'        => 'required|date',
            'total'        => 'required|numeric|min:0',
            'total_piezas' => 'required|integer|min:0',
        ]);
        Pedido::create([
            'Id_cliente' => $d['id_cliente'], 'Fecha' => $d['fecha'],
            'Total' => $d['total'], 'Totalpiezas' => $d['total_piezas'],
        ]);
        return redirect()->route('admin.pedidos-clientes.index')->with('ok', 'Pedido registrado correctamente.');
    }

    public function destroy(Pedido $pedido)
    {
        return $this->borrar(fn () => $pedido->delete(), 'Pedido eliminado.', route('admin.pedidos-clientes.index'));
    }
}
