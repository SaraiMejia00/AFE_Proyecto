@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<x-page-header title="Editar Producto" />

<form action="{{ route('products.update', $product->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- Categoría --}}
    <div class="mb-3">

        <label class="form-label">
            Categoría
        </label>

        <select name="category_id" class="form-select">

            <option value="">
                Seleccione una categoría
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Nombre --}}
    <div class="mb-3">

        <label class="form-label">
            Nombre
        </label>

        <input type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $product->name) }}">

        @error('name')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    {{-- Descripción --}}
    <div class="mb-3">

        <label class="form-label">
            Descripción
        </label>

        <textarea
            name="description"
            class="form-control"
            rows="4">{{ old('description', $product->description) }}</textarea>

    </div>

    {{-- Precio --}}
    <div class="mb-3">

        <label class="form-label">
            Precio
        </label>

        <input type="number"
            step="0.01"
            name="price"
            class="form-control"
            value="{{ old('price', $product->price) }}">

    </div>

    {{-- Stock --}}
    <div class="mb-3">

        <label class="form-label">
            Stock
        </label>

        <input type="number"
            name="stock"
            class="form-control"
            value="{{ old('stock', $product->stock) }}">

    </div>

    {{-- Imagen actual --}}
    <div class="mb-3">

        <label class="form-label">
            Imagen actual
        </label>

        <div>

            @if($product->image)

                <img
                    src="{{ asset('product_images/' . $product->image) }}"
                    width="120"
                    class="img-thumbnail">

            @else

                <p class="text-muted">
                    El producto no tiene imagen
                </p>

            @endif

        </div>

    </div>

    {{-- Nueva imagen --}}
    <div class="mb-3">

        <label class="form-label">
            Nueva imagen
        </label>

        <input type="file"
            name="image"
            class="form-control">

    </div>

    {{-- Estado --}}
    <div class="mb-4">

        <label class="form-label">
            Estado
        </label>

        <select name="status" class="form-select">

            <option value="1"
                {{ $product->status ? 'selected' : '' }}>

                Activo

            </option>

            <option value="0"
                {{ !$product->status ? 'selected' : '' }}>

                Inactivo

            </option>

        </select>

    </div>

    <button class="btn btn-warning">
        Actualizar
    </button>

    <x-back-button route="products.index" />

</form>

@endsection