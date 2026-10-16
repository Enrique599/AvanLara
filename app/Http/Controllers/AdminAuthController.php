<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('htmla.login');
    }

    public function login(Request $request)
    {
        $datos = $this->validar($request, [
            'telefono'   => 'required|string|max:50',
            'contrasena' => 'required|string',
        ]);

        $empleado = Empleado::where('Telefono', trim($datos['telefono']))->first();

        if (!$empleado || !Hash::check($datos['contrasena'], $empleado->Contrasena)) {
            return back()->withInput($request->only('telefono'))
                ->withErrors(['telefono' => 'Credenciales incorrectas.']);
        }

        $request->session()->regenerate();
        session([
            'admin_id'     => $empleado->Id_empleado,
            'admin_nombre' => $empleado->Nombre . ' ' . $empleado->Ap_paterno,
            'admin_rol'    => $empleado->rol,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_nombre', 'admin_rol']);
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
