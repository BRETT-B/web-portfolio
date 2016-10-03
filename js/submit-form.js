$(document).ready(function() {

	$('#submit').click(function(){
		
		var yourname = $('#yourname').val();
		var email = $('#email').val();
		var message = $('#message').val();

		if (yourname == '' || email == '' || message ==''){
			$('#error-message').html('All fields are required');
		}
		else {
			$('#error-message').html('');
			$.ajax({
				type: 'POST',
				url: 'mail.php',
				data: {
					yourname: yourname,
					email: email,
					message: message
				},
				success: function(response){
					console.log('Error:'+response)
					$('input[type=text], input[type=email], textarea').val('');
					$('#success-message').fadeIn().html(response);
					setTimeout(function(){
						$('#success-message').fadeOut('slow');
					}, 2000);

				}, error: function(error){
					console.log(error);
					alert("Post error");
				}
			});
		}
		return false;
	});
});