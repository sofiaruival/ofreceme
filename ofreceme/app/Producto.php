<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Producto extends Model
{

  public $table = 'productos';
  public $guarded = [];

  public function bringCategories(){
    return $this->belongsToMany(Categoria::class,'producto_categoria','producto_id','categoria_id');
  }

  public function marca(){
    return $this->belongsTo("App\Marca","marca_id");
  }

}
