<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Oferta;

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

  public function bringOfertas(){
    return $this->hasMany("App\Oferta","producto_id");
  }

  public function getPicture() {
    $picture = $this->picture;

    if ($picture) {
      return "/storage/pictures/" . $picture;
    } else {
      return "/images/img-pdto-2.jpg";
    }
  }



}
