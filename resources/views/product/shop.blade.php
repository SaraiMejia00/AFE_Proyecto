@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<x-page-header title="Tienda Tecnológica" />

<div class="row">
    @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                {{-- Imagen producto --}}
                @if($product->image)
                    <img
                        src="{{ asset('product_images/' . $product->image) }}"
                        class="card-img-top"
                        style="height: 250px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">

                    {{-- Nombre --}}
                    <h5 class="card-title">
                        {{ $product->name }}
                    </h5>

                    {{-- Categoría --}}
                    <p class="text-muted mb-2">
                        {{ $product->category?->name }}
                    </p>

                    {{-- Precio --}}
                    <h4 class="mb-3">
                        ${{ number_format($product->price, 2) }}
                    </h4>

                    {{-- Stock --}}
                    <p>
                        Stock:
                        <strong>{{ $product->stock }}</strong>
                    </p>

                    {{-- Botón --}}
                    <a href="{{ route('products.show-shop', $product->slug) }}"
                        class="btn btn-dark mt-auto">
                        Ver Producto
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                No hay productos disponibles
            </div>
        </div>
    @endforelse

</div>

@endsection