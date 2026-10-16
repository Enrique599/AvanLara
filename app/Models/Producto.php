<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'registroproductos';
    protected $primaryKey = 'Id_producto';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Stock', 'Id_categoria', 'Preciopro', 'Precioneto'];

    protected $casts = ['Preciopro' => 'float', 'Precioneto' => 'float'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'Id_categoria', 'Id_categoria');
    }
}
