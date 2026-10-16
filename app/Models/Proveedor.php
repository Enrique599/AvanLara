<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proovedor';
    protected $primaryKey = 'Id_proovedor';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Ap_paterno', 'Telefono', 'Direccion'];
}
