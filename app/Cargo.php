<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //
    protected $table = 'Cargo';

    protected $visible = ['Cod_Cargo', 'Descripcion'];

    public function empleados() {
    	return $this->hasMany('App\Empleado', 'Cargo_Cod_Cargo', 'Cod_Cargo');
    }
}
