@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<x-page-header title="Tienda Tecnológica" />

{{-- Filtros tienda --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form method="GET"
            action="{{ route('products.shop') }}">

            <div class="row">

                {{-- Buscar --}}
                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Buscar Producto

                    </label>

                    <input type="text"
                        name="search"
                        class="form-control"
                        placeholder="Buscar..."
                        value="{{ request('search') }}">

                </div>

                {{-- Categoría --}}
                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Categoría

                    </label>

                    <select name="category"
                        class="form-select">

                        <option value="">
                            Todas las categorías
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Disponibles --}}
                <div class="col-md-2 mb-3 d-flex align-items-end">

                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="available"
                            value="1"
                            {{ request('available') ? 'checked' : '' }}>

                        <label class="form-check-label">

                            Solo disponibles

                        </label>

                    </div>

                </div>

                {{-- Botones --}}
                <div class="col-md-2 mb-3 d-flex align-items-end">

                    <div class="d-flex gap-2 w-100">

                        <button class="btn btn-dark w-100">

                            Filtrar

                        </button>

                        <a href="{{ route('products.shop') }}"
                            class="btn btn-secondary">

                            X

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

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
                                Disponible
                            </span>
                        @endif
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