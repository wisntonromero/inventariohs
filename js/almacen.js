$(document).ready(function(){

  

    $('#recibido_almacen').click(function(){
      $("#solicitudes_almacen").load('almacen-bajas-php-enviar_sql_a_pantalla.php');
            
    });

    $('#recibido_por_almacen').click(
      function ()
      {
        
        $.ajax({
              url     :"almacen-bajas-php-recibido_por_almacen.php",
              dataType:"json",
              type    :'post',
              data:{
              id: $('#id').val(),
              solicitud: $('#solicitud').val()
              },
              success:function(data) {
                if ( jQuery.isEmptyObject(data) == false ){
                  $('#res').html("Baja modificada en el sistema.");
                  $('#res').css('color','yellow');

                }
                else{
                  $('#res').html("Ha ocurrido un error.");
                  $('#res').css('color','red');
                }
              },
              error:function() {
              $('#res').html("Baja modificada en el sistema.");
              $('#res').css('color','yellow');
              alert("Activo modificado en la base de datos de compras, se envió correo a todos los implicados en el proceso.")
              $("#capa_btn_guardar_enviar_email").css("display", "none");
              console.log('Something went wrong', status, 'Compra de activo no encontrada en consola.' );
              }
            });
    });
});


