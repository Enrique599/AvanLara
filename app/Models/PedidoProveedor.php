<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Pedido a proveedor. La BD no tiene tabla dedicada, así que (igual que el proyecto
 * original) se guarda en `venta` con Realizacion = "PROV:{id_proveedor}:{ESTADO}".
 */
class PedidoProveedor extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'Id_venta';
    public $timestamps = false;

    protected $fillable = ['Fecha', 'Realizacion', 'Total', 'Id_cliente', 'Total_piezas'];
    protected $casts = ['Fecha' => 'date'];

    protected static function booted(): void
    {
        static::addGlobalScope('proveedor', fn (Builder $q) => $q->where('Realizacion', 'like', 'PROV:%'));
    }

    public function getProveedorIdAttribute(): int
    {
        return (int) (explode(':', $this->Realizacion)[1] ?? 0);
    }

    public function getEstadoAttribute(): string
    {
        return explode(':', $this->Realizacion)[2] ?? 'PENDIENTE';
    }
}
