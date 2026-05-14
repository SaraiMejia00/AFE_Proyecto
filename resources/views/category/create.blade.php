@extends('layouts.admin')

@section('title', 'Crear Categoría')

@section('content')

<h1 class="mb-4">Crear Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">
            Nombre
        </label>

        <input type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}">

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
            rows="4">{{ old('description') }}</textarea>

    </div>

    <button class="btn btn-primary">
        Guardar
    </button>

    <x-back-button route="categories.index" />

</form>

@endsection