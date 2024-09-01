@extends('layout')

@section('title', 'Detalle de Cliente')

@section('content')
    <h1>Detalle de Cliente</h1>

    <p><strong>ID:</strong> {{ $cliente->id }}</p>
    <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
    <p><strong>Documento:</strong> {{ $cliente->documento }}</p>
    <p><strong>Tipo Documento:</strong> {{ $cliente->tipo_documento }}</p>

    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Volver</a>
@endsection
