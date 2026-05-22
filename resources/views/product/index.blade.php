@extends('layouts.admin')

@section('title', 'Productos')

@section('content')

<x-page-header title="Productos">

    <x-create-button
        route="products.create"
        text="Nuevo Producto" />

</x-page-header>

<x-success-alert />

{{-- Filtros búsqueda --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form method="GET"
            action="{{ route('products.index') }}">

            <div class="row">

                {{-- Buscar producto --}}
                <div class="col-md-5 mb-3">

                    <label class="form-label">

                        Buscar Producto

                    </label>

                    <input type="text"
                        name="search"
                        class="form-control"
                        placeholder="Buscar por nombre..."
                        value="{{ request('search') }}">

                </div>

                {{-- Filtrar categoría --}}
                <div class="col-md-5 mb-3">

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

                {{-- Botones --}}
                <div class="col-md-2 d-flex align-items-end mb-3">

                    <div class="d-flex gap-2 w-100">

                        <button class="btn btn-dark w-100">

                            Filtrar

                        </button>

                        <a href="{{ route('products.index') }}"
                            class="btn btn-secondary">

                            X

                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        @forelse($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    {{-- Verifica si el producto tiene imagen --}}
                    @if($product->image)

                        <img
                            src="{{ asset('product_images/' . $product->image) }}"
                            width="80"
                            class="img-thumbnail">
                    @else
                        <span class="text-muted">
                            Sin imagen
                        </span>
                    @endif

                </td>
                <td>{{ $product->name }}</td>
                {{-- Relación con categoría --}}
                <td>
                    {{ $product->category?->name }}
                </td>
                <td>
                    ${{ number_format($product->price, 2) }}
                </td>

                <td>

                    {{-- Stock crítico --}}
                    @if($product->stock <= 5)

                        <span class="badge bg-danger">

                            {{ $product->stock }}

                        </span>

                    {{-- Stock medio --}}
                    @elseif($product->stock <= 15)

                        <span class="badge bg-warning text-dark">

                            {{ $product->stock }}

                        </span>

                    {{-- Stock normal --}}
                    @else

                        <span class="badge bg-success">

                            {{ $product->stock }}

                        </span>

                    @endif

                </td>
                
                <td>
                    @if($product->status)

                        <span class="badge bg-success">
                            Activo
                        </span>

                    @else
                        <span class="badge bg-danger">
                            Inactivo
                        </span>
                    @endif

                </td>
                <td class="d-flex gap-2 align-items-center">

                    <x-actions
                        :editRoute="route('products.edit', $product->id)"
                        :deleteRoute="route('products.destroy', $product->id)" 
                    />
                   <!-- <a href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form class="delete-form" action="{{ route('products.destroy', $product->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </form>-->
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">
                    No hay productos registrados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection