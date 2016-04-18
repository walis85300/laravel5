<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_Modulo extends Model
{
    //

    protected $table = 'Roles_Modulos';

    protected $visible = ['Modulos_codigo', 'Roles_codigo', 'Crear', 'Leer', 'Modificar', 'Eliminar'];

    public function role() {
    	return $this->belongsTo('App\Rol', 'Roles_codigo', 'Codigo');
    }

    public function modulo() {
    	return $this->belongsTo('App\Modulo', 'Modulos_codigo', 'Codigo');
    }
}
