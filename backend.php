<?php


function get_link(){
	$addr = " https://codebagnation.slack.com/shared_invite/MTcwODY3OTM3NTA4LTE0OTI1MzA3MjktNjRjNjViZDVhOQ";
	return $addr;
}
function send_invite($to_id, $his_name){
	
	
	require 'PHPMailer-master/PHPMailerAutoload.php';
	//Create a new PHPMailer instance
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'codebagnation@gmail.com';                 // SMTP username
	$mail->Password = 'C0debags';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('codebagnation@gmail.com', 'Codebags');
	
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

	
	$mail->addAddress($to_id, $his_name);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('codebagnation@gmail.com', 'Codebags');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$message = "Please follow this link to join Codebags school slack channel \n\n   <a href = ".get_link().">join us </a>";
	$mail->Subject = 'Join Our Slack Channel';
	$mail->Body    = $message;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}

}

	

$new_name = $_POST['name'];
$new_email = $_POST['email'];
//send_invite($new_email, $new_name)

try{
	send_invite($new_email, $new_name);
	print("Email has been sent");
}catch ( PDOException $ex) {
		echo $ex;
	}




//send_invite("tolufakiyesi@yahoo.com", "Tolu Fakiyesi");
?>