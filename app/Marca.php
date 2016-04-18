<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //

	protected $table = 'marca';

	protected $primaryKey = 'Cod_Marca';

	protected $visible = ['Cod_Marca', 'Descripcion'];

	protected $fillable = ['Cod_Marca', 'Descripcion'];

	// Has many

	// public function modelo() {
	// 	return $this->hasMany('App\Modelo');
	// }

}
