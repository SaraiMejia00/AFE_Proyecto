<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class CheckoutController extends Controller
{
    // Mostrar checkout
    public function index()
    {
        $cart = session()->get('cart', []);

        // Validar carrito vacío
        if (count($cart) <= 0) {

            return redirect()->route('cart.index');
        }

        return view('order.checkout', compact('cart'));
    }

    // Procesar compra
    public function process()
    {
        $cart = session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | Validar stock antes de procesar compra
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $productId => $item) {

            $product = Product::find($productId);

            // Producto inexistente
            if (!$product) {

                return redirect()->route('cart.index')
                    ->with('error', 'Producto no encontrado');
            }

            // Stock insuficiente
            if ($item['quantity'] > $product->stock) {

                return redirect()->route('cart.index')
                    ->with('error',
                        'Stock insuficiente para: ' . $product->name);
            }
        }

        // Validar carrito vacío
        if (count($cart) <= 0) {

            return redirect()->route('cart.index');
        }

        $total = 0;

        // Calcular total pedido
        foreach ($cart as $item) {

            $total += $item['price'] * $item['quantity'];
        }

        // Crear pedido
        $order = Order::create([
            'total' => $total,
            'status' => 'completed'
        ]);

        // Registrar productos pedido
        foreach ($cart as $productId => $item) {

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);

            // Actualizar stock producto
            $product = Product::find($productId);

            if ($product) {

                $product->stock -= $item['quantity'];

                $product->save();
            }
        }

        // Vaciar carrito
        session()->forget('cart');

        return redirect()->route('checkout.success', $order->id)
            ->with('success', 'Compra realizada correctamente');
    }
    
    /*
    |--------------------------------------------------------------------------
    | Confirmación compra cliente
    |--------------------------------------------------------------------------
    */
    public function success(string $id)
    {
        // Buscar pedido
        $order = Order::with('items.product')
            ->findOrFail($id);

        return view('order.success', compact('order'));
    }
}