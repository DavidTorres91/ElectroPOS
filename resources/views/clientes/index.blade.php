@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lista de Clientes</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Agregar Cliente</a>
                <div class="row">
                    @foreach($clientes as $cliente)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{ $cliente->nombre }}</h5>
                                    @if ($cliente->tipo_documento === 'NIT')
                                    <span class="badge badge-warning" style="font-size: 0.8em; padding: 2px 6px; border-radius: 4px; background-color: #6c757d; border-color: #6c757d;">Empresa</span>
                                    @else
                                    <span class="badge badge-primary" style="font-size: 0.8em; padding: 2px 6px; border-radius: 4px; background-color: #007bff; border-color: #007bff;">Persona</span>
                                    @endif
                                </div>
                                <p class="card-text"><strong>ID:</strong> {{ $cliente->id }}</p>
                                <p class="card-text"><strong>Documento:</strong> {{ $cliente->documento }}</p>
                                <p class="card-text"><strong>Tipo Documento:</strong> {{ $cliente->tipo_documento }}</p>
                                <div class="btn-group">
                                    <!-- Eliminando el botón de "Ver" -->
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
