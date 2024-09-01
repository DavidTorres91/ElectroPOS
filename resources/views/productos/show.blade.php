@extends('layout')

@section('title', 'Detalle de Producto')

@section('content')
    <h1>Detalle de Producto</h1>

    <p><strong>ID:</strong> {{ $producto->id }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
    <p><strong>Código:</strong> {{ $producto->codigo }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio }}</p>

    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
@endsection

