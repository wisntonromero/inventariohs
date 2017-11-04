<!-- //<?php
//$id_usuario = $_GET['id_usuario'];
//$permiso    = $_GET['permiso'];
 
?> -->

<?php
  $conexion = mysql_connect("localhost","root","root");
  mysql_select_db("inventario", $conexion); // Select the database
  mysql_query ("INSERT INTO `arduino_bitacora`(`id_usuario`,`fecha_hora`, `permiso`) VALUES ('".$_GET["id_usuario"]."',now(),'".$_GET["permiso"]."')",$conexion);

?>
