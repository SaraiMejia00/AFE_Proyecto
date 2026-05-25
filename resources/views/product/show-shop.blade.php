@extends('layouts.app')

@section('title', $product->name)

@section('content')
<x-back route="products.shop" />
<div class="row">

    {{-- Imagen --}}
    <div class="col-md-6 mb-4">

        @if($product->image)

            <img
                src="{{ asset('product_images/' . $product->image) }}"
                class="img-fluid rounded shadow-sm">
        @endif

    </div>

    {{-- Información --}}
    <div class="col-md-6">

        {{-- Nombre --}}
        <h1 class="mb-3">

            {{ $product->name }}

        </h1>

        {{-- Categoría --}}
        <p class="text-muted">

            Categoría:
            {{ $product->category?->name }}

        </p>

        {{-- Precio --}}
        <h2 class="mb-4">

            ${{ number_format($product->price, 2) }}

        </h2>

        {{-- Stock --}}
        <p>
            Stock disponible:
            {{-- Sin stock --}}
            @if($product->stock <= 0)
                <span class="badge bg-danger">
                    Agotado
                </span>

            {{-- Stock bajo --}}
            @elseif($product->stock <= 5)
                <span class="badge bg-warning text-dark">
                    Últimas unidades ({{ $product->stock }})
                </span>

            {{-- Stock normal --}}
            @else
                <span class="badge bg-success">
                    {{ $product->stock }} disponibles
                </span>
            @endif
        </p>

        {{-- Descripción --}}
        <div class="mb-4">

            <h5>Descripción</h5>

            <p>

                {{ $product->description }}

            </p>

        </div>

        {{-- Botones --}}
        <div class="d-flex gap-2">
            <a href="{{ route('products.shop') }}"
                class="btn btn-secondary">
                Volver
            </a>
            
            @if($product->stock > 0)

                <form action="{{ route('cart.add', $product->slug) }}"
                    method="POST">

                    @csrf

                    <button class="btn btn-dark">

                        Agregar al carrito

                    </button>

                </form>

            @else

                <button class="btn btn-secondary"
                    disabled>

                    Producto Agotado

                </button>

            @endif
            
        </div>
    </div>
</div>

@endsection