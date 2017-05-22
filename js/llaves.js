$('#ingresar_prestamo_llaves').click(
  function()
  {
    if($('#nro_cc').val()==""){
      alert("Introduce el numero del centro de cableado");
      return false;
    }
    else{
      var nro_cc = $('#nro_cc').val();
    }
    if($('#f_h_prestamo').val()==""){
      alert("Introduce la fecha y la hora de prestamo de las llaves");
      return false;
    }
    else{
      var f_h_prestamo = $('#f_h_prestamo').val();
    }
    if($('#f_h_limite').val()==""){
      alert("Introduce la fecha y la hora limite de prestamo de las llaves");
      return false;
    }
    else{
      var f_h_limite = $('#f_h_limite').val();
    }
    if($('#correo').val()==""){
      alert("Introduce el correo del cliente que pide las llaves");
      return false;
    }
    else{
      var correo = $('#correo').val();
    }
    if($('#trabajo').val()==""){
      alert("Introduce el trabajo se va a realizar dentro del centro de cableado");
      return false;
    }
    else{
      var trabajo = $('#trabajo').val();
    }
      var cliente = $('#cliente').val();
      var empresa = $('#empresa').val();
      var descripcion_cc = $('#descripcion_cc').val();
      var ext_tel = $('#ext_tel').val();

        $.ajax({
          url     :"llaves-php_ingresar_prestamo.php",
          dataType:"json",
          type    :'post',
          data:{
            nro_cc:nro_cc,
            descripcion_cc:descripcion_cc,
            f_h_prestamo:f_h_prestamo,
            f_h_limite:f_h_limite,
            cliente:cliente,
            empresa:empresa,
            correo:correo,
            ext_tel:ext_tel,
            trabajo:trabajo
          },
          success:function(data) {
            if(data = 1){
              $('#res').html("---- Prestamo de llaves ingresadas al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del prestamo de las llaves.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Prestamo de llaves ingresadas al sistema.")
            console.log('Something went wrong', status, 'Prestamo de llaves ingresadas al sistema....' );
          }
        });
  }
);

$('#mail_recibir_llaves').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"llaves-php_recibir_llaves_enviar_mail.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  nro_cc:nro_cc,
                  descripcion_cc:descripcion_cc,
                  f_h_prestamo:f_h_prestamo,
                  f_h_limite:f_h_limite,
                  cliente:cliente,
                  empresa:empresa,
                  correo:correo,
                  ext_tel:ext_tel,
                  trabajo:trabajo
                  },

                  success:function(data){
                    if(data > 1){
                      $('#res').html("---- El mensaje se envio con exito al usuario. ----");
                      $('#res').css('color','yellow');
                    }
                    else{
                      $('#res').html("Ha ocurrido un error al enviar el mensaje, verifique su conexion a internet.");
                      $('#res').css('color','red');
                    }
                  },
                  error:function() {
                    //alert("Activo no encontrado modulo mail.")
                    $('#res').html("---- El mensaje se envio al usuario. ----");
                    console.log('Something went wrong', status, 'El mensaje se envio al usuario....' );
                  }
                });
  }
);

//Traer información de regletas
$('#btnconsultar_clientes').click(function(){
  verificar($('#regletas'),'-1');
  $.ajax({
        url:   "consultar_regletas.php",
        dataType:"json",
        type:  'post',
        data:{
         regleta: $('#regletas').val(),
        },
        success:function(datos) {
          $('h5').html('');
           $('#txtnomregleta').attr('disabled','-1')
           $('#txtnomregleta').val(datos['nombre']);
           $('#txtnumpuertos').val(datos['puertos']);
           $("#estado_regleta option[value="+datos['estado']+"]").attr("selected",true);
           $("#cbxregistros option[value="+datos['padre']+"]").attr("selected",true);
           $('#informacion').hide();
           $('#boton').hide();
        },
        error:function() {
            console.log('Something went wrong', status, err );
        }
      });
});



$('#enviar_email_llaves_recibidas').click(
  function ()
  {
     if($('#f_h_recibido').val()=="0000-00-00 00:00:00"){
      alert("Por favor introduce la fecha de recibido");
      return false;
    }
    $.ajax({
                  url     :"llaves-php_enviar_mail_llaves_recibidas.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  nro_cc:nro_cc,
                  descripcion_cc:descripcion_cc,
                  f_h_prestamo:f_h_prestamo,
                  f_h_limite:f_h_limite,
                  f_h_limite:f_h_recibido,
                  cliente:cliente,
                  empresa:empresa,
                  correo:correo,
                  ext_tel:ext_tel,
                  trabajo:trabajo
                  },

                  success:function(data){
                    if(data > 1){
                      $('#res').html("---- El mensaje se envio con exito al usuario. ----");
                      $('#res').css('color','yellow');
                    }
                    else{
                      $('#res').html("Ha ocurrido un error al enviar el mensaje, verifique su conexion a internet.");
                      $('#res').css('color','red');
                    }
                  },
                  error:function() {
                    //alert("Activo no encontrado modulo mail.")
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);