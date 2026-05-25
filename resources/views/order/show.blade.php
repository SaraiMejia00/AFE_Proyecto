@extends('layouts.admin')

@section('title', 'Pedido')

@section('content')

<x-back route="orders.index" />
<x-page-header title="Pedido Realizado" />

<x-success-alert />

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body">

        <h5>

            Pedido #{{ $order->id }}

        </h5>

        <p>

            Estado:
            <span class="badge bg-success">

                {{ $order->status }}

            </span>

        </p>

        <h4>

            Total:
            ${{ number_format($order->total, 2) }}

        </h4>

    </div>

</div>

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>

    </thead>

    <tbody>

        @foreach($order->items as $item)

            <tr>

                <td>

                    {{ $item->product?->name }}

                </td>

                <td>

                    {{ $item->quantity }}

                </td>

                <td>

                    ${{ number_format($item->price, 2) }}

                </td>

            </tr>

        @endforeach

    </tbody>

</table>

@endsection