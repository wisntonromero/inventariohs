$('#seleccionar_prioridad').change(
  function ()
  {
    $.ajax({
          url     :"prioridad-php_seleccionar_prioridad.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_pri: $('#seleccionar_prioridad').val(),
          },
      success:function (data) {
        $('#id_pri').val( data['id_pri'] );
       
        if(data = 1){
              $('#res').html("---- Consulta de tipo de prioridad exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el tipo prioridad.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Tipo de prioridad no encontrada.")
            console.log('Something went wrong', status, 'Consola...Tipo de prioridad no encontrado.' ); 
          }
        });
  });