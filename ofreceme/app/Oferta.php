<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class Oferta extends Model
{
  public $table = 'ofertas';
  public $guarded = [];

  public function bringProducto(){
    return $this->belongsTo("App\Producto","producto_id");
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
