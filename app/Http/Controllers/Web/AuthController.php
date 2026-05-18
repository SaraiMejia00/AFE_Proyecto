<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Mostrar login
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | Procesar login
    |--------------------------------------------------------------------------
    */

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Intentar login
        |--------------------------------------------------------------------------
        */

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            /*
            |--------------------------------------------------------------------------
            | Obtener usuario autenticado
            |--------------------------------------------------------------------------
            */

            $user = Auth::user();

            /*
            |--------------------------------------------------------------------------
            | Redirección según rol
            |--------------------------------------------------------------------------
            */

            if ($user->role?->name === 'admin') {

                return redirect()->route('categories.index');
            }

            if ($user->role?->name === 'manager') {

                return redirect()->route('categories.index');
            }

            if ($user->role?->name === 'analyst') {

                return redirect()->route('analyst.index');
            }

            return redirect()->route('products.shop');
        }

        /*
        |--------------------------------------------------------------------------
        | Credenciales inválidas
        |--------------------------------------------------------------------------
        */

        return redirect()->back()
            ->with('error',
                'Credenciales incorrectas');
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}