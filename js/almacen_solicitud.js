$(document).ready(function(){



$('#seleccionar_solicitud').change(
  function ()
  {
    $.ajax({
          url     :"almacen-bajas-php-seleccionar_solicitud.php",
          dataType:"json",
          type    :'post',
          data:{
          id: $('#seleccionar_solicitud').val(),
          solicitud: $('#seleccionar_solicitud').val(),
          },
        success:function (data) {
          $('#id').val( data['id'] );
          $('#solicitud').val( data['solicitud'] );
        
        if(data = 1){
              $('#res').html("---- Consulta de estado exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el estado del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Estado no encontradooooo.")
            console.log('Something went wrong', status, 'Consola...Estado no encontrado.' );
          }
        });
  });
}

