<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class AnalystController extends Controller
{
    public function index()
    {
        // Total pedidos realizados
        $totalOrders = Order::count();

        /*
        |--------------------------------------------------------------------------
        | Ingresos reales
        |--------------------------------------------------------------------------
        |
        | Equi solo inclui los pedidos completados y procesados, exclui los cancelados y los pendientes
        |
        */
        $totalRevenue = Order::whereIn('status', [
            'processing',
            'completed'
        ])->sum('total');

        // Productos con stock bajo
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->count();

        // Producto más vendido
        $topProduct = OrderItem::selectRaw('product_id, SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->first();

        // Últimos pedidos
        $latestOrders = Order::latest()
            ->take(5)
            ->get();

        return view('analyst.index', compact(
            'totalOrders',
            'totalRevenue',
            'lowStockProducts',
            'topProduct',
            'latestOrders'
        ));
    }
}