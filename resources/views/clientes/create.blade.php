@extends('layout')

@section('title', 'Crear Cliente')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>Crear Cliente</h2>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select name="tipo_documento" class="form-control" required>
                    <option value="CC">Cédula de Ciudadanía</option>
                    <option value="NIT">NIT</option>
                </select>
            </div>
            <div class="form-group">
                <label for="documento">Número de Documento:</label>
                <input type="text" name="documento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </form>
    </div>
</div>
@endsection
