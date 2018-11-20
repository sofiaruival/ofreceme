<?php

include_once('clases/db.php');
include_once('clases/usuario.php');

class DbMySql extends DB{

  protected $dbUsuarios;

  public function __construct(){
    $credenciales= file_get_contents("credenciales.json");
    $credenciales=json_decode($credenciales,true);

    $dsn = "mysql:host=localhost;dbname=Ofreceme;port=3306;";
    $usuario = $credenciales["usuario"];
    $pass = $credenciales["password"];

    try {
      $this->dbUsuarios = new PDO($dsn, $usuario, $pass);
      $this->dbUsuarios->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Exception $e) {
      echo $e->getMessage();
      echo "Hubo un error";exit;
    }
  }

  function crearUsuario($usuario) {

    $consulta = $this->dbUsuarios->prepare("INSERT into usuarios values
      (default, :nombre, :apellido, :email, null, :email, :password, null, null, null)");


    $consulta->bindValue(":nombre", $usuario->getnombre());
    $consulta->bindValue(":apellido", $usuario->getApellido());
    $consulta->bindValue(":email", $usuario->getEmail());
    $consulta->bindValue(":email", $usuario->getEmail());
    $consulta->bindValue(":password", $usuario->getPassword());
    $consulta->execute();
// crea el usuario mete un usuario en la DB??? por eso no hashea la password??
  //  $usuario["id"] = $db->lastInsertId();
//    return $usuario;
}


function traerUsuarios() {
  $consulta = $this->dbUsuarios->prepare("SELECT * FROM usuarios");

  $consulta->execute();

  $usuariosArray = $consulta->fetchAll(PDO::FETCH_ASSOC);
  $usuarios = [];

  foreach ($usuariosArray as $usuarioArray) {
    $usuarios[] = new Usuario($usuarioArray);
  }
  return $usuarios;
}

  //BUSCA X EMAIL
  function buscarPorEmail($email) {
    $consulta = $this->dbUsuarios->prepare("SELECT * FROM usuarios where email = :email");

    $consulta->bindValue(":email", $email);

    $consulta->execute();

    $usuarioArray = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuarioArray == null) {
      return null;
    }

    return new Usuario($usuarioArray);
  }

  //BUSCA POR ID
  function buscarPorID($id) {
    $consulta = $this->dbUsuarios->prepare("SELECT * FROM usuarios where id = :id");

    $consulta->bindValue(":id", $id);

    $consulta->execute();

    $usuarioArray = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($usuarioArray == NULL) {
      return NULL;
    }

    return new Usuario($usuarioArray);
  }

}



 ?>
