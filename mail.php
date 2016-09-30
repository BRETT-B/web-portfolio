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
    $body = "From: $yourname\nE-Mail: $email\nMessage: $message";

    if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
          echo '<h2>In order for me to prevent spammers, I require a confirmed captcha. Thanks you!</h2>';
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

?>