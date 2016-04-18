<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $table = 'Color';

    protected $primaryKey = 'Cod_Color';

    protected $visible = ['Cod_Color', 'Descripcion'];

    protected $fillable = ['Descripcion'];

}
