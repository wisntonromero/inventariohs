$('#consulta_switches_en_c_cableado').click(
  function ()
  {
    $.post('c_cableado-php_consultar_c_cableado.php',
      {
        nro_cc: $('#nro_cc').val()
      },
      function (data){
        $('#nro_cc').val( data['nro_cc'] );
        $('#descripcion_cc').val( data['descripcion_cc'] );
        $('#ubicacion_cc').val( data['ubicacion_cc'] );
      }
    );
  }
);

$('#seleccionar_c_cableado').change(
  function ()
  {
    $.ajax({
          url     :"c_cableado-php_consultar_c_cableado.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id_cc: $('#seleccionar_c_cableado').val(),
          },
      success:function (data) {
        
        $('#nro_cc').val( data['nro_cc'] );
        $('#descripcion_cc').val( data['descripcion_cc'] );
        $('#ubicacion_cc').val( data['ubicacion_cc'] );
        
        if(data = 1){
              $('#res').html("---- Consulta exitosa. ----");
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

$('#consulta_c_cableado').click(
  function ()
  {
    $.post('c_cableado-php_consultar_c_cableado.php',
      {
        nro_cc: $('#nro_cc').val()
      },
      function (data){
        $('#nro_cc').val( data['nro_cc'] );
        $('#descripcion_cc').val( data['descripcion_cc'] );
        $('#ubicacion_cc').val( data['ubicacion_cc'] );
      }
    );
  }
);