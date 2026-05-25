<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | Validar autenticación
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {

            return redirect()->route('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Obtener rol usuario
        |--------------------------------------------------------------------------
        */

        $userRole = Auth::user()->role?->name;

        /*
        |--------------------------------------------------------------------------
        | Validar permisos
        |--------------------------------------------------------------------------
        */

        if (!in_array($userRole, $roles)) {

            return response()
            ->view('auth.forbidden', [], 403);
        }

        return $next($request);
    }
}