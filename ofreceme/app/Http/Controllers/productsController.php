<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use App\Producto;

class productsController extends Controller
{
      public function misDeseos() {
        if (!Auth::check()) {
          return redirect("/login");
        }

        $productos = Auth::user()->productos;

        $tituloPrincipal = "Mis Deseos:";

        return view('/productos',compact('productos','categoria', 'tituloPrincipal'));
      }



      public function Products($id){

        //$productos = Producto::limit(10)->get();
        $categoria = Categoria::find($id);
        $productos = $categoria->bringProducts;


        return view('/productos',compact('productos','categoria'));
      }

      public function show(){
        return view('newproduct');
      }

      public function edit($id){
        $producto = Producto::find($id);

        return view('/newproduct', compact('producto'));
      }

      public function store(Request $req){
        $validar = $req->validate([
          "nombre"=>"required",

        ]);//validar

         $ruta = $req["picture"]->store("/public/pictures");
         $nombreArchivo = basename($ruta);



          $producto = new Producto;     //Crear el objeto productos

          $producto->nombre = $req["nombre"];         //Guardar propiedars
          $producto->precio = $req["precio"];
          $producto->usuario_id = Auth::id();
          $producto->cantidad = $req["cantidad"];
          $producto->picture = $nombreArchivo;
          $producto->save();

          //Guardo también en la tabla intermedia. producto-categoria
          $producto->bringCategories()->attach($req["categoria"]);

          return redirect("/");
      }

      public function update(Request $req, $id)
      {
        $validar = $req->validate([
          "nombre"=>"required",

        ]);//validar

          $producto = Producto::find($id); //Crear el objeto productos

          $producto->nombre = $req["nombre"];         //Guardar propiedars
          $producto->precio = $req["precio"];
          //dd($producto);
          $producto->save();

          return redirect("/");
      }



}
