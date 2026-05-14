@extends('layouts.admin')

@section('title', 'Inventario')

@section('content')

<x-page-header title="Inventario">

    <x-create-button
        route="inventory.create"
        text="Nuevo Movimiento" />

</x-page-header>

<x-success-alert />

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Tipo</th>
            <th>Cantidad</th>
            <th>Motivo</th>
            <th>Fecha</th>
        </tr>

    </thead>

    <tbody>

        @forelse($movements as $movement)

            <tr>

                <td>{{ $movement->id }}</td>

                <td>{{ $movement->product->name }}</td>

                <td>

                    @if($movement->type === 'entry')

                        <span class="badge bg-success">

                            Entrada

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Salida

                        </span>

                    @endif

                </td>

                <td>{{ $movement->quantity }}</td>

                <td>{{ $movement->reason }}</td>

                <td>
                    {{ $movement->created_at->format('d/m/Y H:i') }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    No hay movimientos registrados

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection