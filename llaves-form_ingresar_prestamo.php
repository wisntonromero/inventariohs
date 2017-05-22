<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prestamo de llaves - Ingresar</title>
   <Link rel ="shortcut icon" href="uninorte.ico" />
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>
<body>
    <div class="row">
        <div class="columns large-10">
          <h1>
            <img style="width: 203px; height: 146px margin: -55px -216px -112px -140px;" src="images/jpg/logo.jpg" alt="Logo Universidad del Norte."/> 
          </h1>
        </div>
        <div class="columns large-2">
            <img style="width: 60px; height: 146px margin: -55px -216px -112px -140px;" src="<?php echo $_SESSION['ubicacion_foto'];  ?>">
            <?php echo $_SESSION['usuario'];?>
        </div>
    </div>

  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <!-- Titulo del Menu -->
        <h1><a href="#">Inventario de Hardware</a></h1>
      </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <span id="res"></span>
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </section>
  </nav>

  <br>

<!--  ********************************************************* CUADRO INFORMACION  DEL CENTRO DE CABLEADPO ************************************* -->
      <form method="post" action="">
          <div class="row">
            <h4>Informacion del centro de cableado</h4>
            <div class="columns large-3">
              <label for="consulta_c_cableado">Nro centro de cableado</label>
              <input type="text" name="nro_cc" id="nro_cc" required pattern="[0-9]+$" autofocus=true  placeholder="Obligatorio nro cc">
              <input type="button" name="consulta_c_cableado" id="consulta_c_cableado" value="Consultar" class="button">
            </div>

            <div class="columns large-4">
              <label for="descripcion_cc">Descripción del centro de cableado</label>
              <input type="text" name="descripcion_cc" id="descripcion_cc" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-5">
              <label for="ubicacion_cc">Ubicación del centro de cableado</label>
              <input type="text" name="ubicacion_cc" id="ubicacion_cc" placeholder="Suministrado por el sistema">
            </div>
          </div>
 <!-- ##  *************************************************** FIN DE INFORMACION DEL CENTRO DE CABLEADO ************************************* -->

 <!-- ******************************************** INFORMACION DEL USUARIO QUE PRESTA LAS LLAVES ************************************** -->


          <div class="row">
            <h4> Informacion del cliente</h4>
                     
     
            <select name="seleccionar_cliente" id="seleccionar_cliente">
                <option selected="selected">-----Seleccionar Cliente------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                  $id = $_POST['id'];
                  //$sql=mysql_query("select id,data from data where weight='1'");
                  $query = "SELECT id,cliente,correo FROM clientes ORDER BY cliente ASC  ";
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  //$registro=mysql_fetch_array($resultado);//// no se coloca
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id=$registro['id'];
                    $correo=$registro['correo'];
                    $cliente=$registro['cliente'];

                  echo '<option value="'.$id.'">'.$cliente.''." - ".''.$correo.'</option>';
                  echo "$id";
                  // echo '<option value="'.$id.'">'.$correo.'</option>';
                  } 
                ?>
            </select> <br/><br/>

              <div class="columns large-2">
                <label for="empresa">Empresa</label>
                <input type="text" name="empresa" id="empresa" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-8">
                <label for="cliente">Nombre del cliente</label>
                <input type="text" name="cliente" id="cliente" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-2">
                <input type="hidden" name="correo" id="correo" placeholder="Suministrado por el sistema">
              </div>  
          </div>

          <div class="row">
            <div class="columns large-2">
              <label for="ext_tel">Extension telefonica</label>
              <input type="text" name="ext_tel" id="ext_tel"  pattern="[0-9]+$" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-2">
              <input type="hidden" name="usuario2" id="usuario2"  placeholder="Suministrado por el sistema" >
            </div>

            <div class="columns large-5">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" placeholder="Suministrado por el sistema">
            </div>
            
            <div class="columns large-5">
                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="cargo" placeholder="Suministrado por el sistema">
            </div>

          </div>

          <div class="row">
            <div class="columns large-12">
              <label for="trabajo">Trabajo a realizar</label>
              <input type="text" name="trabajo" id="trabajo" placeholder="Obligatorio trabajo a realizar" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
          </div>

<!-- ******************************************** INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ************************************************** -->

          <div class="row">
            <h4>Información fecha de entrega y recibo de las llaves</h4>
            <div class="columns large-4">
              <label for="f_h_prestamo">Fecha de prestamo (dd/mm/aaaa)</label>
              <input type="text" name="f_h_prestamo" id="f_h_prestamo" class ="datetimepicker" placeholder="Obligatorio fecha y hora de prestamo"> 
            </div>

            <div class="columns large-4">
              <label for="f_h_limite">Fecha limite de prestamo (dd/mm/aaaa)</label>
              <input type="text" name="f_h_limite" id="f_h_limite" class ="datetimepicker" placeholder="Obligatorio fecha y hora limite">
            </div>

            <div class="columns large-4">
              <label for="f_h_recibido">Fecha de recibo de las llaves (dd/mm/aaaa)</label>
              <input type="text" name="f_h_recibido" id="f_h_recibido" value="" placeholder="Obligatorio fecha y hora recibido" disabled>
            </div>
          </div>
<!-- ******************************************** FIN DE INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ****************************** -->
<!-- ********************************************************** BOTONES ************************************************************* -->          
        <div class="row">
          <div class="columns large-2">
            <label for="ingresar_prestamo_llaves">&nbsp;</label>
            <input type="button" name="ingresar_prestamo_llaves" id="ingresar_prestamo_llaves" value="Ingresar Prestamo" class="button">
          </div>

          <div class="columns large-2">
            <label for="limpiar_forma">&nbsp;</label>
            <input type="submit" href="llaves-form_ingresar_prestamo.php" name="limpiar_forma" id="limpiar_forma" value="Nuevo prestamo" class="button">
          </div>
        </div>  
<!-- *******************************************************FIN BOTONES ************************************************************* -->  

        </form>
    </div>
  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/c_cableado.js"></script>
  <script src="js/cliente.js"></script>
  <script src="js/llaves.js"></script>
  <script>
//    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>

</html>