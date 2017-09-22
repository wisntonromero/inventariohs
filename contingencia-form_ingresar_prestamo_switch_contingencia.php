<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prestamo de equipos - Ingresar</title>
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

          <div class ="contain-to-grid sticky">

                  <nav class="top-bar" data-topbar> <!-- Menú de navegación  -->
                    
                    <ul class="title-area">
                      <li class="name">
                        <h1><a href="#">Inventario de Hardware</a></h1> <!-- Titulo menú de navegación  -->
                      </li>
                        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li> 
                    </ul>
                    
                    <section class="top-bar-section">
                      <ul class="right">
                          <li><a href="inicio.php">Inicio</a></li>
                          <li class="has-dropdown"><a href="#">Activos</a> <!-- Menu lado derecho -->
                            <ul class="dropdown">
                              <li><a href="activo-form_ingresar_activo.php" >Ingresar / Modificar</a></li>
                              <li><a href="activo-form_exportar_reubicacion.php" >Exportar Reubicado</a></li>
                              <li><a href="activo-form_consultar_activo.php" >Consultar Activo</a></li>
                              <li><a href="activo-form_consultar_equipos_por_ubicacion.php" >Consultar por Ubicación</a></li>
                            </ul>
                          </li>

                          <li class="has-dropdown"><a href="#">Redes</a> <!-- Menu lado derecho -->
                            <ul class="dropdown">
                              
                              <li class="has-dropdown"><a href="#">Prestamo de Llaves</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="llaves-form_ingresar_prestamo.php" >Ingresar Prestamo</a></li>
                                  <li><a href="llaves-form_consultar_prestamo.php" >Consultar y Recibir</a></li>
                                </ul>
                              </li>

                            
                              <li class="has-dropdown"><a href="#">Puntos de red</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="red-form_ingresar_punto_de_red.php" >Ingresar Puntos de red</a></li>
                                  <li><a href="red-form_ingresar_punto_de_red_por_lotes.php" >Consultar / Modificar</a></li>
                                </ul>
                              </li>


                              <li class="has-dropdown"><a href="#">Switches</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="switches-form_ingresar_switches.php" >Ingresar / Modificar</a></li>
                                  <li><a href="switches-form_consultar_switches.php" >Consultar</a></li>
                                </ul>
                              </li>

                              <li class="has-dropdown"><a href="#">Bitacoras Exportar</a> <!-- Menu lado derecho -->
                              <ul class="dropdown">
                                <li><a href="red-php_generar_bitacora_excel_punto_de_red.php"  >Bitacora por puntos de red</a></li>
                                <li><a href="red-php_generar_bitacora_excel_por_switches.php"  >Bitacora por switches</a></li>
                              </ul>
                              </li>

                            </ul>
                          </li>

                          <li class="has-dropdown"><a href="#">Compras</a> <!-- Menu lado derecho -->
                            <ul class="dropdown">
                              <li><a href="compras-form_ingresar_compras.php" >Ingresar Nueva Compra</a></li>
                              <li><a href="compras-form_modificar_compras.php" >Modificar Compra por Activo</a></li>
                              <li><a href="compras-form_consultar_equipos_por_orden_compra.php" >Consultar por Criterios</a></li>
                              <li><a href="compras-form_modificar_estado_de_equipos_por_lotes.php" >Modificar Estado por Lotes</a></li>
                              <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                            </ul>
                          </li>

                          <li class="has-dropdown"><a href="#">Reubicaciones</a> <!-- Menu lado derecho -->
                            <ul class="dropdown">
                              <li><a href="reubicacion-form_ingresar_reubicacion.php" >Ingresar</a></li>
                              <li><a href="reubicacion-form_modificar_reubicacion.php" >Consultar / Modificar</a></li>
                              <li><a href="reubicacion-form_consultar_equipos_por_estado.php" >Consultar por Criterios</a></li>
                              <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                            </ul>
                          </li>

                          <li class="has-dropdown"><a href="#">Soportes</a> <!-- Menu lado derecho -->
                            <ul class="dropdown">
                              
                              <li class="has-dropdown"><a href="#">Equipos de Soporte</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Equipo Soporte a Bodega</a></li>
                                  <li><a href="soporte-form_ingresar_prestamo_equipo_soporte.php" >Prestar Equipo de Soporte por Nro de Activo</a></li>
                                  <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Prestados</a></li>
                                </ul>
                              </li>


                              <li class="has-dropdown"><a href="#">Equipos Alquilados</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="alquilado-form_ingresar_activo_alquilado_a_bodega.php" >Ingresar Nuevo Equipo Alquilado a Bodega</a></li>
                                  <li><a href="alquilado-form_ingresar_prestamo_equipo_alquilado.php" >Prestar Equipo de Alquilado por Nro de Activo</a></li>
                                  <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Alquilados</a></li>
                                </ul>
                              </li>


                              <li class="has-dropdown"><a href="#">Switches de Soporte</a> <!-- Menu lado derecho -->
                                <ul class="dropdown">
                                  <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Nuevo Switch de Soporte a Bodega</a></li>
                                  <li><a href="contingencia-form_ingresar_prestamo_switch_contingencia.php" >Prestar Switch por Nro de Activo</a></li>
                                  <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Switches Prestados</a></li>
                                </ul>
                              </li>

                            </ul>
                          </li>
                          <li><a href="form_mantenimiento.php">Mantto</a></li>
                          <li><a href="acceso-php_logout.php">Cerrar sesion</a></li>

                      </ul>
                    </section>
                  </nav>
              </div>

          <br>

 <!-- ******************************************** INFORMACION DEL USUARIO QUE PRESTA LAS LLAVES ************************************** -->
          <div class="row">
            <h7> Informacion del Equipo a prestar</h7>
            <select name="seleccionar_equipo_soporte" id="seleccionar_equipo_soporte">
                <option selected="selected">-----Seleccionar Activo------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                  $id = $_POST['id'];
                  //$sql=mysql_query("select id,data from data where weight='1'");
                  $query = "SELECT * FROM hardware WHERE estado_equipo != 'ACTIVO' AND estado_equipo != 'DAÑADO' AND estado_equipo != 'DE BAJA' AND tipo_equipo = 'SWITCH' ORDER BY estado_equipo ASC  ";
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  //$registro=mysql_fetch_array($resultado);//// no se coloca
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id=$registro['id'];
                    $activo_equipo=$registro['activo_equipo'];
                    $tipo_equipo=$registro['tipo_equipo'];
                    $marca_equipo=$registro['marca_equipo'];
                    $modelo_equipo=$registro['modelo_equipo'];
                    $estado_equipo=$registro['estado_equipo'];
                    $serial_equipo=$registro['serial_equipo'];
                    $f_compra=$registro['f_compra'];
                    $bodega_actual=$registro['bodega_actual'];

                  echo '<option value="'.$id.'">'." Activo: ".''.$activo_equipo.''." - ".''.$estado_equipo.''." - ".''." Tipo: ".''.$tipo_equipo.''." - ".''." Marca: ".''.$marca_equipo.''." - ".''." Modelo: ".''.$modelo_equipo.''." - ".''."Bodega: ".''.$bodega_actual.'</option>';
                  echo "$id";
                  // echo '<option value="'.$id.'">'.$correo.'</option>';
                  }
                ?>
            </select> <br/><br/>
          </div>

          <div class="columns large-2">
              <input type="hidden" name="activo_equipo" id="activo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="tipo_equipo" id="tipo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="marca_equipo" id="marca_equipo" placeholder="Activo equipo">
              <input type="hidden" name="modelo_equipo" id="modelo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="serial_equipo" id="serial_equipo" placeholder="Activo equipo">
          </div>

          <div class="row">
            <h6> Informacion del switch y Servicio de Aranda</h6>
              <div class="columns large-2">
                <label for="activo_danado">Activo Dañado</label>
                <input type="text" name="activo_danado" id="activo_danado" placeholder="Obligatorio Activo Dañado">
              </div>

              <div class="columns large-2">
                <label for="ot_sigma">Ot Aranda</label>
                <input type="text" name="ot_sigma" id="ot_sigma" placeholder="Obligatorio Ot Sigma">
              </div>

              <div class="columns large-2">
                <input type="hidden" >
              </div>
          </div>
          
          <div class="row">
            <h6>Informacion donde se instala el switch de contingencia   </h6>
              <div class="columns large-2">
                <label for="bloque">Bloque</label>
                <input type="text" name="bloque" id="bloque" placeholder="Obligatorio Bloque">
              </div>

              <div class="columns large-3">
                <label for="piso">Piso</label>
                <input type="text" name="piso" id="piso" placeholder="Obligatorio Piso">
              </div>

              <div class="columns large-4">
                <label for="cubiculo">Ubicación</label>
                <input type="text" name="cubiculo" id="cubiculo" placeholder="Obligatorio Cubiculo">
              </div>

              <div class="columns large-2">
                <input type="hidden" >
              </div>
          </div>
            
          <div class="row">
            <h6>Informacion del usuario que se le entrega el switch de contingencia   </h6>
               <div class="columns large-1">
                  <label for="seleccionar_correo3">Email</label>
                  <select name="seleccionar_correo3" id="seleccionar_correo3">
                    <option selected="selected">----- Seleccionar E-mail ------</option>
                    <?php
                      include_once("config.php");
                      $conexion = mysql_connect($server,$username,$password);
                      mysql_set_charset('utf8',$conexion);
                      mysql_select_db($database);
                       //$sw_id     = $_POST['sw_id'];
                       // $dir_ip_sw = $_POST['dir_ip_sw'];
                      //  $unidad    = $_POST['unidad'];
                      $query = "SELECT id_correo, nombres, area, cargo, ext, correo FROM correo ORDER BY nombres ";
                      
                      $resultado = mysql_query($query,$conexion);
                      $numero_de_filas = mysql_num_rows($resultado);
                      while($registro=mysql_fetch_array($resultado))
                      { 
                        $id_correo          = $registro['id_correo'];
                        $nombres            = $registro['nombres'];
                        $cargo              = $registro['cargo'];
                        $ext                = $registro['ext'];
                        $correo             = $registro['correo'];
                           
                        echo '<option value="'.$id_correo.'">'.$nombres.''." - ".''.$cargo.''." - ".''.$ext.''." ".''." - correo: ".''.$correo.'</option>';
                      } 
                  ?>
                </select> <br/><br/>
          </div>

              <div class="columns large-3">
                <label for="usuario_equipo">Usuario del equipo</label>
                <input type="text" name="usuario_equipo" id="usuario_equipo" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-3">
                <label for="email_usuario">Email Usuario</label>
                <input type="text" name="email_usuario" id="email_usuario" value="" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-2">
                <label for="ext_tel">Extensión telefonica</label>
                <input type="text" name="ext_tel" id="ext_tel"  pattern="[0-9]+$" placeholder="Obligatorio Ext">
              </div>

              <div class="columns large-3">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" value="" placeholder="Suministrado por el sistema">
              </div>

          </div>

          <div class="row">
          <h6>Tecnico que atiende el servicio</h6>
            <div class="columns large-4">
              <label for="usuario_tecnico">Tecnico que atiende el servicio</label>
              <input type="text" name="usuario_tecnico" id="usuario_tecnico"  value ="WINSTON ELIAS ROMERO DUARTE" placeholder="Obligatorio Tecnico">
            </div>

            <div class="columns large-4">
              <label for="email_usuario_tecnico">Email tecnico que atiende el servicio</label>
              <input type="text" name="email_usuario_tecnico" id="email_usuario_tecnico"  value ="weromero@uninorte.edu.co" placeholder="Obligatorio Tecnico">
            </div>

           <div class="columns large-4">
              <label for="usuario_que_presta_soporte">Tecnico responsable de la bodega</label>
              <input type="text" name="usuario_que_presta_soporte" disabled value="<?php echo $_SESSION['nombre'];?>" id="usuario_que_presta_soporte"  placeholder="Suministrado por el sistema">
            </div>
          </div>

          <div class="row">
            <div class="columns large-12">
              <label for="observaciones">Observaciones </label>
              <input type="text" name="observaciones" id="observaciones" value="">
            </div>
          </div>

<!-- ******************************************** INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ************************************************** -->

          <div class="row">
            <div class="columns large-4">
              <label for="f_prestamo">Fecha de prestamo (dd/mm/aaaa)</label>
              <input type="date" name="f_prestamo" id="f_prestamo" placeholder="Obligatorio fecha ">
            </div>

            <div class="columns large-4">
              <label for="f_limite">Fecha limite de prestamo (dd/mm/aaaa)</label>
              <input type="date" name="f_limite" id="f_limite" placeholder="Obligatorio fecha ">
            </div>

            <div class="columns large-4">
              <input type="hidden" name="aaa" id="aaa" placeholder="Obligatorio fecha ">
            </div>
          </div>
<!-- ******************************************** FIN DE INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ****************************** -->
<!-- ********************************************************** BOTONES ************************************************************* -->
        <div class="row">
          <div class="columns large-2">
            <label for="contingencia_ingresar_prestamo_switch_contingencia">&nbsp;</label>
            <input type="button" name="contingencia_ingresar_prestamo_switch_contingencia" id="contingencia_ingresar_prestamo_switch_contingencia" value="Ingresar Prestamo" class="button">
          </div>

          <div class="columns large-2">
            <label for="limpiar_forma">&nbsp;</label>
            <input type="submit" href="contingencia-form_ingresar_prestamo_switch_contingencia.php" name="limpiar_forma" id="limpiar_forma" value="Nuevo prestamo" class="button">
          </div>
        </div>
<!-- *******************************************************FIN BOTONES ************************************************************* -->

        </form>
    </div>
  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/contingencia.js"></script>
  <script src="js/correo.js"></script>
   

  <script>
    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>

</html>