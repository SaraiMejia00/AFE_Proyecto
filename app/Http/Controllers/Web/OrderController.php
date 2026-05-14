<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(Request $request)
{
    /*
    |--------------------------------------------------------------------------
    | Consulta pedidos
    |--------------------------------------------------------------------------
    */
    $query = Order::query();
    /*
    |--------------------------------------------------------------------------
    | Buscar pedido por ID
    |--------------------------------------------------------------------------
    */
    if ($request->filled('search')) {

        $query->where('id',
            $request->search);
    }
    /*
    |--------------------------------------------------------------------------
    | Filtrar estado
    |--------------------------------------------------------------------------
    */
    if ($request->filled('status')) {

        $query->where('status',
            $request->status);
    }
    /*
    |--------------------------------------------------------------------------
    | Obtener pedidos
    |--------------------------------------------------------------------------
    */
    $orders = $query->latest()->get();

    return view('order.index', compact('orders'));
}

    // Mostrar detalle pedido
    public function show(string $id)
    {
        $order = Order::with('items.product')
            ->findOrFail($id);

        return view('order.show', compact('order'));
    }

    // Formulario editar estado
    public function edit(string $id)
    {
        $order = Order::findOrFail($id);

        return view('order.edit', compact('order'));
    }

    // Actualizar estado pedido
    public function update(Request $request, string $id)
{
    $request->validate([
        'status' => 'required'
    ]);

    // Buscar pedido
    $order = Order::with('items.product')
        ->findOrFail($id);

    // Guardar estado anterior
    $oldStatus = $order->status;

    // Nuevo estado seleccionado
    $newStatus = $request->status;

    /*
    |--------------------------------------------------------------------------
    | Devolver stock si pedido se cancela
    |--------------------------------------------------------------------------
    |
    | Solo se va a devolver stock si:
    | - antes NO estaba cancelado
    | - ahora SÍ será cancelado
    |
    */

    if ($oldStatus !== 'cancelled' &&
        $newStatus === 'cancelled') {

        foreach ($order->items as $item) {

            // Verificar producto existente
            if ($item->product) {

                // Devolver stock
                $item->product->stock += $item->quantity;

                $item->product->save();
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Actualizar estado pedido
    |--------------------------------------------------------------------------
    */

    $order->update([
        'status' => $newStatus
    ]);

    return redirect()->route('orders.index')
        ->with('success', 'Estado actualizado correctamente');
}
}