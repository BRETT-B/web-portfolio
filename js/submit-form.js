$(document).ready(function() {

	$('#submit').click(function(){
		
		var yourname = $('#yourname').val();
		var email = $('#email').val();
		var message = $('#message').val();
		var formData = 'yourname='+yourname+'&email='+email+'&message='+message;

		if (yourname == '' || email == '' || message ==''){
			$('#error-message').html('All fields are required');
		}
		else {
			$('#error-message').html('');
			$.ajax({
				type: 'POST',
				url: 'mail.php',
				data: formData,
				success: function(response){
					$('input[type=text], input[type=email], textarea').val('');
					$('#success-message').fadeIn().html(response);
					setTimeout(function(){
						$('#success-message').fadeOut('slow');
					}, 2000);

				}
			});
		}
		return false;
	});
});