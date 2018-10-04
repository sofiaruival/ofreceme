
<?php
  session_start();

//IF PARA RECORDAME
  if(isset($_COOKIE["usuarioLogueado"])&& ISSET($_SESSION["usuarioLogueado"])){
    $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
  }
//VALIDACION REGISTRATE
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


//VALIDACION LOGIN
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
  $json= file_get_contents("usuarios.json");
  if ($json ==""){
    return 1;
  }

  $usuarios= json_decode($json, true);

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
    "contraseña"=> password_hash($_POST["contraseña"],PASSWORD_DEFAULT),
  ];
}
//CREA /AGREGA UN USUARIO NUEVO AL LISTADO DE USUARIOS
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

//TRAE UN USUARIO DE USUARIOS J.SON
function traerUsuarios() {
  $usuarios = file_get_contents("usuarios.json");
  $usuarios = json_decode($usuarios, true);
  return $usuarios;
}

//BUSCA X EMAIL
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

//BUSCA POR ID
function buscarPorID($id) {
 $usuarios= file_get_contents("usuarios.json");
 $usuariosArray= json_decode($usuarios, true);

 if ($usuariosArray == null) {
   return null;
 }

 foreach ($usuariosArray as $usuario){
   if($id==$usuario["id"]){
     return $usuario;
    }
  }
  return null;
}

?>
