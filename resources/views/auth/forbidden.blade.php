@extends('layouts.app')

@section('title','Acceso Denegado')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow border-0 mt-5">

                <div class="card-body text-center p-5">

                    {{-- Código error --}}
                    <h1 class="display-1 text-danger">

                        403

                    </h1>

                    {{-- Título --}}
                    <h2 class="mb-3">

                        Acceso Denegado

                    </h2>

                    {{-- Descripción --}}
                    <p class="text-muted mb-4">

                        No tienes permisos para acceder a esta sección.

                    </p>

                    {{-- Botón volver --}}
                    <a href="{{ url()->previous() }}"
                        class="btn btn-dark">

                        Volver

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection