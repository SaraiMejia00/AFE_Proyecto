@extends('layouts.admin')

@section('title', 'Editar Pedido')

@section('content')

<x-page-header title="Actualizar Estado Pedido" />

<form action="{{ route('orders.update', $order->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    {{-- Estado --}}
    <div class="mb-4">

        <label class="form-label">

            Estado

        </label>

        <select name="status"
            class="form-select">

            <option value="pending"
                {{ $order->status === 'pending' ? 'selected' : '' }}>

                Pendiente

            </option>

            <option value="processing"
                {{ $order->status === 'processing' ? 'selected' : '' }}>

                Procesando

            </option>

            <option value="completed"
                {{ $order->status === 'completed' ? 'selected' : '' }}>

                Completado

            </option>

            <option value="cancelled"
                {{ $order->status === 'cancelled' ? 'selected' : '' }}>

                Cancelado

            </option>

        </select>

    </div>

    <button class="btn btn-primary">

        Actualizar Estado

    </button>

    <x-back-button route="orders.index" />

</form>

@endsection