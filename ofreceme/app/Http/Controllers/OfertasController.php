<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Oferta;
use App\Producto;


class OfertasController extends Controller
{

  public function misOfertas() {
    if (!Auth::check()) {
      return redirect("/login");
    }

    $ofertas = Auth::user()->ofertas;
    return view('misOfertas',compact('ofertas'));
  }

  public function Ofertas($id){
    $producto = Producto::find($id);
    $ofertas = $producto->bringOfertas;

    return view('/ofertas',compact('ofertas','productos'));
  }


    public function show($id){

      if (!Auth::check()) {
        return redirect("/login");
      }

      $producto = Producto::find($id);

      return view('newOferta',compact('producto'));
    }

    public function edit($id){
      $oferta = Oferta::find($id);

      return view('/newOferta', compact('oferta'));
    }

    public function store(Request $req){
      $validar = $req->validate([
        "descripcion"=>"required",

      ]);//validar

        $oferta = new Oferta;     //Crear el objeto Oferta
        //dd($oferta);

        $oferta->descripcion = $req["descripcion"];         //Guardar propiedars
        $oferta->precio = $req["precio"];
        $oferta->user_id = Auth::id();
        $oferta->producto_id = $req["product_id"];
        //dd($oferta);
        $oferta->save();

        return redirect("/");
    }

    public function update(Request $req, $id)
    {
      $validar = $req->validate([
        "descripcion"=>"required",

      ]);//validar

        $oferta = Oferta::find($id); //Crear el objeto Oferta

        $oferta->descripcion = $req["descripcion"];         //Guardar propiedars
        $oferta->precio = $req["precio"];
        $oferta->user_id = Auth::id();
        $oferta->producto_id = $producto->id;
        //dd($oferta);
        $oferta->save();

        return redirect("/");
    }



}
