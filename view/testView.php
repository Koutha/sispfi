<?php
date_default_timezone_set("America/Caracas");
$now = time();

echo(date("Y-m-d h:i:sa",$now));
echo '<br>';
$pw = password_hash('1234', PASSWORD_DEFAULT);
echo $pw; 
echo '<br>';
var_dump(password_verify('1234', $pw)); 
echo '<br>';
echo '<br>';
require_once('models/userModel.php');
$userObject = new userClass();
// print_r($userObject->getAll());
foreach ($userObject->getAll() as $key => $value) {
	echo $value['username'];
	echo '<br>';

}

//consultar por año
$año = '2020';
$sql = "select * from novedades where fecha_hecho between ".$año."'-01-01' and timestamp ".$año."'-01-01' + interval '1 year'"
//consultar por mes
$mes = '2020-01-01'
$sql1 ="select * from novedades where date_trunc('month', fecha_hecho) = date_trunc ('month', timestamp '".$mes."')"
echo '<br>';
echo '<br>';
require_once('models/novedadesModel.php');
$novObject = new novedadesClass();
$novObject-> regNovedades();
echo $novObject->getId_novedades();

 ?>


