<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombre', 'apellido','fecha_i',
        'fecha_e', 'grado', 'fecha_n',
        'direccion','telefono','baja'
    ];
}
