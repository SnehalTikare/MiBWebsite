<?php

date_default_timezone_set('Etc/UTC');
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
require 'phpmailer/class.smtp.php';//Tip: Put the whole phpmailer folder as is in root directory, you can get it on github
//Fetch Data
$from = $_POST['name'];
$email = $_POST['email'];
$mess = $_POST['message'];
$subject = $_POST['subject'];


$mail = new PHPMailer;
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  			  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'makeinbvbwebsite@gmail.com';                 // SMTP username
$mail->Password = 'nitin@mib';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to//IMP: if TLS is not selected, port becomes 465
$mail->From = 'makeinbvbwebsite@gmail.com';
$mail->FromName = 'MIB Contact Service';
$mail->addAddress('makeinbvbwebsite@gmail.com');  //put directors email id here
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'A user sent you a new message';
$mail->Body = 'From: '.$from.'<br><br>Subject: '.$subject.'<br><br>'.$mess."<br><br> Sender's email: ".$email;			
if($mail->send()) 
{
	echo "<center><br><br><br><br><br><strong><p style='font-size:26px'><i class='fa fa-check-square-o' style='background-color:green; color:white'></i> Your message has been successfully sent.</p></strong></center>";
	//use header("location: mail_sent.html"); if you wish to redirect to a page
} 
else 
{
    echo "<center><i class='fa fa-exclamation-triangle' style='color:red'></i>There was an error while sending your message. Please try again later.</center>";
	
}

?>