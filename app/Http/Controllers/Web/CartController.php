<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class CartController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    // Agregar producto carrito
    public function add(string $slug)
    {
        // Buscar producto
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();
        
                    /*
            |--------------------------------------------------------------------------
            | Validar stock producto
            |--------------------------------------------------------------------------
            */

            if ($product->stock <= 0) {

                return redirect()->back()
                    ->with('error', 'Producto sin stock disponible');
            }

        // Obtener carrito actual
        $cart = session()->get('cart', []);

        // Si ya existe, aumentar cantidad
        if (isset($cart[$product->id])) {

            /*
            |--------------------------------------------------------------------------
            | Validar stock disponible
            |--------------------------------------------------------------------------
            */

            if ($cart[$product->id]['quantity'] >= $product->stock) {

                return redirect()->back()
                    ->with('error', 'No hay suficiente stock disponible');
            }

            $cart[$product->id]['quantity']++;

        } else {

            // Crear nuevo producto en carrito
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        // Guardar carrito
        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Producto agregado al carrito');
    }

    // Eliminar producto
    public function remove(string $id)
    {
        $cart = session()->get('cart', []);

        // Verificar si existe
        if (isset($cart[$id])) {

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Producto eliminado');
    }

    // Actualizar cantidad
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Buscar producto
        $product = Product::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Validar stock disponible
        |--------------------------------------------------------------------------
        */

        if ($request->quantity > $product->stock) {

            return redirect()->back()
                ->with('error', 'Cantidad supera stock disponible');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity'] = $request->quantity;

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Cantidad actualizada');
    }
}