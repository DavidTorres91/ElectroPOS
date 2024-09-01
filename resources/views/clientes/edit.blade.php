@extends('layout')

@section('title', 'Editar Cliente')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $cliente->nombre }}">
        </div>
        <div class="form-group">
            <label for="tipo_documento">Tipo de Documento:</label>
            <select class="form-control" id="tipo_documento" name="tipo_documento">
                <option value="CC" {{ $cliente->tipo_documento === 'CC' ? 'selected' : '' }}>Cédula</option>
                <option value="NIT" {{ $cliente->tipo_documento === 'NIT' ? 'selected' : '' }}>NIT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" value="{{ $cliente->documento }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
