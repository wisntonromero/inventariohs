<?php
/****************************************
**establecemos conexion con el servidor.
**nombre del servidor: localhost.
**Nombre de usuario: root.
**Contraseña de usuario: root.
**Si la conexion fallara mandamos un msj 'ha fallado la conexion'**/
include("config.php");
//Creamos sesión
session_start(); 
$conexion = mysql_connect($server,$username,$password);
mysql_set_charset('utf8',$conexion);
mysql_select_db($database);
/*Luego hacemos la conexión a la base de datos. 
**De igual manera mandamos un msj si hay algun error*/
mysql_select_db('inventario')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
/*Post completo en: http://jonathanmelgoza.com/blog/como-crear-sesiones-en-php/#ixzz3KHBggO8A
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$usuario = $_POST["usuario"];   
$contrasena = base64_encode($_POST["contrasena"]);
//$contrasena = $_POST["contrasena"];


/*Consulta de mysql con la que indicamos que necesitamos que seleccione
**solo los campos que tenga como nombre_administrador el que el formulario
**le ha enviado*/
$result = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
//$active=$row['active'];

//Validamos si el nombre del administrador existe en la base de datos o es correcto
if($row = mysql_fetch_array($result))
{     
//Si el usuario es correcto ahora validamos su contraseña
 
 if($row["contrasena"] == $contrasena)
 {
  $nombre = $row["nombre"];
  $ubicacion_foto = $row["ubicacion_foto"];
  $correo = $row["correo"];
  $ext_tel = $row["ext_tel"];
  $contrasena = $row["contrasena"];

  //Almacenamos el nombre de usuario en una variable de sesión usuario
  $_SESSION['usuario']  = $usuario; 
  $_SESSION['nombre']   = $nombre; 
  $_SESSION['correo']   = $correo;
  $_SESSION['ext_tel']  = $ext_tel;
  $_SESSION['contrasena']  = $contrasena;  
  $_SESSION['ubicacion_foto']     = $ubicacion_foto; 
  //Redireccionamos a la pagina: inicio.php
  header("Location: inicio.php");  
 }
 else
 {
  //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
  ?>
   <script languaje="javascript">
    /* alert("Contraseña Incorrecta"); */
    alert("Digita bien la Contraseña.");
    location.href = "index.php";
   </script>
  <?php         
 }
}
else
{
 //en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
?>
 <script languaje="javascript">
  /* alert("El nombre de usuario es incorrecto!"); */
  alert("Digita bien el usuario!");
  location.href = "index.php";
 </script>
<?php   
}

//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
mysql_free_result($result);

/*Mysql_close() se usa para cerrar la conexión a la Base de datos y es 
**necesario hacerlo para no sobrecargar al servidor, bueno en el caso de
**programar una aplicación que tendrá muchas visitas ;) .*/
mysql_close();
?>