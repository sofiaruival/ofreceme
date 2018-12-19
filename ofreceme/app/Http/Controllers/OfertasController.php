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

        $ruta = $req["picture"]->store("/public/pictures");
        $nombreArchivo = basename($ruta);


        $oferta = new Oferta;     //Crear el objeto Oferta
        //dd($oferta);

        $oferta->descripcion = $req["descripcion"];         //Guardar propiedars
        $oferta->precio = $req["precio"];
        $oferta->user_id = Auth::id();
        $oferta->producto_id = $req["product_id"];
        $oferta->picture = $nombreArchivo;
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

    public function showOfertas($id){

      $producto = Producto::find($id);

      return view("/detallesOfertasDeMiDeseo",compact('producto'));


    }

// ----- Carrito de Gregorio ----
//
    public function addToCart(Request $req, $id)
    {

        $oferta = Oferta::find($req['oferta_id']);
        $oferta->state = 1;
        $oferta->save();

        $producto = Producto::find($oferta->producto_id);
        $producto->state = 1;
        $producto->save();

        $user_id = Auth::id();

        $productos = Producto::where('state','=',1)->get();
        // $ofertas = Oferta::where('state','=',1)->get();
        $ofertas = \DB::table('ofertas')
                    ->join('productos','ofertas.producto_id','=','productos.id')
                    ->where([
                      ['productos.usuario_id','=',$user_id],
                      ['ofertas.state','=',1],
                    ])->get();

      return view("/miCarrito",compact('ofertas'));
      }

      public function viewCart(){
        $user_id = Auth::id();
        //$ofertas = Oferta::where('state','=',1)->get();
        $ofertas = \DB::table('ofertas')
                    ->join('productos','ofertas.producto_id','=','productos.id')
                    ->where([
                      ['productos.usuario_id','=',$user_id],
                      ['ofertas.state','=',1],
                    ])->get();

        return view("/miCarrito",compact('ofertas'));

      }



// _____________Intento de carrito de SOFI con cart en Session, NO funciona_________

    // public function addToCart(Request $req){
    //   $oferta = Oferta::find($req['oferta_id'])
      // //
      // // $cart = session("cart");
      // //
      // // if(!$cart){
      // //   $cart=[];
      // // }
      // // $cart[] = [
      // //   "idOferta"=>$ofertas,
      // //
      // // ];
      // // session(["cart"=>$cart]);
      //
      // return view("/miCarrito",compact('ofertas'));
    // }

    // public function checkout(){
    //
    //         if (!Auth::check()) {
    //       		return redirect("/login");
    //       	}
    //
    //       	$cart = session("cart");
    //
    //       	if (!$cart) {
    //       		return redirect("/detallesOfertasDeMiDeseo");
    //       	}
    //
    //       	$finalOfertas = [];
    //       	$total = 0;
    //
    //       	foreach ($cart as $item) {
    //           $oferta = Oferta::find($item["idOferta"]);
    //
    //       		$total +=  $oferta->precio;
    //
    //       		$finalOfertas[] = $oferta;
    //       	}
    //
    //       	// return view("checkout", compact("finalProducts", "total"));
    //
    //   return view('checkout',compact("finalOfertas", "total"));
    // }



}
