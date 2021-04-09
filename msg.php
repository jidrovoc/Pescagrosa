<?php 
									if(	isset($_POST["name"])	&&
										isset($_POST["lastname"])  &&
										isset($_POST["email"])  &&										
										isset($_POST["telephone"]) &&
										isset($_POST['country']) &&
										isset($_POST['reason']) &&
										isset($_POST['mensaje'])) {
										
										$values = array_map('trim', $_POST);
										$values = array_map('strip_tags', $_POST);	
										extract($values);					
										
										// send email to administrator (standard)
										
										$mail = new PHPMailer;
										$mail->setFrom('jidrovoc@unemi.edu.ec', 'PESCAGROSA');
										$mail->addReplyTo('jidrovoc@unemi.edu.ec', 'PESCAGROSA');
										$mail->addAddress('jidrovoc@unemi.edu.ec', 'PESCAGROSA');
										$mail->Subject = 'FORMULARIO DE CONTACTO (Posible Cliente)';
										$mail->CharSet = 'UTF-8';
										$mail->Body = "Nombre del usuario: $name $lastname | Email del usuario: $email | Teléfono: $telephone | País: $country | Motivo de contacto: $reason | Mensaje del usuario: $mensaje";
										if (!$mail->send()) {
										    // echo "Mailer Error: " . $mail->ErrorInfo;
										} else {
										    // echo "Message sent!";
										}
									
										// send email to client (mailgun)
										
										$mgClient = new Mailgun('key-91aab53a40d85511deb96cac75014ad2');
										$domain = "pescagrosa.com";
										
										try {
											$result2 = $mgClient->sendMessage($domain, array(
											    "from"    => "PESCAGROSA <jidrovoc@unemi.edu.ec>",
											    "to"      => " <$email>",
											    "subject" => "CONTACTO",
											    "text"    => "Hola $name $lastname! Gracias por tu interés. Muy pronto uno de nuestros representantes se pondrá en contacto contigo!"
											));
											header("Location:./contacto.html");
											?>
