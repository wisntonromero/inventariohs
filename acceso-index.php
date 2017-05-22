<?php
//creamos la sesion
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a acceso-login.php
if(!isset($_SESSION['usuario'])) 
{
  header('Location: acceso-login.php'); 
  exit();
}
 ?>
  <h1>BIENVENIDO</h1>
  <a href="acceso-logout.php">Cerrar Sesión</a>
 <?
?>
