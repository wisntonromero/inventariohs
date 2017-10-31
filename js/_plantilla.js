$('#consultar_punto_de_red').click(
  function ()
  {
    if($('#punto_de_red').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"red-php_consultar_punto_de_red.php",
          dataType:"json",
          type    :'post',
          data:{ 
            variables ---- punto_de_red: $('#punto_de_red').val(),
          },
      success:function (data){
        
        data

        
        $('#dir_ip_sw').val( data['dir_ip_sw'] );
        $('#puerto_sw').val( data['puerto_sw'] );
        $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
        $('#bloque').val( data['bloque'] );
        $('#piso').val( data['piso'] );
        $('#cubiculo').val( data['cubiculo']);
      },
      error:function() {
        alert("Punto de red no encontrado.");
        console.log('Something went wrong', status, 'Punto de red no encontrado.' ); 
      }
    });
  });