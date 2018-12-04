<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

  public $table = 'productos';
  public $guarded = [];

  public function bringCategories(){
    return $this->belongsToMany('Categoria::class','producto/categoria','producto_id','categoria_id');
  }

}
