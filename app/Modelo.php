<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    //

    protected $table = 'modelo';

    protected $primaryKey = 'Cod_Modelo';

    protected $visible = ['Cod_Modelo', 'Descripcion', 'Ano', 'Caracteristicas', 'Marca_Cod_Marca'];
    
    protected $fillable = ['Descripcion', 'Ano', 'Caracteristicas', 'Marca_Cod_Marca'];

    // Belongs to

    public function marca() {
    	return $this->belongsTo('App\Marca', 'Marca_Cod_Marca', 'Cod_Marca');
    }
}
