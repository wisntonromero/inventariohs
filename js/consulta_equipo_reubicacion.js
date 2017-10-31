$(document).ready(function(){
	var tipo;
	var activo=0;
	var responsable=0;


$(document).keydown(function(){
	if(event.keyCode==13 && tipo==1){
		consultar_por_activo();
	}else if(event.keyCode==13 && tipo==3){
		consultar_por_responsable();
	};
});

$(document).keyup(function(){
	if(tipo==1){
		consultar_por_activo();
	}else if(tipo==3){
		consultar_por_responsable();
	};
});

	$('#cbxtipoconsulta').change(function(){
		tipo = $('#cbxtipoconsulta').val();
		if(tipo==1){
			$('#tabla').hide('');
			$('#capa_fecha').hide();
			$('#capa_responsable').hide();
			$('#capa_activo').show('slow');
			limpiarCampos();
			$('#capa_boton').show('slow');
			$('#txtActivo').focus();
		}else if(tipo==2){
			$('#tabla').hide('');
			$('#capa_activo').hide();
			$('#capa_responsable').hide();
			$('#capa_fecha').show('slow');
			limpiarCampos();
			$('#capa_boton').show('slow');
		}else if(tipo==3){
			$('#capa_activo').hide();
			$('#capa_fecha').hide();
			$('#capa_responsable').show('slow');
			$('#txtResponsable').focus();
			limpiarCampos();
			$('#capa_boton').show('slow');
		}else{
			$('#tabla').hide('');
			$('#capa_activo').hide('slow');
			$('#capa_fecha').hide('slow');
			$('#capa_responsable').hide('slow');
			$('#capa_boton').hide('slow');
			limpiarCampos();
		}
	});

	function limpiarCampos(){
		$('#txtActivo').val('');
		$('#txtFecha').val('');
		$('#txtResponsable').val('');
		$('#tabla').html('');
	};

	$('#btnconsultar').click(function(){
		if(tipo=='1' && $('#txtActivo').val()==''){
			limpiarCampos();
			alert('Digite Numero de Activo');
			$('#txtActivo').focus();
		}else if(tipo=='2' && $('#txtFecha').val()==''){
			alert('Digite Fecha');
		}else if(tipo=='3' && $('#txtResponsable').val()==''){
			limpiarCampos();
			alert('Digite Responsable');
			$('#txtResponsable').focus();
		}else if(tipo==1 && $('#txtActivo').val()!='' && $('#txtActivo').val()!=activo){
			consultar_por_activo();
		}else if(tipo==3 && $('#txtResponsable').val()!=''){
			consultar_por_responsable();
		};
	});

	$(".solonum").keypress(function(tecla) {
         if(tecla.charCode < 35 || ((tecla.charCode > 35 && tecla.charCode < 42) || (tecla.charCode > 42 && tecla.charCode < 48)) || tecla.charCode > 57) return false;
       });


	function consultar_por_activo(){
		$.ajax({
	          url     :"consultar_equipo_por_activo_reubicacion.php",
	          dataType:"text",
	          type    :"post",
	          data:{ 
	           activo: $('#txtActivo').val(),
	          },
	          success:function(datos) {
	          	$('#tabla').html(datos);
	          },
	          error:function() {
	            $('#tabla').html('');
	          	alert('No se encontraron resultados');	          }
	        });
	};

	function consultar_por_responsable(){
		$.ajax({
	          url     :"consultar_equipo_por_responsable_reubicacion.php",
	          dataType:"text",
	          type    :"post",
	          data:{ 
	           responsable: $('#txtResponsable').val().toUpperCase(),
	          },
	          success:function(datos) {
	          	$('#tabla').html(datos);
	          },
	          error:function() {
	          	$('#tabla').html('');
	          	alert('No se encontraron resultados');
	          }
	        });
	};

});