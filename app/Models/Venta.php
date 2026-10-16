<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'Id_venta';
    public $timestamps = false;

    protected $fillable = ['Fecha', 'Realizacion', 'Total', 'Id_cliente', 'Total_piezas'];

    protected $casts = ['Fecha' => 'date'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_cliente', 'Id_cliente');
    }

    /** Las ventas reales: excluye los pedidos a proveedor (se guardan en esta misma tabla con 'PROV:'). */
    public function scopeReales($q)
    {
        return $q->where('Realizacion', 'not like', 'PROV:%');
    }
}
