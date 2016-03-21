<?php

	//instancio un objeto de la clase PHPMailer
    $nombre=$_REQUEST["name"];
    $telefono=$_REQUEST["subject_"];	
    $email=$_REQUEST["email"];
    $comentarios = $_REQUEST["message"];
    
	$body="";
	$body.="<table width='100%' style='font-weight: bold; font-size: 16px;'>";	
	$body.="<tr valign='top'>
				<td align='right'>Nombre:</td>
				<td align='left'>$nombre</td>
			</tr>";	
	$body.="<tr valign='top'>
				<td align='right'>E-mail:</td>
				<td align='left'>$email</td>
			</tr>";	
	$body.="<tr valign='top'>
		<td align='right'>Comentarios:</td>
		<td align='left'>$comentarios</td>
	</tr>";
	$body.="</table>";			

	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.dewebnet.com';  // Specify main and backup SMTP servers
	$mail->Port       = 26;   // set the SMTP port for the GMAIL server
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'ismaeljdz@dewebnet.com';                 // SMTP username
	$mail->Password = 'insane7_';                           // SMTP password
	//$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
	$mail->CharSet = 'UTF-8';
	$mail->From = 'no-reply@ewebnet.com';
	$mail->FromName = $nombre;
	/*$mail->addAddress('jhernandez@consultoriaintegra.com.mx','jhernandez@consultoriaintegra.com.mx');     // Add a recipient
	$mail->addAddress('ldiaz@consultoriaintegra.com.mx','ldiaz@consultoriaintegra.com.mx');     // Add a recipient
	$mail->addAddress('jozher57@gmail.com','ldiaz@consultoriaintegra.com.mx');*/
	//$mail->addAddress('operaciones@gruposecom.com','operaciones');
	$mail->addAddress('ismael_br7@hotmail.com','administracion');     // Add a recipient
	//$mail->addAddress('erickexpress@hotmail.com','administracion');     // Add a recipient
	
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = "Formulario de contacto [$email]";
	$mail->Body    = $body;
		
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
?>