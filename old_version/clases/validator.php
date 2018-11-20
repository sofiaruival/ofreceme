<?php
/**
 *
 */
class Validator {

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

  public function validarDatosRegistrate($datos){
    global $db;

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

    else if ($db->buscarPorEmail($datosFinales["email"]) != NULL ) {
      $errores["email"] = "El email ya esta en uso";
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

  public function validarDatosLogin(){
    global $db;

    $usuarioActual;
    //$datosFinales =[];
    $errores=[];

    //foreach ($datos as $posicion => $dato) {
    //  $datosFinales[$posicion] = trim($dato);
    //}

      if ($_POST["email"] == "") {
        $errores["email"] = "Hubo error en el email porque esta vacio";
      }
      else if ( filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $errores["email"] = "El email no es un email";
      }
      if ($_POST["password"] == "") {
        $errores["password"] = "Hubo error en la contrasenia porque esta vacia";
      }

      if(!isset($errores["email"])){
        $usuarioActual = $db->buscarPorEmail($_POST["email"]);
        if($usuarioActual == NULL) {
            $errores["email"] = "El email no existe";
        }
        else if(!password_verify($_POST["password"],
        $usuarioActual->getPassword() )) {
            $errores["password"] = "Password incorrecto";
        }
      }

    return $errores;
  }



}

 ?>
