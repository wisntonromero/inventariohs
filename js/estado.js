$('#seleccionar_estado').change(
  function ()
  {
    $.ajax({
          url     :"estado-php_seleccionar_estado.php",
          dataType:"json",
          type    :'post',
          data:{
          id_est: $('#seleccionar_estado').val(),
          },
      success:function (data) {
        $('#id_est').val( data['id_est'] );
        $('#estado_equipo').val( data['estado_equipo'] );
        estado = $('#id_est').val();

        if(data = 1){
              $('#res').html("---- Consulta de estado exitosa. ----");
              $('#res').css('color','yellow');

              if(estado==5){
                //compras
                $("#prueba").css("display", "block");
                $("#prueba2").css("display", "block");
                $("#capa_btn_guardar_enviar_email").css("display", "none");
                $("#capa_btn_guardar").css("display", "block");
                // reubicados
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "block");
              }

              if(estado==6){
                //compras
                $("#prueba").css("display", "block");
                $("#prueba2").css("display", "block");
                $("#capa_btn_guardar_enviar_email").css("display", "block");
                $("#capa_btn_guardar").css("display", "none");
                 // reubicados
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "block");
                $("#capa_btn_guardar_reubicado").css("display", "none");
              }
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el estado del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Estado no encontrado.")
            console.log('Something went wrong', status, 'Consola...Estado no encontrado.' );
          }
        });
  });