
<?php
  session_start();

//IF PARA RECORDAME
  if(isset($_COOKIE["usuarioLogueado"])&& !ISSET($_SESSION["usuarioLogueado"])){
    $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
  }

  $dsn = "mysql:host=localhost;dbname=usuarios;port=3306;";
  $usuario = "root";
  $pass = "root";

  try {
    $db = new PDO($dsn, $usuario, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (\Exception $e) {
    echo "Hubo un error";exit;
  }

/** function: validarDatosRegistrate.
 *
 * Valida datos de registración.
 *
 * @param array   $datos  Colección de elementos para verificar.
 *                La función verificará los elentos:
 *                nombre, apellido, email, password.
 *
 *            VERIFICACIONES:
 *                nombre: Que no esté vacio el campo.
 *                nombre: Que posea solo letras.
 *
 *                apellido: Que no se encuentre vacío.
 *                apellido: Que posea solo letras.
 *
 *                email: Que no se encuentre vacío.
 *                email: Que posea formato de email.
 *                email: Que el mail no se encuentre ya registrado en el back-end.
 *
 *                password: Que no se encuentre vacío.
 *                password: Que corresponda email vs. password.
 *
 * @throws.       No arroja excepciones.
 * @author        Sofia, Lucila, Gregorio.
 * @return array  Devuelve un array asociativo cargado con los errores
 *                correspondientes a cada valor verificado. Si el array vuelve
 *                vacío significa que no hubo errores.
 */

function validarDatosRegistrate($datos){
  $datosFinales =[];
  $errores=[];

  foreach ($datos as $posicion => $dato) {
    $datosFinales[$posicion] = trim($dato);
  }


  if ($datosFinales["nombre"] == "") {
    $errores["nombre"] = "Hubo error en el nombre porque esta vacio";
  } else if (ctype_alpha($datosFinales["nombre"]) == false) {
    $errores["nombre"] = "Hubo error en el nombre porque tiene caracteres que no son alfabeticos";
  }

  if ($datosFinales["apellido"] == "") {
    $errores["apellido"] = "Hubo error en el apellido porque esta vacio";
  } else if (ctype_alpha($datosFinales["apellido"]) == false) {
    $errores["apellido"] = "Hubo error en el apellido porque tiene caracteres que no son alfabeticos";
  }

  if ($datosFinales["password"] == "") {
    $errores["password"] = "Hubo error en la contrasenia porque esta vacia";
  }
  else if (strlen($datosFinales["password"]) < 8) {
      $errores["password"] = "La contrasenia debe tener al menos 8 caracteres,
      un número y una minúscula y una mayuscula.";
  }
  else if (!preg_match("#[0-9]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos 8 caracteres,
      un número y una minúscula y una mayuscula.";
  }
  else if (!preg_match("#[A-Z]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos 8 caracteres,
      un número y una minúscula y una mayuscula.";
  }
  else if (!preg_match("#[a-z]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos 8 caracteres,
      un número y una minúscula y una mayuscula.";
  }

  if ($datosFinales["email"] == "") {
    $errores["email"] = "Hubo error en el email porque esta vacio";
  }
  else if ( filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El email no es un email";
  }

  elseif ( buscarPorEmail($datosFinales["email"] ) != NULL) {
    $errores["email"]= "El Mail ya esta en uso.";
  }

  if($_FILES["avatar"]["error"] != 0){
    $errores["avatar"] = "Hubo un error en la carga.";
  } else{
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext !="png"){
      $errores["avatar"] ="Solo podes subir fotos jpg o png";
    }
  }

    return $errores;
}


//VALIDACION LOGIN

/** function: validarDatosLogin.
 *
 * Valida datos de login a la aplicación.
 *
 * @param array   $datos  Colección de elementos para verificar.
 *                La función verificará los elentos:
 *                email, password.
 *
 *                VERIFICACIONES:
 *                email: Que no se encuentre vacío.
 *                email: Que posea formato de email.
 *                email: Que el mail se encuentre registrado en el back-end.
 *
 *                password: Que no se encuentre vacío.
 *                password: Que corresponda email vs. password.
 *
 * @throws.       No arroja excepciones.
 * @author        Sofia, Lucila, Gregorio.
 * @return array  Devuelve un array asociativo cargado con los errores
 *                correspondientes a cada valor verificado. Si el array vuelve
 *                vacío significa que no hubo errores.
 */

function validarDatosLogin($datos){
  $usuarioActual;
  $datosFinales =[];
  $errores=[];

  foreach ($datos as $posicion => $dato) {
    $datosFinales[$posicion] = trim($dato);
  }

    if ($datosFinales["email"] == "") {
      $errores["email"] = "Hubo error en el email porque esta vacio";
    }
    else if ( filter_var($datosFinales["email"], FILTER_VALIDATE_EMAIL) == false) {
      $errores["email"] = "El email no es un email";
    }
    if ($datosFinales["password"] == "") {
      $errores["password"] = "Hubo error en la contrasenia porque esta vacia";
    }

    if(!isset($errores["email"])){
      $usuarioActual = buscarPorEmail($datosFinales["email"]);
      if($usuarioActual == NULL) {
          $errores["email"] = "El email no existe";
      }
      else if(!password_verify($datosFinales["password"],
      $usuarioActual["password"])) {
          $errores["password"] = "Password incorrecto";
      }
    }

  return $errores;
}

//YA VALIDADO LOGUEAR
function loguear($email){
  $_SESSION["usuarioLogueado"]=$email;

}

//SI USURIO ESTA LOGUEADO LO USO PARA??
function estaLogueado() {
  return isset($_SESSION["usuarioLogueado"]);
}

// LA USO PARA TRAER LA FOTO AL HEADER CUANDO YA SE LOGUEO
function traerFoto() {
  $usuario = buscarPorEmail($_SESSION["usuarioLogueado"]);

  $foto = glob("img/" . $usuario["email"] . "*")[0];

  return $foto;
}

// PARA QUE EL LISTADO DE USUARIOS EMPIECE CON ID 1 SI ESTA VACIO Y SE INCREMENTE EN 1
function proximoId(){
  if (!file_exists ( "usuarios.json" )){
      $file = fopen("usuarios.json","w");
  }
  $json= file_get_contents("usuarios.json");
  if ($json ==""){
    return 1;
  }

  $usuarios= json_decode($json, true);
  //var_dump($usuarios);
  //var_dump(array_pop($usuarios));
  $ultimo= array_pop($ususarios);

  return $ultimo["id"]+1;
}
//ARMA EL USUARIO PARA GUARDARLO EN LISTADO DE USUARIOS
function armarUsuario(){
  return[
    "id"=> proximoId(),
    "nombre"=> trim($_POST["nombre"]),
    "apellido"=> trim($_POST["apellido"]),
    "email"=> trim($_POST["email"]),
    "password"=> password_hash($_POST["password"],PASSWORD_DEFAULT),
  ];
}
//CREA /AGREGA UN USUARIO NUEVO AL LISTADO DE USUARIOS
function crearUsuario($usuario) {
global $db;
$consulta = $db->prepare("INSERT into usuarios values (default, :nombre, :apellido, :password, :email)");

$consulta->bindValue(":nombre", $usuario["nombre"]);
$consulta->bindValue(":apellido", $usuario["apellido"]);
$consulta->bindValue(":password", $usuario["password"]);
$consulta->bindValue(":email", $usuario["email"]);

$consulta->execute();
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

?>
