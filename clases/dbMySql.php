<?php

include_once('clases/db.php');
include_once('clases/usuario.php');
/**
 *
 */
class DbMySql extends DB{

  protected $dbUsuarios;

  public funcion __construct(){
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
    global $db;
    $consulta = $db->prepare("INSERT into usuarios values
      (default, :nombre, :apellido, :email, null, :email, :password, null, null, null)");


    $consulta->bindValue(":nombre", $usuario["nombre"]);
    $consulta->bindValue(":apellido", $usuario["apellido"]);
    $consulta->bindValue(":password", $usuario["password"]);
    $consulta->bindValue(":email", $usuario["email"]);



    $consulta->execute();

    $usuario["id"] = $db->lastInsertId();

    return $usuario;

  }


  function traerUsuarios() {
    global $db;
    $consulta = $db->prepare("SELECT * FROM usuarios");

    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
  }

  //BUSCA X EMAIL
  function buscarPorEmail($email) {
    global $db;
    $consulta = $db->prepare("SELECT * FROM usuarios WHERE email = :email");

    $consulta->bindValue(":email", $email);

    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
  }

  //BUSCA POR ID
  function buscarPorID($id) {
    global $db;
    $consulta = $db->prepare("SELECT * FROM usuarios WHERE id = :id");

    $consulta->bindValue(":id", $id);

    $consulta->execute();

    return $consulta->fetch(PDO::FETCH_ASSOC);
  }

}



 ?>
