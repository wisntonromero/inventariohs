$('#consultar_cliente').click(
  function ()
  {
     if($('#correo').val()==""){
      alert("Por favor introduce el correo del cliente");
      return false;
    }
    $.ajax({
          url     :"cliente-php_consultar_cliente.php",
          dataType:"json",
          type    :'post',
          data:{ 
          correo: $('#correo').val(),
          },
      success:function (data) {
        
        $('#id').val( data['id'] );
        $('#empresa').val( data['empresa'] );
        $('#departamento').val( data['departamento'] );
        $('#cargo').val( data['cargo'] );
        $('#cliente').val( data['cliente'] );
        $('#ext_tel').val( data['ext_tel'] );
        
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


$('#seleccionar_cliente').change(
  function ()
  {
    $.ajax({
          url     :"cliente-php_seleccionar_cliente.php",
          dataType:"json",
          type    :'post',
          data:{ 
          id: $('#seleccionar_cliente').val(),
          },
      success:function (data) {
        
        $('#correo').val( data['correo'] );
        $('#empresa').val( data['empresa'] );
        $('#departamento').val( data['departamento'] );
        $('#cargo').val( data['cargo'] );
        $('#cliente').val( data['cliente'] );
        $('#ext_tel').val( data['ext_tel'] );
        
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

$('#ingresar_cliente').click(
  function()
  {
    if($('#correo').val()==""){
      alert("Introduce un correo electronico valido");
      return false;
    }
    else{
      var correo = $('#correo').val();
    }
    if($('#empresa').val()==""){
      alert("Introduce la empresa donde trabaja el cliente.");
      return false;
    }
    else{
      var empresa = $('#empresa').val();
    }
    if($('#departamento').val()==""){
      alert("Introduce departamento al que pertenece el cliente");
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }
    if($('#cargo').val()==""){
      alert("Introduce el cargo del cliente");
      return false;
    }
    else{
      var cargo = $('#cargo').val();
    }
    if($('#cliente').val()==""){
      alert("Introduce nombre del cliente");
      return false;
    }
    else{
      var cliente = $('#cliente').val();
    }
    if($('#ext_tel').val()==""){
      alert("Introduce la ext telefonica del cliente");
      return false;
    }
    else{
      var ext_tel = $('#ext_tel').val();
    }
        $.ajax({
          url     :"cliente-php_ingresar_cliente.php",
          dataType:"json",
          type    :'post',
          data:{ 
            correo:correo,
            empresa:empresa,
            departamento:departamento,
            cargo:cargo,
            cliente:cliente,
            ext_tel:ext_tel
          },
          success:function(data) { 
            if(data = 1){
              $('#res').html("---- Cliente ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Cliente no encontrado.")
            console.log('Something went wrong', status, 'Cliente no encontrado.' ); 
          }
        });
  }
);

$('#modificar_cliente').click(
  function()
  { 

        $.ajax({
          url     :"cliente-php_modificar_cliente.php",
          dataType:"json",
          type    :'post',
          data:{ 
            correo:$('#correo').val(),
            empresa:$('#empresa').val(),
            departamento:$('#departamento').val(),
            cargo:$('#cargo').val(),
            cliente:$('#cliente').val(),
            ext_tel:$('#ext_tel').val()
          },
          success:function(data) { 
            if(data = 1){
              $('#res').html("Cliente modificado en el sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Cliente no encontrado.")
            console.log('Something went wrong', status, 'Cliente no encontrado.' ); 
          }
        });
  }
);

