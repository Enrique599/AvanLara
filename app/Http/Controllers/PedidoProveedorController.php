<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\PedidoProveedor;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class PedidoProveedorController extends Controller
{
    public const ESTADOS = ['PENDIENTE', 'ENVIADO', 'RECIBIDO', 'CANCELADO'];

    public function index()
    {
        $pedidos = PedidoProveedor::orderByDesc('Fecha')->orderByDesc('Id_venta')->get();
        $proveedores = Proveedor::orderBy('Nombre')->get();
        $mapa = $proveedores->keyBy('Id_proovedor');
        $pedidos->each(fn ($p) => $p->proveedor = $mapa->get($p->proveedor_id));

        return view('htmla.pedidosproove', [
            'pedidos'     => $pedidos,
            'proveedores' => $proveedores,
            'estados'     => self::ESTADOS,
        ]);
    }

    public function store(Request $request)
    {
        $d = $this->validar($request, [
            'id_proovedor' => 'required|exists:proovedor,Id_proovedor',
            'fecha'        => 'required|date',
            'total'        => 'required|numeric|min:0',
            'total_piezas' => 'required|integer|min:0',
            'estado'       => 'required|in:' . implode(',', self::ESTADOS),
        ]);

        // venta.Id_cliente es obligatorio con FK: se usa el primer cliente existente como "sistema"
        $idCliente = Cliente::min('Id_cliente');
        if (!$idCliente) {
            return back()->withInput()->with('err', 'Registra al menos un cliente antes de guardar pedidos a proveedor (la tabla venta requiere un cliente).');
        }

        PedidoProveedor::create([
            'Fecha' => $d['fecha'],
            'Realizacion' => "PROV:{$d['id_proovedor']}:{$d['estado']}",
            'Total' => $d['total'],
            'Id_cliente' => $idCliente,
            'Total_piezas' => $d['total_piezas'],
        ]);

        return redirect()->route('admin.pedidos-proveedores.index')->with('ok', 'Pedido a proveedor registrado.');
    }

    public function destroy(PedidoProveedor $pedido)
    {
        return $this->borrar(fn () => $pedido->delete(), 'Pedido eliminado.', route('admin.pedidos-proveedores.index'));
    }
}
