<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Total de productos registrados
        $totalProducts = Product::count();
        // Total de categorías registradas
        $totalCategories = Category::count();
        // Productos activos
        $activeProducts = Product::where('status', true)->count();
        // Suma total de stock
        $totalStock = Product::sum('stock');
        // Últimos productos agregados
        $latestProducts = Product::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalProducts',
            'totalCategories',
            'activeProducts',
            'totalStock',
            'latestProducts'
        ));
    }
}
