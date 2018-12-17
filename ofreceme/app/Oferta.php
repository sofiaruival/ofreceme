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

  
}
