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
          punto_de_red: $('#punto_de_red').val(),
          },
      success:function (data){

      if (jQuery.isPlainObject(data)){
        $('#bloque').val( data['bloque'] );
        $('#piso').val( data['piso'] );
        $('#cubiculo').val( data['cubiculo']);
        $('#tipo_de_punto_de_red').val( data['tipo_de_punto_de_red'] );
        $('#categoria_punto_de_red').val( data['categoria_punto_de_red'] );
        $('#estado_punto_de_red').val( data['estado_punto_de_red'] );
        $('#color_toma').val( data['color_toma'] );

        $('#seleccionar_switches_puertos').val( data['bit_sw_id'] );
        $('#sw_id').val( data['sw_id'] );
        $('#dir_ip_sw').val( data['dir_ip_sw'] );
        $('#puerto_sw').val( data['puerto_sw'] );
        $('#punto_de_red_actual').val( data['punto_de_red_actual'] );
        $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
        $('#estado_puerto_sw').val( data['estado_puerto_sw'] );
       
        $('#res').html("---- Consulta de punto de red exitosa. ----");
        $('#res').css('color','yellow');
      }
        else{
            $('#res').html("Punto de red no encontrado, verifique el nro del punto de red.");
            $('#res').css('color','red');
        }
      },
        error:function() {
          alert("Punto de red no encontrado.")
          console.log('Something went wrong', status, 'Punto de red no encontrado.' );
        }
      });
  });


$('#modificar_punto_de_red').click(
  function ()
  {
    $.ajax({
          url     :"red-php_modificar_punto_de_red.php",
          dataType:"json",
          type    :'post',
          data:{
            bit_sw_id:$('#seleccionar_switches_puertos').val(),
            sw_id:$('#sw_id').val(),
            dir_ip_sw:$('#dir_ip_sw').val(),
            puerto_sw:$('#puerto_sw').val(),
            vlan_puerto_sw:$('#vlan_puerto_sw').val(),
            punto_de_red:$('#punto_de_red').val(),
            punto_de_red_actual:$('#punto_de_red_actual').val(),
            estado_puerto_sw:$('#estado_puerto_sw').val(),
            bloque:$('#bloque').val(),
            piso:$('#piso').val(),
            cubiculo:$('#cubiculo').val(),
            tipo_de_punto_de_red:$('#tipo_de_punto_de_red').val(),
            categoria_punto_de_red:$('#categoria_punto_de_red').val(),
            estado_punto_de_red:$('#estado_punto_de_red').val(),
            color_toma:$('#color_toma').val()
         },
      success:function (data){
        if(data = 1){
          $('#res').html("Punto de red modificado en el sistema.");
          $('#res').css('color','yellow');
        }
        else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
        }
      },
      error:function() {
        alert("Punto de red no encontrado.")
        console.log('Something went wrong', status, 'Punto de red no encontrado.' );
      }
    });
  }
  );


$('#ingresar_punto_de_red').click(
  function()
  {
    if($('#punto_de_red').val()==""){
      alert("Introduce el numero del punto de red");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#seleccionar_switches').val()==""){
      alert("Introduce la direccion ip del sw");
      return false;
    }
    else{
      var seleccionar_switches_puertos = $('#seleccionar_switches_puertos').val();
    }

    if($('#puerto_sw').val()==""){
      alert("Introduce el puerto del sw");
      return false;
    }
    else{
      var puerto_sw = $('#puerto_sw').val();
    }

    if($('#vlan_puerto_sw').val()==""){
      alert("Introduce la vlan del puerto del sw");
      return false;
    }
    else{
      var vlan_puerto_sw = $('#vlan_puerto_sw').val();
    }
    if($('#estado_puerto_sw').val()==""){
      alert("Introduce el estado del punto de red donde se encuentra en punto de red");
      return false;
    }
    else{
      var estado_puerto_sw = $('#estado_puerto_sw').val();
    }
    if($('#bloque').val()==""){
      alert("Introduce el bloque ");
      return false;
    }
    else{
      var bloque = $('#bloque').val();
    }
    if($('#piso').val()==""){
      alert("Introduce el piso");
      return false;
    }
    else{
      var piso = $('#piso').val();
    }
    if($('#cubiculo').val()==""){
      alert("Introduce el cubiculo donde se encuentra en punto de red");
      return false;
    }
    else{
      var cubiculo = $('#cubiculo').val();
    }
    if($('#estado_punto_de_red').val()==""){
      alert("Introduce el estado del punto de red (Ocupado / Libre /  Dañado)");
      return false;
    }
    else{
      var estado_punto_de_red = $('#estado_punto_de_red').val();
    }
    if($('#tipo_de_punto_de_red').val()==""){
      alert("Introduce el tipo de punto de red ( Datos o Telefonico");
      return false;
    }
    else{
      var tipo_de_punto_de_red = $('#tipo_de_punto_de_red').val();
    }
    if($('#categoria_punto_de_red').val()==""){
      alert("Introduce la categoria del punto de red");
      return false;
    }
    else{
      var categoria_punto_de_red = $('#categoria_punto_de_red').val();
    }
    if($('#color_toma').val()==""){
      alert("Introduce la categoria del punto de red");
      return false;
    }
    else{
      var color_toma = $('#color_toma').val();
    }

        $.ajax({
          url     :"red-php_ingresar_punto_de_red.php",
          dataType:"json",
          type    :'post',
          data:{
            punto_de_red:punto_de_red,
            bit_sw_id:seleccionar_switches_puertos,
            id_sw:id_sw,
            puerto_sw:puerto_sw,
            vlan_puerto_sw:vlan_puerto_sw,
            estado_puerto_sw:estado_puerto_sw,
            bloque:bloque,
            piso:piso,
            cubiculo:cubiculo,
            tipo_de_punto_de_red:tipo_de_punto_de_red,
            categoria_punto_de_red:categoria_punto_de_red,
            estado_punto_de_red:estado_punto_de_red
          },
          success:function(data) {
            if(data = 1){
              $('#res').html("---- Punto de red ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del punto de red.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Punto de red no encontrado.")
            console.log('Something went wrong', status, 'Punto de red no encontrado.' );
          }
        });
  }
);

$('#btn_ingresar_puntos_de_red_por_lotes').click(
  function()
  {
    //var id_tip                  = $('#id_tip').val();
        $.ajax({
          url     :"red-php_ingresar_puntos_de_red_por_lotes.php",
          dataType:"json",
          type    :'post',
          data:{
          nro_cc:                 $('#nro_cc').val(),
          letra_pp:               $('#letra_pp').val(),
          nro_inicial:            $('#nro_inicial').val(),
          nro_final:              $('#nro_final').val(),
          bloque:                 $('#bloque').val(),
          piso:                   $('#piso').val(),
          cubiculo:               $('#cubiculo').val(),
          tipo_de_punto_de_red:   $('#tipo_de_punto_de_red').val(),
          categoria_punto_de_red: $('#categoria_punto_de_red').val(),
          estado_punto_de_red:    $('#estado_punto_de_red').val(),
          color_toma:             $('#color_toma').val()
        },
          success:function(data) {
            if(data = 1){
              $('#res').html("Puntos de red adicionados al sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Puntos de red adicionados a la base de datos.")
            console.log('Something went wrong', status, 'Error encontrada en consola.' );
          }
        });
  }
);

$('.punto_de_red').focusout(
  function(){
     $.ajax({
          url     :"red-php_consultar_punto_de_red_duplicado.php",
          dataType:"json",
          type    :'post',
          data:{
          punto_de_red: $('#punto_de_red').val(),
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
          alert('Punto de red repetido con el activo: '+ data['activo_equipo']+' Tipo de equipo:  '+ data['tipo_equipo'] +' Estado del equipo:  '+ data['estado_equipo'] );
          $("#punto_de_red").focus();
              $('#res').html("---- Punto de red duplicado. ----");
              $('#res').css('color','yellow');
          },
  });

});




