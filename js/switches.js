$('#consultar_switch').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"switches-php_consultar_switch.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {

            if ( jQuery.isEmptyObject(data) == false ){

              $('#tipo_equipo').val( data['tipo_equipo'] );
              $('#marca_equipo').val( data['marca_equipo'] );
              $('#modelo_equipo').val( data['modelo_equipo'] );
              $('#serial_equipo').val( data['serial_equipo'] );
              $('#activo_mon').val( data['activo_mon'] );
              $('#estado_equipo').val( data['estado_equipo'] );

              $('#dir_ip').val( data['dir_ip'] );
              alert("Activo encontrado la base de datos de inventario, pulse aceptar para continuar.");
            }
            else{
              alert("Activo no encontrado, verifique el nro del activo del equipo.");
              console.log('Something went wrong', status, 'Activo no encontrado.' );
              $("#boton_ingresar_activo").css("display", "block");
              $('#res').html("Activo no encontrado en la base de datos, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
              }
          },
              error:function() {
          }
        });
});


$('#consulta_switches_en_c_cableado').click(
  function ()
  {
    $.ajax({
          url     :"switches-php_seleccionar_switches.php",
          dataType:"json",
          type    :'post',
          data:{
          //sw_id: $('#seleccionar_switches').val(),
          nro_cc: $('#nro_cc').val(),
          dir_ip_sw: $('#dir_ip_sw').val(),
          unidad: $('#unidad').val(),
          },
      success:function (data) {
        $('#sw_id').val( data['sw_id'] );
        $('#nro_cc').val( data['nro_cc'] );
        $('#dir_ip_sw').val( data['dir_ip_sw'] );
        $('#unidad').val( data['unidad'] );

        if(data = 1){
              $('#res').html("---- Consulta de switch exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el switch.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("switch no encontrado.")
            console.log('Something went wrong', status, 'Consola...switch de equipo no encontrado.' );
          }
        });
  });


$('#cboSwitches').click(
  function ()
  {
    $.ajax({
          url     :"switches-php_seleccionar_switches.php",
          dataType:"json",
          type    :'post',
          data:{
          id_sw: $('#cboSwitches').val(),
          //id_sw: $('#id_sw').val(),
          nro_cc: $('#nro_cc').val(),
          dir_ip_sw: $('#dir_ip_sw').val(),
          unidad: $('#unidad').val(),
          },
      success:function (data) {
        $('#id_sw').val( data['id_sw'] );
        $('#nro_cc').val( data['nro_cc'] );
        $('#dir_ip_sw').val( data['dir_ip_sw'] );
        $('#unidad').val( data['unidad'] );

        if(data = 1){
              $('#res').html("---- Consulta de switch exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el switch.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("switch no encontrado.")
            console.log('Something went wrong', status, 'Consola...switch de equipo no encontrado.' );
          }
        });
  });


$('#con').click(
  function ()
  {
    $.ajax({
          url     :"switches-php_enviar_sql_a_pantalla.php",
          dataType:"json",
          type    :'post',
          data:{
          id_sw: $('#con').val(),
          },
      success:function (data) {
        $('#sw_id').val( data['sw_id'] );

        if(data = 1){
              $('#res').html("---- Consulta de switch exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el switch.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("switch no encontrado.")
            console.log('Something went wrong', status, 'Consola...switch de equipo no encontrado.' );
          }
        });
  });

      $('#seleccionar_switches_puertos').change(
        function ()
        {
        $.ajax({
              url     :"switches-php_seleccionar_switches_puertos.php",
              dataType:"json",
              type    :'post',
              data:{
              bit_sw_id: $('#seleccionar_switches_puertos').val(),
              },
          success:function (data) {
            $('#bit_sw_id').val( data['bit_sw_id'] );
            $('#id_sw').val( data['id_sw'] );
            $('#sw_id').val( data['sw_id'] );

            if(data = 1){
                  $('#res').html("---- Consulta de switch exitosa. ----");
                  $('#res').css('color','yellow');
                }
                else{
                  $('#res').html("Ha ocurrido un error en la Consulta, verifique el switch.");
                  $('#res').css('color','red');
                }
              },
              error:function() {
                alert("switch no encontrado.")
                console.log('Something went wrong', status, 'Consola...switch de equipo no encontrado.' );
              }
            });
      });


