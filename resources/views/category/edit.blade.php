@extends('layouts.admin')

@section('title', 'Editar Categoría')

@section('content')

<h1 class="mb-4">Editar Categoría</h1>

<form action="{{ route('categories.update', $category->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">
            Nombre
        </label>

        <input type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $category->name) }}">

        @error('name')

            <small class="text-danger">
                {{ $message }}
            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Descripción
        </label>

        <textarea name="description"
            class="form-control"
            rows="4">{{ old('description', $category->description) }}</textarea>

    </div>

    <button class="btn btn-warning">
        Actualizar
    </button>

    <a href="{{ route('categories.index') }}"
        class="btn btn-secondary">

        Volver

    </a>

</form>

@endsection