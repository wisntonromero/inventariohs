﻿<?php
include_once("config.php");
include_once("sesion.php");

// formulario Layout 
/*if(isset($_SESSION['usuario'])){
echo "Has iniciado Sesion: ".$_SESSION['usuario'];
}else{ 
header("location: index.php");
echo $_SESSION['usuario'];
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/soporte-functions.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <link rel="stylesheet" href="css/foundation.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Prestamo de Soportes</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <link rel="stylesheet" href="resources/style.css" />
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

        <link rel="stylesheet" href="css/style_menu.css" type="text/css" media="screen">
        <div class ="contain-to-grid sticky">
            <nav class="top-bar" data-topbar>
                <div class="example">
                    <ul id="nav">
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a class="fly" href="#">Activos</a>
                            <ul class="dd">
                                <li><a href="activo-form_ingresar_activo.php" >Ingresar / Modificar</a></li>
                                <li><a href="activo-form_exportar_reubicacion.php" >Exportar Reubicado</a></li>
                                <li><a href="activo-form_consultar_activo.php" >Consultar Activo</a></li>
                                <li><a href="activo-form_consultar_equipos_por_ubicacion.php" >Consultar por Ubicación</a></li>
                            </ul>
                        </li>
                        <li><a class="fly" href="#">Redes</a>
                            <ul class="dd">
                                <li><a class="fly" href="#">Prestamo de Llaves</a>
                                    <ul>
                                        <li><a href="llaves-form_ingresar_prestamo.php" >Ingresar Prestamo</a></li>
                                        <li><a href="llaves-form_consultar_prestamo.php" >Consultar y Recibir</a></li>
                                    </ul>
                                </li>

                                <li><a class="fly" href="#">Puntos de red</a>
                                    <ul>
                                        <li><a href="red-form_ingresar_punto_de_red.php" >Consulta  / Modificar Punto de red</a></li>
                                        <li><a href="red-form_ingresar_punto_de_red_por_lotes.php" >Ingresar puntos de red por lotes </a></li>
                                        <li><a href="red-form_modificar_punto_de_red_por_lotes_grilla.php" >Consultar / Modificar por lotes</a></li>
                                    </ul>
                                </li>
                                <li><a class="fly" href="#">Switches</a> <!-- Menu lado derecho -->
                                    <ul>
                                        <li><a href="switches-form_ingresar_switches.php" >Ingresar / Modificar</a></li>
                                        <li><a href="switches-form_consultar_switches.php" >Consultar</a></li>
                                    </ul>
                                </li>

                                <li><a class="fly" href="#">Bitacoras Exportar</a> <!-- Menu lado derecho -->
                                    <ul>
                                        <li><a href="red-php_generar_bitacora_excel_punto_de_red.php"  >Bitacora por puntos de red</a></li>
                                        <li><a href="red-php_generar_bitacora_excel_por_switches.php"  >Bitacora por switches</a></li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </li>

                        <li><a class="fly" href="#">Compras</a>
                            <ul class="dd">
                                <li><a href="compras-form_ingresar_compras.php" >Ingresar Nueva Compra</a></li>
                                <li><a href="compras-form_modificar_compras.php" >Modificar Compra por Activo</a></li>
                                <li><a href="compras-form_consultar_equipos_por_orden_compra.php" >Consultar por Criterios</a></li>
                                <li><a href="compras-form_modificar_estado_de_equipos_por_lotes.php" >Modificar Estado por Lotes</a></li>
                                <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                          </ul>
                        </li>

                        <li><a class="fly" href="#">Reubicaciones</a>
                            <ul class="dd">
                                <li><a href="reubicacion-form_ingresar_reubicacion.php" >Ingresar</a></li>
                                <li><a href="reubicacion-form_modificar_reubicacion.php" >Consultar / Modificar</a></li>
                                <li><a href="reubicacion-form_consultar_equipos_por_estado.php" >Consultar por Criterios</a></li>
                                <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                            </ul>
                        </li>

                        <li><a class="fly" href="#">Soportes</a>
                            <ul class="dd">
                                <li><a class="fly" href="#">Equipos de soporte</a>
                                    <ul>
                                        <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Equipo Soporte a Bodega</a></li>
                                        <li><a href="soporte-form_ingresar_prestamo_equipo_soporte.php" >Prestar Equipo de Soporte por Nro de Activo</a></li>
                                        <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Prestados</a></li>
                                    </ul>
                                </li>

                                 <li><a class="fly" href="#">Equipos de Alquilado</a>
                                    <ul>
                                        <li><a href="alquilado-form_ingresar_activo_alquilado_a_bodega.php" >Ingresar Nuevo Equipo Alquilado a Bodega</a></li>
                                        <li><a href="alquilado-form_ingresar_prestamo_equipo_alquilado.php" >Prestar Equipo de Alquilado por Nro de Activo</a></li>
                                        <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Alquilados</a></li>
                                    </ul>
                                </li>

                                <li><a class="fly" href="#">Switches de Soporte</a>
                                    <ul>
                                        <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Nuevo Switch de Soporte a Bodega</a></li>
                                        <li><a href="contingencia-form_ingresar_prestamo_switch_contingencia.php" >Prestar Switch por Nro de Activo</a></li>
                                        <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Switches Prestados</a></li>
                                    </ul>
                                </li>
                          </ul>
                        </li>

                        <li><a class="fly" href="#">Almacen</a>
                            <ul class="dd">
                                <li><a class="fly" href="#">Equipos para dar de Baja</a>
                                    <ul>
                                        <li><a href="almacen-bajas-form-ingresar_baja.php" >Enviar Correo con formato y soporte a Emma</a></li>
                                        <li><a href="almacen-bajas-form-recibo_de_activos_dados_de_baja_por_almacen.php" >Recibo de activos por almacen</a></li>
                                    </ul>
                                </li>

                                 <li><a class="fly" href="#">Equipos para Reubicar</a>
                                    <ul>
                                        <li><a href="#" >Enviar Correo con formato y soporte a Emma</a></li>
                                        <li><a href="#" >Recibo de activos por almacen</a></li>
                                    </ul>
                                </li>
                          </ul>
                        </li>

                        <li><a href="form_mantenimiento.php">Mantto</a></li>
                        <li><a href="acceso-php_logout.php">Cerrar sesion</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    
        <div id ="block"></div>
            <div class="container">
            <div id="popupbox"></div>
                <div id="content">
                    <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
                </div>
            </div>
        </div>
        </div>
        <form method="post" action="soporte-php_enviar_sql_completo_excel.php">
            <div class="row">
              <div class="columns large-4">
                <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
              </div>
            </div>
        </form>
</body>
</html>