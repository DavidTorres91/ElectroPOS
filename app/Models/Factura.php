<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'total_sin_iva',
        'iva',
        'total_con_iva'
    ];

    // Relación con Cliente: una factura pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación con Producto a través de FacturaProducto: una factura tiene muchos productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'factura_productos')
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }
}
