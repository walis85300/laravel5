<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_Empleado extends Model
{
    //
    protected $table = 'Roles_Empleado';

    protected $visible = ['Roles_codigo', 'Empleado_Cedula'];

    protected $fillable = ['Roles_codigo', 'Empleado_Cedula'];

    // Belongs to

    public function empleado() {
    	return $this->belongsTo('App\Empleado', 'Cedula', 'Empleado_Cedula');
    }

    public function rol() {
    	return $this->belongsTo('App\Rol', 'Roles_codigo', 'Codigo');
    }


}
