@extends('layouts.app')

@section('title', $product->name)

@section('content')

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
            <strong>{{ $product->stock }}</strong>

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
            
            <form action="{{ route('cart.add', $product->slug) }}" method="POST">
            @csrf
                <button class="btn btn-dark">
                    Agregar al carrito
                </button>
            </form>
            
        </div>
    </div>
</div>

@endsection