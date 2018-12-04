<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class productsController extends Controller
{
      function Products($id){

        $categoria = Categoria::find($id);

        return view('/newProducts',compact('categoria'));
      }
}
