<?php 

$host = 'mysql3001.mochahost.com';
$user = 'swsangel_root';
$pass = 'Compuexpress06';
$db   = 'swsangel_accounts';

$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$mysqli->set_charset('utf8');

$email      = mysqli_real_escape_string($mysqli, $_POST['email']); 
$name       = mysqli_real_escape_string($mysqli, $_POST['name']); 

use PHPMailer\PHPMailer\PHPMailer;

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
       'verify_peer'       => false,
       'verify_peer_name'  => false,
       'allow_self_signed' => true
   )
);

$mail->Username = USERNAME_EMAIL;
$mail->Password = PASSWORD_EMAIL;

$mail->setFrom(USERNAME_EMAIL, 'Ajedrez Latino');
$mail->addReplyTo(USERNAME_EMAIL, 'Ajedrez Latino');

$mail->addAddress($email, $name);

$mail->Subject = 'Abierto Internacional de Rio Grande';

include 'body.php';

//$body = 'Mensaje de prueba'; // aca voy a hacer el include del body

$mail->msgHTML('<b>'.$body.'</b>');

$mail->AltBody = 'Abierto Internacional de Rio Grande';

sleep(8);

if($mail->send())
   echo json_encode(array('result'=>true, 'email'=>$email, 'name'=>$name));
      else
         echo json_encode(array('result'=>false));



?>