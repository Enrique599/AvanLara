<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'Id_categoria';
    public $timestamps = false;

    protected $fillable = ['Nombre'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'Id_categoria', 'Id_categoria');
    }
}
