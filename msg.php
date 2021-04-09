<?php
$nombre = $_POST['name'];
$apellido = $_POST['lastname'];
$email = $_POST['email'];
$telefono = $_POST['telephone'];
$pais = $_POST['country'];
$razon = $_POST['reason'];
$empresa = $_POST['mensaje'];

$header = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());



$para = 'info@pescagrosa.com';
$asunto = 'FORMULARIO DE CONTACTO (Posible Cliente)';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location:Contacto.html");
?>
