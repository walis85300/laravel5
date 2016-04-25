<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Empleado extends Model implements AuthenticatableContract
{
    use Authenticatable;

    //

    protected $table = 'Empleado';

    protected $primaryKey = 'Cedula';

    protected $visible = ['Cedula', 'Nombre', 'Apellido'];

    protected $fillable = ['Cedula', 'Nombre', 'Apellido', 'Direccion', 'Telefono', 'Jefe', 'Cargo_Cod_Cargo', 'email', 'password'];

    // Has Many
    public function roles_empleado() {
    	// primer parametro: como se llama en la otra tabla
    	// segundo parametro: somo se llama en esta tabla 
    	return $this->hasMany('App\Roles_Empleado', 'Empleado_Cedula', 'Cedula');
    }

    public function cargo() {
        return $this->belongsTo('App\Cargo', 'Cargo_Cod_Cargo', 'Cod_Cargo');
    }
}
