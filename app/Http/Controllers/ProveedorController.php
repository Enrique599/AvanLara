<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    private function reglas(): array
    {
        return [
            'nombre'     => 'required|string|max:20',
            'ap_paterno' => 'required|string|max:20',
            'telefono'   => 'required|string|max:10',
            'direccion'  => 'required|string|max:40',
        ];
    }

    private function datos(array $d): array
    {
        return ['Nombre' => $d['nombre'], 'Ap_paterno' => $d['ap_paterno'],
                'Telefono' => $d['telefono'], 'Direccion' => $d['direccion']];
    }

    public function index()
    {
        return $this->vista(null);
    }

    private function vista(?Proveedor $editar)
    {
        return view('htmla.registroprove', [
            'saludo'      => $this->saludo(),
            'proveedores' => Proveedor::orderByDesc('Id_proovedor')->get(),
            'editar'      => $editar,
        ]);
    }

    public function store(Request $request)
    {
        Proveedor::create($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.proveedores.index')->with('ok', 'Proveedor guardado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return $this->vista($proveedor);
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($this->datos($this->validar($request, $this->reglas())));
        return redirect()->route('admin.proveedores.index')->with('ok', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        return $this->borrar(fn () => $proveedor->delete(), 'Proveedor eliminado.', route('admin.proveedores.index'));
    }
}
