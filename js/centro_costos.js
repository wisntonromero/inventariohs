$('#seleccionar_centro_costo').change(
  function ()
  {
    $.ajax({
          url     :"centro_costo-php_seleccionar_centro_costo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_cen: $('#seleccionar_centro_costo').val(),
          },
      success:function (data) {
        $('#id_cen').val( data['id_cen'] );
       
        if(data = 1){
              $('#res').html("---- Consulta de centro de costo del equipo exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el centro de costo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Centro de costo de equipo no encontrado.")
            console.log('Something went wrong', status, 'Consola...Centro de costo de equipo no encontrado.' ); 
          }
        });
  });