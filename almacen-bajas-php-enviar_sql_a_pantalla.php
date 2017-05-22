 <?php
    //include connection file 
    include_once("connection.php");
   
    $id = $_POST['id'];
    $activo = $_POST['activo'];
    $solicitud = $_POST['solicitud'];
    $recibido_almacen = $_POST['recibido_almacen'];
    $f_recibido = $_POST['f_recibido'];
    $observaciones = $_POST['observaciones'];
   
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $query = "SELECT  (@numero:=@numero+1) AS item, id, solicitud, activo, recibido_almacen,f_recibido,observaciones FROM (SELECT @numero:=0) r, bajas_reubicaciones_detalle WHERE solicitud = '$solicitud'  ORDER BY solicitud ASC";

    $resultado = mysqli_query($conexion,$query) or die("error to fetch employees data");
?>

    <div id="msg" class="alert"></div>
    <table id="solicitudes_almacen" border="1" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
       <thead>
          <tr>
             <th>Item</th>
             <th>Solictud</th>
             <th>Activo</th>
             <th>Recibido almacen</th>
             <th>observaciones</th>
          </tr>
       </thead>
       <tbody id="_editable_table">
          <?php foreach($resultado as $res) :?>
            <tr data-row-id="<?php echo $res['id'];?>">
                <td class="editable-col" contenteditable="false" col-index='0' oldVal ="<?php echo $res['item'];?>"><?php echo $res['item'];?></td>
                <td class="editable-col" contenteditable="false" col-index='1' oldVal ="<?php echo $res['solicitud'];?>"><?php echo $res['solicitud'];?></td>
                <td class="editable-col" contenteditable="false" col-index='2' oldVal ="<?php echo $res['activo'];?>"><?php echo $res['activo'];?></td>
                <td class="editable-col" contenteditable="true"  col-index='3' oldVal ="<?php echo $res['recibido_almacen'];?>"><?php echo $res['recibido_almacen'];?></td>
                            

            <!--   <td class="editable-col" contenteditable="true" col-index='3' > <input type="checkbox" value="<?php echo $res['recibido_almacen'];?>" <?php if ($res['recibido_almacen'] == "NO") echo 'checked="checked"'?> id="recibido_almacen" name='recibido_almacen[]'>NO</td> 

                <td class="editable-col" contenteditable="true" col-index='3' > <input type="checkbox" value="<?php echo $res['recibido_almacen'];?>" <?php if ($res['recibido_almacen'] == "SI") echo 'checked="checked"'?> id="recibido_almacen2" name='recibido_almacen[]'>SI</td>  -->
                
                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $res['observaciones'];?>"><?php echo $res['observaciones'];?></td>
            </tr>
          <?php endforeach;?>
       </tbody>
    </table>


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

    /*    $('td.editable-col').on('focusout', function() {

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

      });*/

    });
</script>