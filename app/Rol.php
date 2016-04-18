<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //

    protected $table = 'roles';

    protected $visible = ['Codigo', 'Descripcion'];


    // Has many
    public function roles_empleado () {
    	return $this->hasMany('App\Roles_Empleado', 'Roles_codigo', 'Codigo');
    }

    public function roles_modulo () {
    	return $this->hasMany('App\Roles_Modulo', 'Roles_codigo', 'Codigo');
    }
}
