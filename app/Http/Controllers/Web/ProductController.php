<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    // Catálogo público de la tienda
    public function shop()
    {
        // Obtener solo productos activos
        $products = Product::where('status', true)
            ->latest()
            ->get();
        return view('product.shop', compact('products'));
    }

    // Detalle producto tienda
    public function showShop(string $slug)
    {
        // Buscar producto por slug
        $product = Product::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('product.show-shop', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('product_images'), $imageName);
        }

        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto creado correctamente');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image',
            'status' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $imageName = $product->image;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('products'), $imageName);
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imageName,
            'status' => $request->status
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}