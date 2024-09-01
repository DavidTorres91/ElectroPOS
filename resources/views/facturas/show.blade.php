@extends('layout')

@section('title', 'Detalles de la Factura')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h2 class="text-center">Detalles de la Factura</h2>
        <div class="card">
            <div class="card-header">
                Factura #{{ $factura->id }}
            </div>
            <div class="card-body">
                <p><strong>Cliente:</strong> {{ $factura->cliente->nombre }}</p>
                <p><strong>Total sin IVA:</strong> {{ $factura->total_sin_iva }}</p>
                <p><strong>IVA:</strong> {{ $factura->iva }}</p>
                <p><strong>Total con IVA:</strong> {{ $factura->total_con_iva }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
