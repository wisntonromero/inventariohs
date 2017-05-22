$(function(){
	$("#switches,#puertos").attr('disabled',true);
		function ejecutar(obj1,obj2,task)
		{
			/*$('<img/>', {
				'class': 'loading',
				src:'loading.gif',
				'style':'display:inline'
			}).insertAfter(obj1);*/
			 
			$.ajax({
				type:"POST",
				url:"action.php",
				dataType:"html",
				data:"task="+task+"&nro_cc="+$(obj1).val(),
				success:function(msg){
				//$(obj1).next('img').remove();
				$(obj2).html(msg).attr("disabled",false);
				},
				error:function(jqXHR,textStatus,errorThrown){
				$(obg1).next('img').remove();
				alert("Error al ejecutar => "+textStatus+" - "+errorThrown);
				}
			});
		}
		 
		$("#c_cableado").change(function(e)
		{
			$("#puertos,#switches").attr('disabled',true);
			if($(this).val().trim()!=""){
				ejecutar($(this),$("#switches"),"getswitches");
			}
		});

		$("#switches").change(function(e)
		{
			$("#puertos").attr('disabled',true);
			if($(this).val().trim()!=""){
				ejecutar($(this),$("#puertos"),"getpuertos");
			}
		});
});