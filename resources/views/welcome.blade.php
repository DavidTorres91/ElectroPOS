@extends('layout')

@section('title', 'Bienvenido a ElectroPOS')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5 text-center">
        <h1>Bienvenido a ElectroPOS</h1>
        <p>La solución perfecta para la gestión de tu empresa de suministros.</p>
    </div>
</div>

<div class="row mt-4 text-center">
    <!-- Gestión de Clientes -->
    <div class="col-md-4">
        <a href="{{ url('/clientes') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-people" style="font-size: 3rem; color: #007bff;"></i>
                    <p class="mt-3 mb-0 text-dark">Gestión de Clientes</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Gestión de Productos -->
    <div class="col-md-4">
        <a href="{{ url('/productos') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-box-seam" style="font-size: 3rem; color: #28a745;"></i>
                    <p class="mt-3 mb-0 text-dark">Gestión de Productos</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Gestión de Facturas -->
    <div class="col-md-4">
        <a href="{{ url('/facturas') }}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <i class="bi bi-receipt" style="font-size: 3rem; color: #ffc107;"></i>
                    <p class="mt-3 mb-0 text-dark">Gestión de Facturas</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
