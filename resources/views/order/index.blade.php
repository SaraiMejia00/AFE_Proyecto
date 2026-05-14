@extends('layouts.admin')

@section('title', 'Pedidos')

@section('content')

<x-page-header title="Pedidos" />

<x-success-alert />

{{-- Filtros pedidos --}}
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body">

        <form method="GET"
            action="{{ route('orders.index') }}">

            <div class="row">

                {{-- Buscar ID --}}
                <div class="col-md-5 mb-3">

                    <label class="form-label">

                        Buscar Pedido

                    </label>

                    <input type="number"
                        name="search"
                        class="form-control"
                        placeholder="ID pedido..."
                        value="{{ request('search') }}">

                </div>

                {{-- Estado --}}
                <div class="col-md-5 mb-3">

                    <label class="form-label">

                        Estado

                    </label>

                    <select name="status"
                        class="form-select">

                        <option value="">
                            Todos los estados
                        </option>

                        <option value="pending"
                            {{ request('status') === 'pending' ? 'selected' : '' }}>

                            Pendiente

                        </option>

                        <option value="processing"
                            {{ request('status') === 'processing' ? 'selected' : '' }}>

                            Procesando

                        </option>

                        <option value="completed"
                            {{ request('status') === 'completed' ? 'selected' : '' }}>

                            Completado

                        </option>

                        <option value="cancelled"
                            {{ request('status') === 'cancelled' ? 'selected' : '' }}>

                            Cancelado

                        </option>

                    </select>

                </div>

                {{-- Botones --}}
                <div class="col-md-2 d-flex align-items-end mb-3">

                    <div class="d-flex gap-2 w-100">

                        <button class="btn btn-dark w-100">

                            Filtrar

                        </button>

                        <a href="{{ route('orders.index') }}"
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
            <th>Total</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        @forelse($orders as $order)

            <tr>

                <td>

                    #{{ $order->id }}

                </td>

                <td>

                    ${{ number_format($order->total, 2) }}

                </td>

                <td>

                    @if($order->status === 'pending')

                        <span class="badge bg-warning">

                            Pendiente

                        </span>

                    @elseif($order->status === 'processing')

                        <span class="badge bg-primary">

                            Procesando

                        </span>

                    @elseif($order->status === 'completed')

                        <span class="badge bg-success">

                            Completado

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Cancelado

                        </span>

                    @endif

                </td>

                <td>

                    {{ $order->created_at->format('d/m/Y H:i') }}

                </td>

                <td class="d-flex gap-2">

                    {{-- Ver detalle --}}
                    <a href="{{ route('orders.show', $order->id) }}"
                        class="btn btn-dark btn-sm">

                        Ver

                    </a>

                    {{-- Editar estado --}}
                    <a href="{{ route('orders.edit', $order->id) }}"
                        class="btn btn-warning btn-sm">

                        Estado

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5"
                    class="text-center">

                    No hay pedidos registrados

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection