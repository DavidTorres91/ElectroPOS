@extends('layout')

@section('title', 'Editar Factura')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h2 class="text-center">Editar Factura</h2>
        <form action="{{ route('facturas.update', $factura->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $factura->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total_sin_iva">Total sin IVA:</label>
                <input type="text" name="total_sin_iva" id="total_sin_iva" class="form-control" value="{{ $factura->total_sin_iva }}">
            </div>
            <div class="form-group">
                <label for="iva">IVA:</label>
                <input type="text" name="iva" id="iva" class="form-control" value="{{ $factura->iva }}">
            </div>
            <div class="form-group">
                <label for="total_con_iva">Total con IVA:</label>
                <input type="text" name="total_con_iva" id="total_con_iva" class="form-control" value="{{ $factura->total_con_iva }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Factura</button>
        </form>
    </div>
</div>
@endsection
