<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require 'vendor/autoload.php';
include 'User.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

        //Common
    //$mail_to=$_POST['mail_to'];
   // $mail_sub=$_POST['mail_sub'];
   // $mail_msg=$_POST['mail_msg'];
    $mail_to = $em;
	$mail_sub = "Account create Sucessfully";
	$mail_msg = $namel." !welcome to Chefedu";
    $message = '';
	$message .= 'From : Chefedu...<br>';
	$message .= 'Email Id : '. $mail_to."<br>";
	$message .= 'Subject : '. $mail_sub."<br>";
    $message .= 'Message : '. $mail_msg."<br>";
   
   
    $to = 'questchefedu@gmail.com'; 
    $from = 'AICE'.' '.'$mail_to';
    $headers = '';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From:'. $from ."\r\n";  
    $headers .= 'Reply-to :'. $mail_to . "\r\n";
   
    //$headers .= 'Cc: sales <sales@marketingmindz.com> ';
  
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers.="X-Priority: 3";
    $headers .= 'X-Mailer: smail-PHP '.phpversion();
   
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; //465
    //$mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = ssl;  
    $mail->Username = 'questchefedu@gmail.com';  // email id
    $mail->Password = 'Admin_quest_@123';					// email id password
    $mail->setFrom('questchefedu@gmail.com', 'Chefedu..'); //email id
    $mail->addAddress($mail_to);
    //$mail->addAddress('google.dm@anandice.ac.in');
    //$mail->addAddress('sales@marketingmindz.com');
    //$mail->addAddress('developer.marketingmindz@gmail.com');
    $mail->Subject = $mail_sub;
    $mail->addCustomHeader($headers);
    $mail->isHTML(true);
    $mail->Body = $message;
       
         //$success = mail( $to, $subject, $message, $headers, "-f abhijeet@marketingmindz.in");
        
     if(!$mail->send())
    {
    
        echo "<script>window.location.href='index.html';

        alert('Query submitted successfully');</script>";

    }
    else
    {

        echo "<script>window.location.href='index.html';

        alert('Query submitted successfully');</script>";

    }



} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
