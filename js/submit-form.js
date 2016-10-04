$(document).ready(function() {
	// whoosh sound when email is sent
	var mailSound = document.getElementById('mailSound');
		mailSound.src = '../sounds/mailsent.wav';
	// send form data to php script with AJAX
	$('#submit').click(function(event){
		event.preventDefault();
		var yourname = $('#yourname').val();
		var email = $('#email').val();
		var message = $('#message').val();
		var formData = {yourname: yourname, email: email, message: message};

		if (yourname == '' || email == '' || message ==''){
			$('#error-message').html('All fields are required');
		}
		else {
			$('#error-message').html('');
			$.ajax({
				type: 'POST',
				url: '../mail.php',
				data: formData,
				success: function(response){
					$('input[type=text], input[type=email], textarea').val('');
					// if (typeof $('.g-recaptcha') != 'undefined') {
					// 	grecaptcha.reset();
					// }
					$('#success-message').fadeIn().html(response);
					setTimeout(function(){
						$('#success-message').fadeOut('slow');
					}, 3000);

				}
			});
			mailSound.play();
		}
		return false;
	});
});