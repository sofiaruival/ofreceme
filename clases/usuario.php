<?php
/**
 *
 */

include_once('clases/model.php');

class Usuario extends Model{

  public function __construct(){

    //ARMA EL USUARIO PARA GUARDARLO EN LISTADO DE USUARIOS
    function armarUsuario(){
      return[
        "id"=> "default",
        "nombre"=> trim($_POST["nombre"]),
        "apellido"=> trim($_POST["apellido"]),
        "email"=> trim($_POST["email"]),
        "password"=> password_hash($_POST["password"],PASSWORD_DEFAULT),
      ];
    }
    
  }

  // LA USO PARA TRAER LA FOTO AL HEADER CUANDO YA SE LOGUEO
  public function traerFoto() {
    $usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);

    $foto = glob("img/" . $usuario["email"] . "*")[0];

    return $foto;
  }
}


 ?>
