<?php

    $yourname;  
    $email;
    $message;
    $from;
    $to;
    $subject;
    $body;
    $captcha;

    if(isset($_POST['yourname'])){
          $yourname=$_POST['yourname'];
    }
    if(isset($_POST['email'])){
          $email=$_POST['email'];
    }
    if(isset($_POST['message'])){
          $message=$_POST['message'];
    }
    $from = 'From: burdickbrett.com'; 
    $to = 'burdickbrett@gmail.com'; 
    $subject = 'Email Inquiry from Web Portfolio';
    $body = "From: $yourname\nE-Mail: $email\nMessage:\n $message";

    if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
          echo '<h2>Please check the captcha form.</h2>';
          exit;
    }
    $secretKey = "6LfT7gcUAAAAAHIemAOFDIyeKcqppQ7G-y8Acn3p";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);

    if ($_POST['submit']) {
          if (mail ($to, $subject, $body, $from)) { 
              echo '<p>Thank you for your email!</p>';
          } else { 
              echo '<p>Oops! An error occurred. Try sending your message again.</p>'; 
          }
      }









      // header('Access-Control-Allow-Origin: *');
      // header('Access-Control-Allow-Methods: GET, POST');
      // header("Access-Control-Allow-Headers: X-Requested-With");
      // print_r(json_encode($_POST));
      // exit;
      // require_once('/usr/share/php/libphp-phpmailer/class.phpmailer.php');
      // $mail = new PHPMailer(); // defaults to using php "mail()"
      // $mail->AddReplyTo($_POST['fullName']); //Form var must be 'fullName'
      // $mail->SetFrom($_POST['email']); //form var must be email
      // $mail->AddAddress("burdickbrett@gmail.com");
      // $mail->Subject= "PORTFOLIO CONTACT FROM - ". $_POST['fullName'];
      // $mail->MsgHTML($_POST['body']); //var must be the textarea from your form
      // if(!$mail->Send()) {
      // echo "Mailer Error: " . $mail->ErrorInfo;
      // } else {
      // echo "Message sent!";
      // }
   
      



?>