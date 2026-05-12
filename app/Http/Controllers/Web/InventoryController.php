<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\InventoryMovement;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Mostrar historial inventario
    public function index()
    {
        $movements = InventoryMovement::with('product')
            ->latest()
            ->get();

        return view('inventory.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Formulario nuevo movimiento
    public function create()
    {
        $products = Product::all();

        return view('inventory.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:entry,exit',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|max:255'
        ]);

        // Buscar producto
        $product = Product::findOrFail($request->product_id);

        // Actualizar stock según tipo
        if ($request->type === 'entry') {

            $product->stock += $request->quantity;

        } else {

            // Evitar stock negativo
            if ($product->stock < $request->quantity) {

                return redirect()->back()
                    ->with('error', 'Stock insuficiente');
            }

            $product->stock -= $request->quantity;
        }

        // Guardar nuevo stock
        $product->save();

        // Registrar movimiento
        InventoryMovement::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'reason' => $request->reason
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Movimiento registrado correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
