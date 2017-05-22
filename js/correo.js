// correo Responsable
$('#seleccionar_correo').change(
  function ()
  {
    $.ajax({
          url     :"correo-php_seleccionar_correo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_correo: $('#seleccionar_correo').val(),
          nombres: $('#responsable').val(),
          },
      success:function (data) {
        
        $('#email_responsable').val( data['correo'] );
        $('#responsable').val( data['nombres'] );
        
        if(data = 1){
              $('#res').html("---- Consulta de correo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el correo del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Correo de cliente no encontrado.")
            console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
          }
        });
  });


// correo Usuario
$('#seleccionar_correo2').change(
  function ()
  {
    $.ajax({
          url     :"correo-php_seleccionar_correo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_correo: $('#seleccionar_correo2').val(),
          nombres: $('#usuario').val(),
          ext: $('#ext_tel').val(),

          },
      success:function (data) {
        
        $('#email_usuario').val( data['correo'] );
        $('#usuario').val( data['nombres'] );
        $('#ext_tel').val( data['ext'] );
            if(data = 1){
              $('#res').html("---- Consulta de correo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el correo del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Correo de cliente no encontrado.")
            console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
          }
        });
  });

$('#seleccionar_correo_usuario_equipo').change(
  function ()
  {
    $.ajax({
          url     :"correo-php_seleccionar_correo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_correo: $('#seleccionar_correo_usuario_equipo').val(),
          nombres: $('#usuario_equipo').val(),
          ext: $('#ext_tel').val(),

          },
      success:function (data) {
        
        $('#email_usuario').val( data['correo'] );
        $('#usuario_equipo').val( data['nombres'] );
        $('#ext_tel').val( data['ext'] );
            if(data = 1){
              $('#res').html("---- Consulta de correo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el correo del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Correo de cliente no encontrado.")
            console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
          }
        });
  });


// CORREO CONTINGENCIA SWITCH
$('#seleccionar_correo3').change(
  function ()
  {
    $.ajax({
          url     :"correo-php_seleccionar_correo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_correo: $('#seleccionar_correo3').val(),
          nombres: $('#usuario').val(),
          ext: $('#ext_tel').val(),

          },
      success:function (data) {
        
        $('#email_usuario').val( data['correo'] );
        $('#usuario_equipo').val( data['nombres'] );
        $('#ext_tel').val( data['ext'] );
            if(data = 1){
              $('#res').html("---- Consulta de correo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el correo del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Correo de cliente no encontrado.")
            console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
          }
        });
  });


