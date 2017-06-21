$(document).ready(function(){
  $("#prueba").css("display", "none");
  $("#prueba2").css("display", "none");
  $("#capa_red").css("display", "none");
  $("#capa_btn_guardar_enviar_email").css("display", "none");
  $("#capa_btn_guardar").css("display", "block");
  $("#capa_btn_ingresar").css("display", "block");

$('#btnconsultar_activo_compra').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"compras-php_consultar_activo_compra.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
            if (jQuery.isPlainObject(data)){

            $('#seleccionar_tipo').val( data['id_tip'] );
            $('#id_tip').val( data['id_tip'] );
            $('#tipo_equipo').val( data['tipo_equipo'] );
            $('#seleccionar_marca').val( data['marca'] );
            $('#id_mar').val( data['marca'] );
            $('#modelo_equipo').val( data['modelo_equipo'] );
            $('#seleccionar_prioridad').val( data['prioridad'] );
            $('#id_pri').val( data['prioridad'] );
            $('#orden_de_compra').val( data['orden_de_compra'] );
            $('#serial_equipo').val( data['serial_equipo'] );
            $('#seleccionar_centro_costo').val( data['centro_costo'] );
            $('#id_cen').val( data['centro_costo'] );
            $('#activo_monitor').val( data['activo_monitor'] );
            $('#serial_monitor').val( data['serial_monitor'] );
            $('#seleccionar_estado').val( data['estado_equipo'] );
            $('#id_est').val( data['estado_equipo'] );
            $('#estado_equipo').val( data['estado_equipo'] );
            $('#activo_equipo_retirar').val( data['activo_equipo_retirar'] );
            $('#activo_monitor_retirar').val( data['activo_monitor_retirar'] );
            $('#seleccionar_proceso').val( data['id_pro'] );
            $('#id_pro').val( data['id_pro'] );
            $('#proceso_equipo_retirar').val( data['proceso_equipo_retirar'] );

            $('#responsable').val( data['responsable']);
            $('#email_responsable').val( data['email_responsable'] );
            $('#usuario').val( data['usuario']);
            $('#email_usuario').val( data['email_usuario']);
            $('#ext_tel').val( data['ext_tel']);
            $('#bloque').val( data['bloque']);
            $('#piso').val( data['piso']);
            $('#cubiculo').val( data['cubiculo'] );

            $('#dir_ip').val( data['dir_ip'] );
            $('#dir_mac').val( data['dir_mac'] );
            $('#punto_de_red').val( data['punto_de_red'] );
            $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
            $('#seleccionar_switches_puertos').val( data['bit_sw_id'] );
            $('#dir_ip_sw').val( data['dir_ip_sw'] );
            $('#puerto_sw').val( data['puerto_sw'] );
            $('#ubicacion_p_red').val( data['ubicacion_p_red'] );

            $('#ot_sigma').val( data['ot_sigma'] );
            $('#observaciones').val( data['observaciones'] );
            $('#f_ult_actualizacion').val( data['f_ult_actualizacion'] );

            $("#prueba").css("display", "none");
            $("#prueba2").css("display", "none");
            $("#capa_red").css("display", "block");
            $("#capa_btn_guardar_enviar_email").css("display", "none");
            $("#capa_btn_guardar").css("display", "block");

            estado = $('#id_est').val();

              $('#res').html("---- Consulta de activo exitosa. ---- ");
              $('#res').css('color','yellbow');

              if(estado==6){
                $("#prueba").css("display", "block");
                $("#prueba2").css("display", "block");
                $("#capa_btn_guardar_enviar_email").css("display", "none");
                $("#capa_btn_guardar").css("display", "none");
                $('#capa_select_estado').children().attr('disabled', 'disabled'); // To disable
              }

              if(estado==5){
                $("#prueba").css("display", "block");
                $("#prueba2").css("display", "block");
                $("#capa_btn_guardar").css("display", "block");
              }
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            console.log('Something went wrong', status, 'Activo no encontrado en consola...' );
          }
        });
  });

$('#btningresar_compra').click(
  function()
  {
    if($('#orden_de_compra').val()==""){
      alert("Introduce el numero del orden de compra");
      return false;
    }
    else{
      var orden_de_compra = $('#orden_de_compra').val();
    }

    if($('#id_tip').val()==""){
      alert("Introduce el tipo de equipo");
      return false;
    }
    else{
      var id_tip = $('#id_tip').val();
    }

    if($('#id_mar').val()==""){
      alert("Introduce la marca del equipo");
      return false;
    }
    else{
      var id_mar = $('#id_mar').val();
    }

    if($('#modelo_equipo').val()==""){
      alert("Introduce el modelo del equipo");
      return false;
    }
    else{
      var modelo_equipo = $('#modelo_equipo').val();
    }

    if($('#id_pri').val()==""){
      alert("Introduce la prioridad del equipo");
      return false;
    }
    else{
      var id_pri = $('#id_pri').val();
    }

    if($('#activo_equipo').val()==""){
      alert("Introduce el activo del equipo a instalar");
      return false;
    }
    else{
      var activo_equipo = $('#activo_equipo').val();
    }

    if($('#id_cen').val()==""){
      alert("Introduce el centro de costo del equipo");
      return false;
    }
    else{
      var id_cen = $('#id_cen').val();
    }

    if($('#activo_monitor').val()==""){
      alert("Introduce el activo de monitor a instalar");
      return false;
    }
    else{
      var activo_monitor = $('#activo_monitor').val();
    }

    if($('#id_pro').val()==""){
      alert("Introduce el proceso del equipo");
      return false;
    }
    else{
      var id_pro = $('#id_pro').val();
    }

    if($('#responsable').val()==""){
      alert("Introduce el responsable del equipo");
      return false;
    }
    else{
      var responsable = $('#responsable').val();
    }

    if($('#usuario').val()==""){
      alert("Introduce el usuario del equipo");
      return false;
    }
    else{
      var usuario = $('#usuario').val();
    }

    if($('#bloque').val()==""){
      alert("Introduce el bloque");
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
      alert("Introduce el cubiculo");
      return false;
    }
    else{
      var cubiculo = $('#cubiculo').val();
    }

      var id_est                  = $('#id_est').val();
      var tipo_equipo             = $('#tipo_equipo').val();
      var serial_equipo           = $('#serial_equipo').val();
      var serial_monitor          = $('#serial_monitor').val();
      var activo_equipo_retirar   = $('#activo_equipo_retirar').val();
      var activo_monitor_retirar  = $('#activo_monitor_retirar').val();
      var ext_tel                 = $('#ext_tel').val();
      var observaciones           = $('#observaciones').val();


      $.ajax({
      url     :"compras-php_ingresar_compras.php",
      dataType:"json",
      type    :'post',
      data:{
        orden_de_compra:orden_de_compra,
        id_tip:id_tip,
        tipo_equipo:tipo_equipo,
        id_mar:id_mar,
        modelo_equipo:modelo_equipo,
        id_pri:id_pri,
        activo_equipo:activo_equipo,
        serial_equipo:serial_equipo,
        id_cen:id_cen,
        activo_monitor:activo_monitor,
        serial_monitor:serial_monitor,
        id_est:id_est,
        activo_equipo_retirar:activo_equipo_retirar,
        activo_monitor_retirar:activo_monitor_retirar,
        id_pro:id_pro,
        //proceso_equipo_retirar:proceso_equipo_retirar,
        responsable:responsable,
        usuario:usuario,
        ext_tel:ext_tel,
        bloque:bloque,
        piso:piso,
        cubiculo:cubiculo,
        observaciones:observaciones
      },
      success:function(data) {
        if(data = 1){
          $('#res').html("---- Compra ingresada al sistema. ----");
          $('#res').css('color','yellow');
          $("#capa_btn_ingresar").css("display", "none");
          alert("Orden de compra ingresada al sistema.")

        }
        else{
          $('#res').html("Ha ocurrido un error en el ingreso de la compra.");
          $('#res').css('color','red');
        }
      },
      error:function() {
        alert("Orden de compra no encontrada.")
        console.log('Something went wrong', status, 'Orden de compra no encontrada.' );
      }
    });
  }
);


$('#btnmodificar_compra').click(
  function()
  {
        var dir_ip = $('#dir_ip').val();

        if(dir_ip.indexOf(',') != -1){
        alert("No se aceptan (,), coloca (.) para separar las ip.");
        return false;
        }
        else{
          var dir_ip = $('#dir_ip').val();
        }

        //var id_tip                  = $('#id_tip').val();
        $.ajax({
          url     :"compras-php_modificar_compras.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo:          $('#activo_equipo').val(),
          id_tip:                 $('#id_tip').val(),
          tipo_equipo:            $('#tipo_equipo').val(),
          id_mar:                 $('#id_mar').val(),
          modelo_equipo:          $('#modelo_equipo').val(),
          id_pri:                 $('#id_pri').val(),
          orden_de_compra:        $('#orden_de_compra').val(),
          serial_equipo:          $('#serial_equipo').val(),
          id_cen:                 $('#id_cen').val(),
          activo_monitor:         $('#activo_monitor').val(),
          serial_monitor:         $('#serial_monitor').val(),
          id_est:                 $('#id_est').val(),
          estado_equipo:          $('#estado_equipo').val(),
          activo_equipo_retirar:  $('#activo_equipo_retirar').val(),
          activo_monitor_retirar: $('#activo_monitor_retirar').val(),
          id_pro:                 $('#id_pro').val(),
          proceso_equipo_retirar: $('#proceso_equipo_retirar').val(),

          responsable:            $('#responsable').val(),
          email_responsable:      $('#email_responsable').val(),
          usuario:                $('#usuario').val(),
          email_usuario:          $('#email_usuario').val(),
          ext_tel:                $('#ext_tel').val(),

          bloque:                 $('#bloque').val(),
          piso:                   $('#piso').val(),
          cubiculo:               $('#cubiculo').val(),

          dir_ip:                 $('#dir_ip').val(),
          dir_mac:                $('#dir_mac').val(),
          punto_de_red:           $('#punto_de_red').val(),
          ot_sigma:               $('#ot_sigma').val(),
          observaciones:          $('#observaciones').val()

        },
          success:function(data) {
            if(data = 1){
              $('#res').html("Compra de activo modificado en el sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo modificado en la base de datos de compras.")
            console.log('Something went wrong', status, 'Compra de activo no encontrada en consola.' );
          }
        });
  }
);

$('#btnmodificar_compra_enviar_email').click(
  function()
  {
        $("#capa_btn_guardar_enviar_email").css("display", "none");
        
        if($('#email_responsable').val()==""){
          alert("Introduce el email del responsable del equipo");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var email_responsable = $('#email_responsable').val();
        }

        if($('#email_usuario').val()==""){
          alert("Introduce el email del usuario final del equipo");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var email_usuario = $('#email_usuario').val();
        }

        if($('#dir_ip').val()==""){
          alert("Introduce la direccíon Ip del equipo");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var dir_ip = $('#dir_ip').val();
        }

        var dir_ip = $('#dir_ip').val();
        if(dir_ip.indexOf(',') != -1){
        alert("No se aceptan (,). Coloca (.) para separar las ip.");
        $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var dir_ip = $('#dir_ip').val();
        }

        if($('#dir_mac').val()==""){
          alert("Introduce la direccíon Mac del equipo");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var dir_mac = $('#dir_mac').val();
        }

        $string = '#punto_de_red'
        if($('#punto_de_red').val()==""){
          alert("Introduce el punto de red del equipo");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#punto_de_red').val()=="NO APLICA"){
          alert("Punto de red no valido, Coloca NO TIENE.");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#punto_de_red').val()=="N/A"){
          alert("Punto de red no valido, Coloca NO TIENE.");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#punto_de_red').val()=="N"){
          alert("Punto de red no valido, Coloca NO TIENE.");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#punto_de_red').val()=="NO"){
          alert("Punto de red no valido, Coloca NO TIENE.");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#punto_de_red').val()=="NA"){
          alert("Punto de red no valido, Coloca NO TIENE.");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var punto_de_red = $('#punto_de_red').val();
        }

        if($('#ot_sigma').val()==""){
          alert("Introduce la Ot de Servicio");
          $("#capa_btn_guardar_enviar_email").css("display", "block");
          return false;
        }
        else{
          var ot_sigma = $('#ot_sigma').val();
        }
        $.ajax({
          url     :"compras-php_modificar_compras_enviar_email.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo:          $('#activo_equipo').val(),
          id_tip:                 $('#id_tip').val(),
          tipo_equipo:            $('#tipo_equipo').val(),
          id_mar:                 $('#id_mar').val(),
          modelo_equipo:          $('#modelo_equipo').val(),
          id_pri:                 $('#id_pri').val(),
          orden_de_compra:        $('#orden_de_compra').val(),
          serial_equipo:          $('#serial_equipo').val(),
          id_cen:                 $('#id_cen').val(),
          activo_monitor:         $('#activo_monitor').val(),
          serial_monitor:         $('#serial_monitor').val(),
          id_est:                 $('#id_est').val(),
          estado_equipo:          $('#estado_equipo').val(),
          activo_equipo_retirar:  $('#activo_equipo_retirar').val(),
          activo_monitor_retirar: $('#activo_monitor_retirar').val(),
          id_pro:                 $('#id_pro').val(),
          proceso_equipo_retirar: $('#proceso_equipo_retirar').val(),

          responsable:            $('#responsable').val(),
          email_responsable:      $('#email_responsable').val(),
          usuario:                $('#usuario').val(),
          email_usuario:          $('#email_usuario').val(),
          ext_tel:                $('#ext_tel').val(),

          bloque:                 $('#bloque').val(),
          piso:                   $('#piso').val(),
          cubiculo:               $('#cubiculo').val(),

          dir_ip:                 $('#dir_ip').val(),
          dir_mac:                $('#dir_mac').val(),
          punto_de_red:           $('#punto_de_red').val(),
          ot_sigma:               $('#ot_sigma').val(),
          observaciones:          $('#observaciones').val()

        },
          success:function(data) {
            if ( jQuery.isEmptyObject(data) == false ){
              $('#res').html("Compra de activo modificado en el sistema.");
              $('#res').css('color','yellow');

            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
          $('#res').html("Compra de activo modificado en el sistema.");
          $('#res').css('color','yellow');
          alert("Activo modificado en la base de datos de compras, se envió correo a todos los implicados en el proceso.")
          $("#capa_btn_guardar_enviar_email").css("display", "none");
          console.log('Something went wrong', status, 'Compra de activo no encontrada en consola.' );
          }
        });
  }
);

//});


$('#btnmodificar_orden_de_compra_por_lote').click(
  function()
  {
    //var id_tip                  = $('#id_tip').val();
        $.ajax({
          url     :"compras-php_modificar_orden_de_compra_por_lotes.php",
          dataType:"json",
          type    :'post',
          data:{
          orden_de_compra:        $('#orden_de_compra').val(),
          id_est:                 $('#id_est').val()
        },
          success:function(data) {
            if(data = 1){
              $('#res').html("Orden de compra modificada en el sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Orden de compra modificada en la base de datos de compras.")
            console.log('Something went wrong', status, 'Orden de compra no encontrada en consola.' );
          }
        });
  }
);

});

$('.activo_equipo').focusout(
  function(){
  $.ajax({
          url     :"compras-php_consultar_activo_duplicado.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
          alert('Activo repetido con el activo: '+ data['activo_equipo']+' Orden de compra:  '+ data['orden_de_compra']);
          $("#activo_equipo").focus();
              $('#res').html("---- Activo repetido. ----");
              $('#res').css('color','yellow');
          },
  });
});

$('email_responsable').focusout(
  function() {
  //  $('#send').click(function(){
        if($("#email_responsable").val().indexOf('@uninorte.edu.co', 0) == -1 || $("#email_responsable").val().indexOf('.', 0) == -1) {
            alert('El correo electrónico introducido no es correcto.');
            $("#email_responsable").focus();
            //return false;
        }
        //alert('El email introducido es correcto.');
  //  });
});

$('email_usuario').focusout(
  function() {
  //  $('#send').click(function(){
        if($("#email_usuario").val().indexOf('@uninorte.edu.co', 0) == -1 || $("#email_usuario").val().indexOf('.', 0) == -1) {
            $("#email_usuario").focus();
            alert('El correo electrónico introducido no es correcto.');
            //return false;
        }
        //alert('El email introducido es correcto.');
  //  });
});

$('#punto_de_red').focusout(
  function(){
  $.ajax({
          url     :"red-php_consultar_punto_de_red1.php",
          dataType:"json",
          type    :'post',
          data:{
          punto_de_red: $('#punto_de_red').val(),
          },
          success:function(data) {
           if ( jQuery.isEmptyObject(data) == false ){
              $('#res').html("Punto de red encontrado...");
              $('#res').css('color','yellow');
            }
            /*else{
              alert("Punto de red NO existe en la base de datos, por favor verificar el punto der red.");
              $("#punto_de_red").focus();
              alert('punto de red NO encontrado' ); 
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }*/
          },
          error:function() {
            alert("Punto de red NO existe en la base de datos, por favor verificar el punto de red.");
            //$("#punto_de_red").focus();
         //   console.log('Something went wrong', status, 'Consola - Punto de red no existe en la base de datos, por favor verificar el punto der red.' );
          }





  });
});

  //PUNTOS DE RED
  function letrasynumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdefghijklmnñopqrstuvwxyz";
    especiales = [48,49,50,51,52,53,54,55,56,57,32];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  function letrasynumeros_sin_espacio(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdefghijklmnñopqrstuvwxyz";
    especiales = [48,49,50,51,52,53,54,55,56,57];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  // DIR IP
  function solonumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = ".";
    especiales = [48,49,50,51,52,53,54,55,56,57,188];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  // DIR MAC
  function solohexadecimal(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdef-";
    especiales = [8,48,49,50,51,52,53,54,55,56,57];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  function limpia(){
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i=0;i<tam;i++){
   if(!isNaN(val[i]))
   document.getElementById("miInput").value='';
      }
  }

 // $.ajax({
 //        url     :"cargar_marcas.php",
 //        dataType:"json",
 //        type    :"post",
 //        success:function(datos) {
 //          for (var i = 0; i <= datos.length - 1; i++) {
 //              $('#cbxmarca').append("<option value="+datos[i].id+">"+datos[i].marca+"</option>");
 //          };
 //        },
 //        error:function() {

 //          console.log('Something went wrong', status, err );

 //        }
 //      });

 //   $.ajax({
 //      url     :"cargar_tipo_equipos.php",
 //      dataType:"json",
 //      type    :"post",
 //      success:function(datos) {
 //        for (var i = 0; i <= datos.length - 1; i++) {
 //            $('.tipo_equipo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].tipo+"</option>");
 //        };
 //      },
 //      error:function() {

 //        console.log('Something went wrong', status, err );

 //      }
 //    });

   // $.ajax({
   //    url     :"cargar_centro_costos.php",
   //    dataType:"json",
   //    type    :"post",
   //    success:function(datos) {
   //      for (var i = 0; i <= datos.length - 1; i++) {
   //          $('#cbxcentro_costo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].centro+"</option>");
   //      };
   //    },
   //    error:function() {

   //      console.log('Something went wrong', status, err );

   //    }
   //  });

  // $.ajax({
  //     url     :"cargar_prioridad.php",
  //     dataType:"json",
  //     type    :"post",
  //     success:function(datos) {
  //       for (var i = 0; i <= datos.length - 1; i++) {
  //           $('.prioridad').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].prioridad+"</option>");
  //       };
  //     },
  //     error:function() {

  //       console.log('Something went wrong', status, err );

  //     }
  //   });

    // $.ajax({
    //   url     :"cargar_procesos.php",
    //   dataType:"json",
    //   type    :"post",
    //   success:function(datos) {
    //     for (var i = 1; i <= datos.length - 1; i++) {
    //         $('#cbxproceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
    //     };
    //     for (var i = 0; i <= datos.length - 1; i++) {
    //         $('.proceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
    //     };
    //   },
    //   error:function() {

    //     console.log('Something went wrong', status, err );
    //   }
    // });
