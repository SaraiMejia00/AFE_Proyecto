@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                <h2 class="mb-4 text-center">

                    Iniciar Sesión

                </h2>

                {{-- Error login --}}
                @if(session('error'))

                    <div class="alert alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

                <form action="{{ route('authenticate') }}"
                    method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label">

                            Email

                        </label>

                        <input type="email"
                            name="email"
                            class="form-control">

                    </div>

                    {{-- Password --}}
                    <div class="mb-4">

                        <label class="form-label">

                            Contraseña

                        </label>

                        <input type="password"
                            name="password"
                            class="form-control">

                    </div>

                    <button class="btn btn-dark w-100">

                        Ingresar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection