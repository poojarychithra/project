<?php
	//sendmail("aravinda@technopulse.in","Sending mail with settings","IMAP and POP are both ways to read your Gmail messages in other email clients. IMAP can be used across multiple devices. Emails are synced in real time.","Raj kiran");

function sendmail($toaddress,$subject,$message,$name)
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'md-in-82.webhostbox.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'movietime@technopulse.in';                 // SMTP username
	$mail->Password = 'q1w2e3r4/';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	
	$mail->From = 'movietime@technopulse.in';
	$mail->FromName = 'MovieTime';
	$mail->addAddress($toaddress, $name);     // Add a recipient
	$mail->addAddress($toaddress);               // Name is optional
	$mail->addReplyTo('deekshithamin37@gmail.com', 'MovieTime');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	
	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $subject;
	
	if(!$mail->send()) {
		echo '<h1><b>Message could not be sent.</b></h1>';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo '<center><strong><font color=green>Mail sent.</font></strong></center>';
	}
}
?>
  