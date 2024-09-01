<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Producto;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('facturas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        $factura = Factura::create([
            'cliente_id' => $request->cliente_id,
            'total_sin_iva' => 0,
            'iva' => 0,
            'total_con_iva' => 0,
        ]);

        $totalSinIva = 0;

        foreach ($request->productos as $productoData) {
            $cantidad = $productoData['cantidad'];
            $precioUnitario = $productoData['precio_unitario'];
            $subtotal = $cantidad * $precioUnitario;
            $totalSinIva += $subtotal;

            $factura->productos()->attach($productoData['id'], [
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario
            ]);
        }

        $iva = $totalSinIva * 0.16; // 16% IVA
        $totalConIva = $totalSinIva + $iva;

        $factura->update([
            'total_sin_iva' => $totalSinIva,
            'iva' => $iva,
            'total_con_iva' => $totalConIva,
        ]);

        return redirect()->route('facturas.index')->with('success', 'Factura creada correctamente.');
    }

    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        return view('facturas.show', compact('factura'));
    }

    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('facturas.edit', compact('factura', 'clientes', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'productos' => 'required|array',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ]);

        $factura->update([
            'cliente_id' => $request->cliente_id,
        ]);

        // Eliminar productos existentes
        $factura->productos()->detach();

        // Agregar productos nuevos
        $totalSinIva = 0;

        foreach ($request->productos as $productoData) {
            $cantidad = $productoData['cantidad'];
            $precioUnitario = $productoData['precio_unitario'];
            $subtotal = $cantidad * $precioUnitario;
            $totalSinIva += $subtotal;

            $factura->productos()->attach($productoData['id'], [
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario
            ]);
        }

        $iva = $totalSinIva * 0.16; // 16% IVA
        $totalConIva = $totalSinIva + $iva;

        $factura->update([
            'total_sin_iva' => $totalSinIva,
            'iva' => $iva,
            'total_con_iva' => $totalConIva,
        ]);

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada correctamente.');
    }
}
