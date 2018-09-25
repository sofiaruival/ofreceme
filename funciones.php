
<?php
function validarDatosRegistrate(){
//agrego datos finales, asiq ue voya  tener que renonbrar los if de las validaciones//
  $datosFinales =[];
  $errores=[];

  foreach ($datos as $posicion => $dato) {
    $datosFinales[$posicion] = trim($dato);
  }

//esto lo voy a cambiara como lo puso Dario, en registrate en vez de en funciones//
  $username= $_POST["nombre"];
  $email=$_POST["email"];
  $apellido=$_POST["apellido"];
  $contraseña=$_POST["contraseña"];

//lo voy a reubicar abajo de validacion de contraseña//
  if($_FILES["avatar"]["error"] != 0){
    $errores["avatar"] = "Hubo un error en la carga.";
  } else{
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext !="png"){
      $errores["avatar"] ="Solo podes subir fotos jpg o png";
    }
  }

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
}


function validarDatosLogin(){
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
}

function armarUsuario(){
  return[
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


?>
