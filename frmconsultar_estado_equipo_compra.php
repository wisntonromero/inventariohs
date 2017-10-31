<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>  
    <div id="contenedor" class="centered"><br>
      <h3><strong>CONSULTAR INFORMACION DE EQUIPO<strong></h3>
      <div class="centered large-3"><br>
        <select id="cbxtipoconsulta">
          <option value="0">-Seleccione Tipo de Consulta-</option>
          <option value="1">Activo</option>
          <option value="2">Fecha</option>
          <option value="3">Responsable</option>
        </select>
        <div id="capa_activo" class="hide"><input type="search" id="txtActivo" placeholder="Consulte por Activo" class="solonum"></div>
        <div id="capa_fecha" class="hide"><input type="text" id="txtFecha" class="datetimepicker" placeholder="Consulte por Fecha"></div>
        <div id="capa_responsable" class="hide"><input type="search" id="txtResponsable" class="mayuscula" placeholder="Consulte por Responsable"></div>
        <!-- <div id="capa_boton" class="hide"><input id="btnconsultar" type="button" class="button" value="Consultar"></div> -->
      </div>
    </div>


    <div id="tabla"></div>
</body>

    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
    <script src="js/jquery.datetimepicker.js"></script>
    <script>jQuery('.datetimepicker').datetimepicker();</script>
</html>