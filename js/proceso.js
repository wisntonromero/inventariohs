$('#seleccionar_proceso').change(
  function ()
  {
    $.ajax({
          url     :"proceso-php_seleccionar_proceso.php",
          dataType:"json",
          type    :'post',
          data:{
          id_pro: $('#seleccionar_proceso').val(),
          },
      success:function (data) {
        $('#id_pro').val( data['id_pro'] );


        if(data = 1){
              $('#res').html("---- Consulta de proceso del equipo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el proceso del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("proceso no encontrado.")
            console.log('Something went wrong', status, 'Consola...proceso no encontrado.' );
          }
        });
  });