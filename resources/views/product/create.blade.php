@extends('layouts.admin')

@section('title', 'Crear Producto')

@section('content')

<x-page-header title="Crear Producto" />

<form action="{{ route('products.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

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
                    value="{{ $category->id }}">

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
            required
            value="{{ old('name') }}">

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
            required
            rows="4">{{ old('description') }}</textarea>

    </div>

    {{-- Precio --}}
    <div class="mb-3">

        <label class="form-label">
            Precio
        </label>

        <input type="number"
            step="0.01"
            name="price"
            required
            class="form-control"
            value="{{ old('price') }}">

    </div>

    {{-- Imagen --}}
    <div class="mb-3">

        <label class="form-label">
            Imagen
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

            <option value="1">
                Activo
            </option>

            <option value="0">
                Inactivo
            </option>

        </select>

    </div>

    <button class="btn btn-primary">
        Guardar
    </button>

    <x-back-button route="products.index" />

</form>

@endsection