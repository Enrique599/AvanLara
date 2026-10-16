<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
    protected $table = 'prendas';
    protected $primaryKey = 'Id_prendas';
    public $timestamps = false;

    protected $fillable = ['Prendas', 'Num_piezas'];
}
