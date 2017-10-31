$('#seleccionar_marca').change(
  function ()
  {
    $.ajax({
          url     :"marcas-php_seleccionar_marca.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_mar: $('#seleccionar_marca').val(),
          },
      success:function (data) {
        $('#id_mar').val( data['id_mar'] );
        $('#marca').val( data['marca'] );
       
        if(data = 1){
              $('#res').html("---- Consulta de marca exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique la marca del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Marca no encontrada.")
            console.log('Something went wrong', status, 'Consola...Marca no encontrada.' ); 
          }
        });
  });