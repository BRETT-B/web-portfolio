$(document).ready(function() {

	$('form.contact').on('submit', function(event){
		event.preventDefault();
		var yourname = $('#yourname').val();
		var email = $('#email').val();
		var message = $('#message').val();

		if (yourname == '' || email == '' || message ==''){
			$('#error-message').html('All fields are required');
		}
		else {
			$('#error-message').html('');
			$.ajax({
				url: '/mail.php',
				type: 'POST',
				data: {yourname:yourname, email:email, message:message},
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