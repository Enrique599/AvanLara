<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'Id_cliente';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Ap_paterno', 'Telefono', 'Contrasena', 'Direccion', 'CP'];

    protected $hidden = ['Contrasena'];

    public function getNombreCompletoAttribute(): string
    {
        return $this->Nombre . ' ' . $this->Ap_paterno;
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'Id_cliente', 'Id_cliente');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'Id_cliente', 'Id_cliente');
    }
}
