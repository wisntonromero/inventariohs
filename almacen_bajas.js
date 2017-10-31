
$('#enviar_equipos_baja_almacen').click(
  function()
  {
    if($('#archivo_formato').val()==""){
      alert("Ajunta el archivo con el formato de baja");
      return false;
    }
    else{
      var archivo_formato = $('#archivo_formato').val();
    }

    if($('#archivo_soporte').val()==""){
      alert("Ajunta el archivo ZIP con los soportes de baja");
      return false;
    }
    else{
      var archivo_soporte = $('#archivo_soporte').val();
    }

    if($('#relacion_activos').val()==""){
      alert("Introduce los activos que vas a dar de baja, separados por coma(,)");
      return false;
    }
    else{
      var relacion_activos = $('#relacion_activos').val();
    }

    if($('#observaciones').val()==""){
      var observaciones = "NO TIENE"
    }
    else{
      var observaciones = $('#observaciones').val();
    }
        
      var solicitud       = $('#solicitud').val();
      var f_registro      = $('#f_registro').val();
      var observaciones   = $('#observaciones').val();

      //url     :"almacen-php_enviar_mail_equipos_bajas.php",

      $.ajax({
          url     :"almacen-php_enviar_mail_equipos_bajas.php",
          dataType:"json",
          type    :'post',
          data:{
            
            solicitud:solicitud,
            f_registro:f_registro,
            archivo_formato:archivo_formato,
            archivo_soporte:archivo_soporte,
            relacion_activos:relacion_activos,
            observaciones:observaciones
          },

          success:function(data) {
            if(data = 1){

              $('#res').html("---- Equipos de bajas enviados por correos a todos los destinatarios. ----");
              $('#res').css('color','yellow');
          }
            else{
              $('#res').html("Ha ocurrido un error...");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Equipos de bajas enviados por correos a todos los destinatarios.....")
            console.log('Something went wrong', status, 'Equipos de bajas enviados por correos a todos los destinatarios....' );
          }
      });
  }
);







