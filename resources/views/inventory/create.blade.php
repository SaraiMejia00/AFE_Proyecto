@extends('layouts.admin')

@section('title', 'Nuevo Movimiento')

@section('content')

<x-page-header title="Nuevo Movimiento Inventario" />

{{-- Error de stock insuficiente --}}
@if(session('error'))

    <div class="alert alert-danger">

        {{ session('error') }}

    </div>

@endif

<form action="{{ route('inventory.store') }}"
    method="POST">

    @csrf

    {{-- Producto --}}
    <div class="mb-3">

        <label class="form-label">
            Producto
        </label>

        <select name="product_id"
            class="form-select">

            @foreach($products as $product)

                <option value="{{ $product->id }}">

                    {{ $product->name }}

                </option>

            @endforeach

        </select>

    </div>

    {{-- Tipo --}}
    <div class="mb-3">

        <label class="form-label">
            Tipo Movimiento
        </label>

        <select name="type"
            class="form-select">

            <option value="entry">
                Entrada
            </option>

            <option value="exit">
                Salida
            </option>

        </select>

    </div>

    {{-- Cantidad --}}
    <div class="mb-3">

        <label class="form-label">
            Cantidad
        </label>

        <input type="number"
            name="quantity"
            class="form-control">

    </div>

    {{-- Motivo --}}
    <div class="mb-4">

        <label class="form-label">
            Motivo
        </label>

        <input type="text"
            name="reason"
            class="form-control">

    </div>

    <button class="btn btn-primary">

        Guardar Movimiento

    </button>

    <x-back-button route="inventory.index" />

</form>

@endsection