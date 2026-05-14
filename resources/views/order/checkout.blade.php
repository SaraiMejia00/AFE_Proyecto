@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<x-page-header title="Finalizar Compra" />

@php
    $total = 0;
@endphp

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>

    </thead>

    <tbody>

        @foreach($cart as $item)

            @php
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            @endphp

            <tr>

                <td>{{ $item['name'] }}</td>

                <td>
                    ${{ number_format($item['price'], 2) }}
                </td>

                <td>{{ $item['quantity'] }}</td>

                <td>
                    ${{ number_format($subtotal, 2) }}
                </td>

            </tr>

        @endforeach

    </tbody>

</table>

<div class="text-end mb-4">

    <h3>

        Total:
        ${{ number_format($total, 2) }}

    </h3>

</div>

<form action="{{ route('checkout.process') }}"
    method="POST">

    @csrf

    <button class="btn btn-success">

        Confirmar Compra

    </button>

</form>

@endsection