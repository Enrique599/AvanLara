<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /** Uso: 'admin' (cualquier empleado) o 'admin:admin' (solo ciertos roles). */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login')->withErrors(['telefono' => 'Inicia sesión para continuar.']);
        }
        if ($roles && !in_array(session('admin_rol'), $roles, true)) {
            return redirect()->route('admin.dashboard')->withErrors(['permiso' => 'No tienes permiso para entrar a esa sección.']);
        }
        return $next($request);
    }
}
