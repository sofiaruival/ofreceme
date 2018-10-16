<?php

session_start();
session_destoy();


setcookie("usuarioLogueado", null, -1);

header("location:login.php");exit;

?>
