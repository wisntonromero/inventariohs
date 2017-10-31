$(document).ready(function(){
	$('#ajax').submit(function(e){
		var form = $(this),
			url = form.attr('action'),
			type = form.attr('method'),
			data = form.serializeArray();

			$.ajax({
				url: url,
				type: type,
				data: data,
				success: function(response){
					$('#tabla').html(response);
				}
			});
		
		e.preventDefault();
	})

	$(".solonum").keypress(function(tecla) {
     if(tecla.charCode < 13 ||(tecla.charCode > 13 && tecla.charCode < 35) || ((tecla.charCode > 35 && tecla.charCode < 42) || (tecla.charCode > 42 && tecla.charCode < 48)) || tecla.charCode > 57) return false;
   });

	$(".restringir").keydown(function(e) {
	    if(event.shiftKey){e.preventDefault();}
	    if($(".restringir").val().length > 8) {
	      if(e.keyCode!=8 && e.keyCode!=13){
	        e.preventDefault();
	      }
	    };
  	});

})