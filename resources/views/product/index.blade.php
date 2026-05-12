@extends('layouts.app')

@section('title', 'Productos')

@section('content')

<x-page-header title="Productos">

    <x-create-button
        route="products.create"
        text="Nuevo Producto" />

</x-page-header>

<x-success-alert />

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
                <td>{{ $product->stock }}</td>
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
                <td class="d-flex gap-2">

                    <a href="{{ route('products.edit', $product->id) }}"
                        class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </form>
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