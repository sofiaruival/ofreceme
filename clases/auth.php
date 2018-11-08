<?php
/**
 *
 */
class Auth{

  function __construct(){

    session_start();

    //IF PARA RECORDAME
    if(isset($_COOKIE["usuarioLogueado"])
      && !ISSET($_SESSION["usuarioLogueado"])){
        $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
    }

  }

  //YA VALIDADO LOGUEAR
  public function loguear($email){
    $_SESSION["usuarioLogueado"]=$email;

  }

  //SI USURIO ESTA LOGUEADO LO USO PARA??
  public function estaLogueado() {
    return isset($_SESSION["usuarioLogueado"]);
  }

  public function usuarioLogueado() {
    global $db;
    return $db->buscarPorEmail($_SESSION["usuarioLogueado"]);
  }


}

 ?>
