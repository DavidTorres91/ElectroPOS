@extends('layout')

@section('title', 'Lista de Facturas')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1 mt-5">
        <h2 class="text-center">Lista de Facturas</h2>
        <div class="mb-3 text-right">
            <a href="{{ route('facturas.create') }}" class="btn btn-primary">Crear Factura</a>
        </div>
        <div class="row">
            @foreach($facturas as $factura)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Factura #{{ $factura->id }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $factura->cliente->nombre }}</h6>
                            <p class="card-text">
                                <strong>Total sin IVA:</strong> {{ $factura->total_sin_iva }}<br>
                                <strong>IVA:</strong> {{ $factura->iva }}<br>
                                <strong>Total con IVA:</strong> {{ $factura->total_con_iva }}
                            </p>
                            <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta factura?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
