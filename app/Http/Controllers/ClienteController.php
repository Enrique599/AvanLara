<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        return $this->vista(null);
    }

    private function vista(?Cliente $editar)
    {
        return view('htmla.clientes', [
            'saludo'   => $this->saludo(),
            'clientes' => Cliente::orderByDesc('Id_cliente')->get(),
            'editar'   => $editar,
        ]);
    }

    public function store(Request $request)
    {
        $d = $this->validar($request, [
            'nombre'     => 'required|string|max:20',
            'ap_paterno' => 'required|string|max:20',
            'telefono'   => 'required|string|max:10',
            'contrasena' => 'required|string|min:4|max:100',
            'direccion'  => 'required|string|max:100',
            'cp'         => 'required|string|max:5',
        ]);

        Cliente::create([
            'Nombre' => $d['nombre'], 'Ap_paterno' => $d['ap_paterno'], 'Telefono' => $d['telefono'],
            'Contrasena' => Hash::make($d['contrasena']), 'Direccion' => $d['direccion'], 'CP' => $d['cp'],
        ]);

        return redirect()->route('admin.clientes.index')->with('ok', 'Cliente guardado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        return $this->vista($cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $d = $this->validar($request, [
            'nombre'     => 'required|string|max:20',
            'ap_paterno' => 'required|string|max:20',
            'telefono'   => 'required|string|max:10',
            'contrasena' => 'nullable|string|min:4|max:100',
            'direccion'  => 'required|string|max:100',
            'cp'         => 'required|string|max:5',
        ]);

        $cliente->fill([
            'Nombre' => $d['nombre'], 'Ap_paterno' => $d['ap_paterno'], 'Telefono' => $d['telefono'],
            'Direccion' => $d['direccion'], 'CP' => $d['cp'],
        ]);
        if (!empty($d['contrasena'])) {
            $cliente->Contrasena = Hash::make($d['contrasena']);
        }
        $cliente->save();

        return redirect()->route('admin.clientes.index')->with('ok', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        return $this->borrar(fn () => $cliente->delete(), 'Cliente eliminado.', route('admin.clientes.index'));
    }
}
