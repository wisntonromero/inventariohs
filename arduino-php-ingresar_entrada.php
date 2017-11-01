
<!--      
<?php
   
  //  $conexion = mysql_connect("localhost","root","root");
  //  mysql_select_db("inventario", $conexion); // Select the database
   
  //  mysql_query ("INSERT INTO arduino_bitacora('id_usuario') VALUES ('".$_GET["id_usuario"]."')",$conexion); 
  //mysql_query =("INSERT INTO arduino_bitacora(id_usuario, fecha_hora, permiso) VALUES ('".$_GET["id_usuario"]."',now(), '".$_GET["permiso"]."')";  
      
   
?> -->
 

<?php
$parametro1=$_GET['parametro1'];
$id_usuario=$_GET['id_usuario'];
 
echo "El Primer Parametro es :" . $id_usuario . "<br />";
echo "El Segundo Parametro es :" . $parametro2 . "<br />";

  $conexion = mysql_connect("localhost","root","root");
  mysql_select_db("inventario", $conexion); // Select the database
//  mysql_query ("INSERT INTO arduino_bitacora('id_usuario') VALUES ('".$_GET["parametro1"]."')",$conexion); 
mysql_query ("INSERT INTO `arduino_bitacora`(`id_usuario`) VALUES ('".$_GET["id_usuario"]."')",$conexion);

?>
