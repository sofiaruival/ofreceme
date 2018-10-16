<?php

session_start();
session_destroy();
setcookie("usuarioLogueado", null, -1);

header("location:login.php");exit;

?>
