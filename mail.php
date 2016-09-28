<?php
      
      header('Access-Control-Allow-Origin: *');

      header('Access-Control-Allow-Methods: GET, POST');

      header("Access-Control-Allow-Headers: X-Requested-With");
      
      


print_r(json_encode($_POST));
exit;

      require_once('/usr/share/php/libphp-phpmailer/class.phpmailer.php');
      $mail = new PHPMailer(); // defaults to using php "mail()"
      $mail->AddReplyTo($_POST['fullName']); //Form var must be 'fullName'
      $mail->SetFrom($_POST['email']); //form var must be email
      $mail->AddAddress("burdickbrett@gmail.com");
      $mail->Subject    = "PORTFOLIO CONTACT FROM - ". $_POST['fullName'];
      $mail->MsgHTML($_POST['body']); //var must be the textarea from your form
      if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
            echo "Message sent!";
      }
      
      // header('location: /#contact');

?>