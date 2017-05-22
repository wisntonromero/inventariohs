<?php
include_once("config.php");
//include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Almacen bajas</title>
    <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
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
        <h1><a href="#">Consulta de equipos que se van a dar de baja...Por pantalla.</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <!--<li><a href="prestar_llaves.php">Nuevo prestamo de llaves</a></li> -->
        <li><a href="inicio.php">Inicio</a></li>
       
      </ul>
    </section>
  </nav>
 
   <form name="miFormulario" method="post" action="compras-php_enviar_sql_completo_excel.php"> 
  
    <div class="row">
      <h4>Información de los equipos que se van a dar de baja</h4>
      
      <div class="columns large-4">
            <label for="solicitudes_bajas">Solicitudes pendientes para dar de baja.</label>
            <select name="seleccionar_solicitud" id="seleccionar_solicitud">
                  <option selected="selected">----Seleccionar solicitud para de baja----</option>
                  <?php
                    include_once("config.php");
                      $conexion   = mysql_connect($server,$username,$password);
                      mysql_set_charset('utf8',$conexion);
                      mysql_select_db($database);

                      $id         = $_POST['id'];
                      $solicitud  = $_POST['solicitud'];
                      

                    $query = "SELECT id,solicitud FROM bajas_reubicaciones_almacen WHERE f_cierre = '0000-00-00' and estado2 ='' ORDER BY solicitud ASC  ";
                 
                    $resultado = mysql_query($query,$conexion);
                    $numero_de_filas = mysql_num_rows($resultado);
                    while($registro=mysql_fetch_array($resultado))
                    {
                      $id         = $registro['id'];
                      $solicitud  = $registro['solicitud'];

                      echo '<option value="'.$id.'">'.$solicitud.'</option>';
                      
                  }
                ?>
              </select> <br/><br/>
        
        </div>

        <div class="columns large-2">
            <input type="hidden" name="id" id="id" value="" placeholder="">
        </div>
        <div class="columns large-2">
            <input type="hidden" name="solicitud" id="solicitud" value="" placeholder="">
        </div>
    </div>

    <div class="row"></div>
       
    <div class="row">
      <div class="columns large-4">
        <input type="button" name="consultar_equipos_de_baja_por_pantalla" id="consultar_equipos_de_baja_por_pantalla" value="Consultar solicitud " class="button">
      </div>
      <div class="columns large-4">
        <input type="button" name="recibido_por_almacen" id="recibido_por_almacen" value="Recibir solicitud " class="button">
      </div>
    </div>

   

    <div id="resultado" class="row"></div>

    <div class="row">
      <div class="columns large-4">
        <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
      </div>
    </div>
  </form>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/almacen.js"></script>
  <script src="js/almacen_solicitud.js"></script>

</body>


    <script type="text/javascript">
    $(document).ready(function(){
      $('td.editable-col').on('focusout', function() {
        data = {};
        data['val'] = $(this).text();
        data['id'] = $(this).parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
          if($(this).attr('oldVal') === data['val'])
        return false;

        $.ajax({   
              
              type: "POST",  
              url: "almacen-bajas-actualizar_registros_tabla.php",  
              cache:false,  
              data: data,
              dataType: "json",       
              success: function(response)  
              {   
                //$("#loading").hide();
                if( $('.checkbox').attr('checked') ) {
                     alert('Seleccionado');
                }
                if(!response.error) {
                  $("#msg").removeClass('alert-danger');
                  $("#msg").addClass('alert-success').html(response.msg);
                } else {
                  $("#msg").removeClass('alert-success');
                  $("#msg").addClass('alert-danger').html(response.msg);
                }
              }   
            });
      });
    });
    
    $('#consultar_equipos_de_baja_por_pantalla').click(function(e){

      $.post('almacen-bajas-php-enviar_sql_a_pantalla.php',
        {
          id: $('#id').val(),
          solicitud: $('#solicitud').val(),
          activo: $('#activo').val(),
          recibido_almacen: $('#recibido_almacen').val(),
          observaciones: $('#observaciones').val(),
        },
        function (data){
          $('#resultado').html(data);
        }
      );

    });

  </script>

</html>