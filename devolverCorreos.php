<?php

$host = 'mysql3001.mochahost.com';
$user = 'swsangel_root';
$pass = 'Compuexpress06';
$db =   'swsangel_accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$mysqli->set_charset('utf8');

$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

if($pass != 'colgate123'){
    $res = array('message'=>'Contraseña incorrecta');
}else{ 
// WHERE email NOT IN (SELECT email FROM blacklist)
/* $select = mysqli_query($mysqli, "SELECT id, email, first_name FROM users
 WHERE email NOT IN (SELECT email FROM blacklist) ORDER BY id ASC LIMIT 240");
 */
/* $select = mysqli_query($mysqli, "SELECT id, email, first_name FROM users
 WHERE email NOT IN (SELECT email FROM blacklist) AND email = 'diegorodriguez93@hotmail.com' ORDER BY id ASC LIMIT 90");
 */

$select = mysqli_query($mysqli, "SELECT id, nombre, email FROM spam LIMIT 200,230");

if(mysqli_num_rows($select) > 0){

    while($row = mysqli_fetch_array($select)){

        $name = utf8_decode($row['nombre']);

        $res[] = array('id'=>$row['id'], 'email'=>$row['email'], 'name'=>$name);
    }

}else{

    $res = array();

}

}

//var_dump($res);

//$res[] = array('id'=>1, 'email'=>'latinoajedrez@gmail.com', 'name'=>'Ajedrez Latino');


mysqli_close($mysqli);
echo json_encode($res);


?>