$(document).ready(function() {
	$('#submit').click(function(){
		var yourname = $('#yourname').val();
		var email = $('#email').val();
		var message = $('#message').val();

		if (yourname == '' || email == '' || message = ''){
			$('#error-message').html('All fields are required');
		}
		else {
			$('#error-message').html('');
			$.ajax({
				url: 'http://www.brettburdick.com/mail.php',
				type: 'POST',
				data: {yourname:yourname, email:email, message:message},
				success: function(data){
					$('form').trigger('reset');
					$('#success-message').fadeIn().html(data);
					setTimeout(function({
						$('#success-message').fadeOut('slow');
					}, 2000);

				}
			});
		}
		return false;
	});
});