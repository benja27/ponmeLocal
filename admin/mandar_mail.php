<?php

if( isset($_SERVER['HTTPS'] ) ) 
{
	$linktotal = "https://".$_SERVER['HTTP_HOST'];
}
else
{
	$linktotal = "http://".$_SERVER['HTTP_HOST'];
}

$maill = $_POST['mail-local'];
$nombre = $_POST['nombre-local'];
$tipol = $_POST['tipo-local'];
$envios = $_POST['envios'];
$horaa = $_POST['hora-abrir'];
$horac = $_POST['hora-cerrar'];
$ciudad = $_POST['ciudad-local'];
$delegacion = $_POST['delegacion-local'];
$colonia = $_POST['colonia-local'];
$calle = $_POST['calle-local'];
$numerol = $_POST['numero-local'];
$telefono = $_POST['telefono-local'];
$whatsapp = $_POST['whatsapp-local'];

$diasa = "";
$direccionl = "";

if($_POST['dia_lunes'] == true)
{
	$diasa .= "Lunes ";
}
if($_POST['dia_martes'] == true)
{
	$diasa .= "Martes ";
}
if($_POST['dia_miercoles'] == true)
{
	$diasa .= "Miercoles ";
}
if($_POST['dia_jueves'] == true)
{
	$diasa .= "Jueves ";
}
if($_POST['dia_viernes'] == true)
{
	$diasa .= "Viernes ";
}
if($_POST['dia_sabado'] == true)
{
	$diasa .= "Sabado ";
}
if($_POST['dia_domingo'] == true)
{
	$diasa .= "Domingo ";
}


// =============================================

$sql = "INSERT INTO localito (id, tipo, nombre, classy, dias, abierto, cerrado, calle, numedi, colonia, delegacion, ciudad, copos, telefono, envios, palclaves, facedi, instadi, googlem, googleb, dweb, menud) VALUES ('$idesma', '$tipodedisplay', '$nombrelo', '$claselo', '$dias', '$abierto', '$cerrado', '$callelo', '$numelo', '$colonialo', '$delegacionlo', '$ciudadlo', '$coposlo', '$tello', '$envio', '$palclo', '$facelo', '$instalo', '$maplo', '0', '$paginalo', '$menulo')";
				mysqli_query($dbc, $sql);


// =============================================

$subject = 'PonmeLocal Nuevo usuario: '.$nombre;
$subject= utf8_decode($subject);


$header = "From: PONMELOCAL <hola@ponmelocal.com>\r\n"; 
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$header.= "X-Priority: 1\r\n"; 
$msg = '<html><body style="background-color: #fff;">';
$msg .= '<center>';
$msg .= '<table style="width:100%;" align="center">';
$msg .= '<tr><td><br></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Mail: '.$maill.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Nombre Local: '.$nombre.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Tipo: '.$tipol.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Envia: '.$envios.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">horario: '.$horaa.' a '.$horac.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">'.$diasa.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Direccion: '.$ciudad.' '.$delegacion.' '.$colonia.' '.$calle.' '.$numerol.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Telefono: '.$telefono.'</h1></td></tr>';
$msg .= '<tr><td style="padding-left:60px;padding-right:60px;"><h1 style="font-size:16px;text-align: center;color:#000;font-weight: 400;">Whatsapp: '.$whatsapp.'</h1></td></tr>';
$msg .= '<tr><td><br></td></tr>';
$msg .= '</table>';
$msg .= '</center>';
$msg .= '</body></html>';

$msg= utf8_decode($msg);


$msg = wordwrap($msg,70);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
try {
			$mail->SMTPDebug = 0;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'ponmelocal.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'hola@ponmelocal.com';                     // SMTP username
		    $mail->Password   = 'ponmelocaleslomejor';                               // SMTP password
		    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
		    $mail->Port       = 465;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('hola@ponmelocal.com', 'PONMELOCAL');
		    $mail->addAddress("cac852@hotmail.com");

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $msg;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}


echo "<script>window.location.href='".$linktotal."/bienvenida';</script>";
exit; 
?>
