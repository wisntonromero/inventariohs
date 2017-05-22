
$(function(){
	
	// Function for load the grid
	function LoadGrid() {
		var gridder = $('#as_gridder');
		var UrlToPass = 'action=load';
		gridder.html('loading..');
		$.ajax({
			url : 'ajax.php',
			type : 'POST',
			data : UrlToPass,
			success: function(responseText) {
				gridder.html(responseText);
			}
		});
	}
	
	// Seperate Function for datepiker() to save the value
	function ForDatePiker(ThisElement) {
		ThisElement.prev('span').html(ThisElement.val()).prop('title', ThisElement.val());
		var UrlToPass = 'action=update&value='+ThisElement.val()+'&crypto='+ThisElement.prop('name');
		$.ajax({
			url : 'ajax.php',
			type : 'POST',
			data : UrlToPass
		});
	}
	
	LoadGrid(); // Load the grid on page loads
	
	
	// Execute datepiker() for date fields
	$("body").delegate("input[type=text].datepicker", "focusin", function(){
		var ThisElement = $(this);
		$(this).datepicker({
	   		dateFormat: 'yy/mm/dd',
			onSelect: function() {
				setTimeout(ForDatePiker(ThisElement), 500);
			}
	   });
	});
	
	// Show the text box on click
	$('body').delegate('.editable', 'click', function(){
		var ThisElement = $(this);
		ThisElement.find('span').hide();
		ThisElement.find('.gridder_input').show().focus();
	});
	
	// Pass and save the textbox values on blur function
	$('body').delegate('.gridder_input', 'blur', function(){
		var ThisElement = $(this);
		ThisElement.hide();
		ThisElement.prev('span').show().html($(this).val()).prop('title', $(this).val());
		var UrlToPass = 'action=update&value='+ThisElement.val()+'&crypto='+ThisElement.prop('name');
		if(ThisElement.hasClass('datepicker')) {
			return false;
		}
		$.ajax({
			url : 'ajax.php',
			type : 'POST',
			data : UrlToPass
		});
	});
	
	// Same as the above blur() when user hits the 'Enter' key
	$('body').delegate('.gridder_input', 'keypress', function(e){
		if(e.keyCode == '13') {
			var ThisElement = $(this);
			ThisElement.hide();
			ThisElement.prev('span').show().html($(this).val()).prop('title', $(this).val());
			var UrlToPass = 'action=update&value='+ThisElement.val()+'&crypto='+ThisElement.prop('name');
			if(ThisElement.hasClass('datepicker')) {
				return false;
			}
			$.ajax({
				url : 'ajax.php',
				type : 'POST',
				data : UrlToPass
			});
		}
	});
	
	// Function for delete the record
	$('body').delegate('.gridder_delete', 'click', function(){
		var conf = confirm('Are you sure want to delete this record?');
		if(!conf) {
			return false;
		}
		var ThisElement = $(this);
		var UrlToPass = 'action=delete&value='+ThisElement.attr('href');
		$.ajax({
			url : 'ajax.php',
			type : 'POST',
			data : UrlToPass,
			success: function() {
				LoadGrid();
			}
		});
		return false;
	});
	
	
	// Add new record
	
	// Add new record when the table is empty
	$('body').delegate('.gridder_insert', 'click', function(){
		$('#norecords').hide();
		$('#addnew').slideDown();
		return false;
	});
	
	
	// Add new record when the table in non-empty
	$('body').delegate('.gridder_addnew', 'click', function(){
		$('html, body').animate({ scrollTop: $('.as_gridder').offset().top}, 250); // Scroll to top gridder table
		$('#addnew').slideDown();
		return false;
	});

	// Send e-mail 
	$('body').delegate('.gridder_send_email', 'click', function(){
		//$('html, body').animate({ scrollTop: $('.as_gridder').offset().top}, 250); // Scroll to top gridder table
	//	$('#addnew').slideDown();
		$.ajax({
			url : 'llaves-php_enviar_mail_llaves_recibidas.php',
			type : 'POST',
			data : data,
			success: function() {
				LoadGrid();
			}
		});
		return false;
	});
	
	// Cancel the insertion
	$('body').delegate('.gridder_cancel', 'click', function(){
		LoadGrid()
		return false;
	});
	
	// For datepiker
	$("body").delegate(".gridder_add.datepiker", "focusin", function(){
		var ThisElement = $(this);
		$(this).datepicker({
	   		dateFormat: 'yy/mm/dd'
	   });
	});
	
	// Pass the values to ajax page to add the values
	$('body').delegate('#gridder_addrecord', 'click', function(){
		
		// Do insert vaidation here
		if($('#fname').val() == '') {
			$('#fname').focus();
			alert('Enter the First Name');
			return false;
		}
		if($('#lname').val() == '') {
			$('#lname').focus();
			alert('Enter the Last Name');
			return false;
		}
		if($('#age').val() == '') {
			$('#age').focus();
			alert('Enter the Age');
			return false;
		}
		if($('#profession').val() == '') {
			$('#profession').focus();
			alert('Select the Profession');
			return false;
		}
		if($('#date').val() == '') {
			$('#date').focus();
			alert('Select the Date');
			return false;
		}
		
		// Pass the form data to the ajax page
		var data = $('#gridder_addform').serialize();
		$.ajax({
			url : 'ajax.php',
			type : 'POST',
			data : data,
			success: function() {
				LoadGrid();
			}
		});
		return false;
	});
	
});

