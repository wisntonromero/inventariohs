<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>
  <form method="post">

    <div class="row">
      <h4>Información de los equipos por orden de compra</h4>
      <div class="columns large-3">
        <label for="orden_de_compra">Orden de compra</label>
        <input type="text" name="orden_de_compra" id="orden_de_compra" placeholder="Obligatorio orden de compra " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      </div>

      <div class="columns large-4">
            <label for="proceso_equipo">Estado actual del equipo.</label>
            <select name="seleccionar_estado" id="seleccionar_estado">
                  <option selected="selected">----Seleccionar estado ----</option>
                  <?php
                    include_once("config.php");
                      $conexion   = mysql_connect($server,$username,$password);
                      mysql_set_charset('utf8',$conexion);
                      mysql_select_db($database);
                      $id_est     = $_POST['id_est'];
                      $estado_equipo  = $_POST['estado_equipo'];

                    $query = "SELECT est_id,est_descripcion FROM estado ORDER BY est_descripcion ASC  ";

                    $resultado = mysql_query($query,$conexion);
                    $numero_de_filas = mysql_num_rows($resultado);
                    while($registro=mysql_fetch_array($resultado))
                    {
                      $id_est     = $registro['est_id'];
                      $estado_equipo  = $registro['est_descripcion'];

                      echo '<option value="'.$id_est.'">'.$estado_equipo.'</option>';
                  }
                ?>
              </select> <br/><br/>
        </div>

        <div class="columns large-2">
            <input type="hidden" name="id_est" id="id_est" value="" placeholder="Obligatorio estado del equipo">
        </div>
        <div class="columns large-2">
            <input type="hidden" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
        </div>
</div>

    <div class="row">
      <div class="columns large-4">
        <input type="button" name="consultar_compras_de_equipos_por_pantalla" id="consultar_compras_de_equipos_por_pantalla" value="Consultar orden de compra por lotes" class="button">
      </div>
    </div>

     <div id="resultado" class="row">

     </div>

     <div class="row">
      <div class="columns large-4">
        <input type="button" name="btnmodificar_orden_de_compra_por_lote" id="btnmodificar_orden_de_compra_por_lote" value="Modificar estado por lotes" class="button">
      </div>
    </div>
  </form>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/estado.js"></script>
  <script src="js/compras.js"></script>
  <script>
    $(document).foundation();

    $('#consultar_compras_de_equipos_por_pantalla').click(function(e){

      $.post('compras-php_enviar_sql_a_pantalla.php',
        {
          orden_de_compra: $('#orden_de_compra').val(),
          id_est: $('#id_est').val(),
        },
        function (data){
          $('#resultado').html(data);
        }
      );

    });

  </script>


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
          url: "server.php",  
          cache:false,  
          data: data,
          dataType: "json",       
          success: function(response)  
          {   
            //$("#loading").hide();
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

</script>