<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //

	protected $table = 'Modulos';

	protected $visible = ['Codigo', 'Descripcion'];

	// belongs To

	public function roles_modulo() {
		return $this->belongsTo('App\Roles_Empleado','Roles_codigo', 'Codigo');
	}

}
