<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $table = 'categorias';
    public $guarded = [];

    public function bringProducts(){
      return $this->belongsToMany('Producto::class','producto/categoria','categoria_id','producto_id');
    }
}
