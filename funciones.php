
<?php
  session_start();

function validarDatosRegistrate($datos){
//agrego datos finales, asiq ue voya  tener que renonbrar los if de las validaciones//
  $datosFinales =[];
  $errores=[];

  foreach ($datos as $posicion => $dato) {
    $datosFinales[$posicion] = trim($dato);
  }

//esto lo voy a cambiara como lo puso Dario, en registrate en vez de en funciones//
/*
  $nombre= $_POST["nombre"];
  $email=$_POST["email"];
  $apellido=$_POST["apellido"];
  $contraseña=$_POST["contraseña"];
*/

  // VALIDACION NOMBRE
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
      $errores["password"] = "La contrasenia debe tener al menos 8 caracteres";
  }
  else if (!preg_match("#[0-9]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos un numero!";
  }
  else if (!preg_match("#[A-Z]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos una mayuscula!";
  }
  else if (!preg_match("#[a-z]+#", $datosFinales["password"])) {
      $errores["password"] = "La contrasenia debe tener al menos una minuscula!";
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


/*
  if (strlen($username)==0) {
    $errores[]="No completaste el username.";
  }
  elseif (strlen($username)<5) {
    $errores[]="El username tiene que tener al menos 5 caracteres.";// code...// code...
  }
  if (strlen($apellido)==0) {
    $errores[]="No completaste el apellido.";
  }
  elseif (strlen($apellido)<5) {
    $errores[]="El apellido tiene que tener al menos 5 caracteres.";// code...// code...
  }
  if (strlen($email)==0) {
    $errores[]="No completaste el username.";
  }
  elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    $errores[]="No completaste el email.";
  }
  elseif ( buscarPorEmail($email["email"] ) != NULL) {
    $errores["email"]= "El Mail ya esta en uso.";
  }

  if (strlen($contraseña)==0) {
    $errores[]="No completaste la contraseña.";
  }
  elseif (strlen($contraseña)<5) {
    $errores[]="La contraseña tiene que tener al menos 5 caracteres.";// code...// code...
  }

  return $errores;
}*/


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

    if($errores["email"]==NULL){
      $usuarioActual = buscarPorEmail($datosFinales["email"]);

      if($usuarioActual == NULL) {
          $errores["email"] = "El email no existe";
      }
      else if(!password_verify($datosFinales["password"],$usuarioActual["password"])) {
          $errores["password"] = "Password incorrecto";
      }
    }

  return $errores;
}

function logear($email){
  $_SESSION["usuarioLogueado"]=$email;
}

function estaLogueado(){
  if (isset($_session["usuarioLogueado"])){
    return true;
  }
  else {
    return false;
  }

}
/*
  $errores=[];
  $email=$_POST["email"];
  $contraseña=$_POST["contraseña"];

  if (strlen($email)==0) {
    $errores[]="No completaste el username.";
  }
  elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
    $errores[]="No completaste el email.";
  }
  if (strlen($contraseña)==0) {
    $errores[]="No completaste la contraseña.";
  }
  elseif (strlen($contraseña)<5) {
    $errores[]="La contraseña tiene que tener al menos 5 caracteres.";// code...// code...
  }

  return $errores;
}*/

function proximoId(){
  $json= file_get_contents("usuarios.json");
  if ($json ==""){
    return 1;
  }

  $usuarios= json_decode($json, true);

  $ultimo= array_pop($ususarios);

  return $ultimo["id"]+1;
}

function armarUsuario(){
  return[
    "id"=> proximoId(),
    "nombre"=> trim($_POST["nombre"]),
    "apellido"=> trim($_POST["apellido"]),
    "email"=> trim($_POST["email"]),
    "contraseña"=> password_hash($_POST["contraseña"],PASSWORD_DEFAULT),
  ];
}

function crearUsuario($usuario) {

  $usuarios = file_get_contents("usuarios.json");
  $usuarios = json_decode($usuarios, true);

  if($usuarios===NULL){
    $usuarios=[];
  }

  $usuarios[]= $usuario;

  $usuarios = json_encode($usuarios);

  file_put_contents("usuarios.json", $usuarios);
}

function traerUsuarios() {
  $usuarios = file_get_contents("usuarios.json");
  $usuarios = json_decode($usuarios, true);
  return $usuarios;
}

function buscarPorEmail($email) {
  $usuarios= file_get_contents("usuarios.json");
  $usuariosArray= json_decode($usuarios, true);
  foreach ($usuariosArray as $usuario) {
   if ($email==$usuario["email"]) {
       return $usuario;
   }
  }
  return null;
}


function buscarPorId($id) {
  $usuarios= file_get_contents("usuarios.json");
  $usuariosArray= json_decode($usuarios, true);
  foreach ($usuariosArray as $usuario) {
   if ($id==$usuario["id"]) {
       return $usuario;
   }
  }
  return null;
}

?>
