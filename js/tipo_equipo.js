$('#seleccionar_tipo').change(
  function ()
  {
    $.ajax({
          url     :"tipo_equipo-php_seleccionar_tipo_equipo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_tip: $('#seleccionar_tipo').val(),
          },
      success:function (data) {
        $('#id_tip').val( data['id_tip'] );
        $('#tipo_equipo').val( data['tipo_equipo'] );
       
        if(data = 1){
              $('#res').html("---- Consulta de tipo de equipo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el tipo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Tipo de equipo no encontrado.")
            console.log('Something went wrong', status, 'Consola...Tipo de equipo no encontrado.' ); 
          }
        });
  });