<?php 

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['msj'])){

require 'vendor/autoload.php';
require 'config.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->CharSet = 'UTF-8';
$mail->Port = '587';
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
   'ssl' => array(
       'verify_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true
   )
);

$mail->Username = USERNAME_EMAIL;
$mail->Password = PASSWORD_EMAIL;

$mail->setFrom(USERNAME_EMAIL, 'JuanPerez');
$mail->addReplyTo(USERNAME_EMAIL, 'JuanPerez');

$mail->addAddress(DESTINATION_EMAIL, DESTINATION_USER_NAME);

$mail->Subject = 'Prueba';

$msj=$_POST['msj'];

$mail->msgHTML('<b>'.$msj.'</b>');
$mail->AltBody = 'Mensaje desde el formulario';

if($mail->send())
   echo json_encode(array('result'=>true));
      else
         echo json_encode(array('result'=>false));

}



?>