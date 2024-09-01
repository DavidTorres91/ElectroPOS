<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'factura_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    // Relación con Factura: una línea de factura pertenece a una factura
    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    // Relación con Producto: una línea de factura pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
