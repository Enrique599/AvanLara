<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'Id_pedido';
    public $timestamps = false;

    protected $fillable = ['Id_cliente', 'Fecha', 'Total', 'Totalpiezas'];

    protected $casts = ['Fecha' => 'date'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_cliente', 'Id_cliente');
    }
}
