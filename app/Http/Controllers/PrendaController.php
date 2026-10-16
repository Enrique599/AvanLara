<?php

namespace App\Http\Controllers;

use App\Models\Prenda;
use Illuminate\Http\Request;

class PrendaController extends Controller
{
    public function index()
    {
        return $this->vista(null);
    }

    private function vista(?Prenda $editar)
    {
        return view('htmla.prendas', [
            'saludo'  => $this->saludo(),
            'prendas' => Prenda::orderBy('Id_prendas')->get(),
            'editar'  => $editar,
        ]);
    }

    public function store(Request $request)
    {
        $d = $this->validar($request, [
            'prendas'    => 'required|string|max:10',
            'num_piezas' => 'required|integer|min:0',
        ]);
        Prenda::create(['Prendas' => $d['prendas'], 'Num_piezas' => $d['num_piezas']]);

        return redirect()->route('admin.prendas.index')->with('ok', 'Prenda guardada correctamente.');
    }

    public function edit(Prenda $prenda)
    {
        return $this->vista($prenda);
    }

    public function update(Request $request, Prenda $prenda)
    {
        $d = $this->validar($request, [
            'prendas'    => 'required|string|max:10',
            'num_piezas' => 'required|integer|min:0',
        ]);
        $prenda->update(['Prendas' => $d['prendas'], 'Num_piezas' => $d['num_piezas']]);

        return redirect()->route('admin.prendas.index')->with('ok', 'Prenda actualizada correctamente.');
    }

    public function destroy(Prenda $prenda)
    {
        return $this->borrar(fn () => $prenda->delete(), 'Prenda eliminada.', route('admin.prendas.index'));
    }
}
