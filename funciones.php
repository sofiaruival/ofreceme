
<?php
function validarDatosRegistrate(){
  $errores=[];
  $username= $_POST["nombre"];
  $email=$_POST["email"];
  $apellido=$_POST["apellido"];
  $contraseña=$_POST["contraseña"];

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
?>
