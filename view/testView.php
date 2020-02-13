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
$sql = "select * from novedades where fecha_hecho between ".$año."'-01-01' and timestamp ".$año."'-01-01' + interval '1 year'";

//consultar robos por año
$sql2 = "SELECT * FROM robo_cerdo rc 
			JOIN 
			(SELECT * FROM novedades 
				WHERE fecha_hecho 
					BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nv 
			ON rc.id_novedades = nv.id_novedades";

//total de animales robados y total de kilos por año
$sql3 = "SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc 
			JOIN 
			(SELECT * FROM novedades 
				WHERE fecha_hecho 
					BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nv 
			ON rc.id_novedades = nv.id_novedades";

//total de animales y kilos por mes 1-12 -- EXTRACT(MONTH FROM fecha_hecho) = 1 -- de un año dado 
$sql4="SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc
JOIN (select * from (SELECT * FROM novedades 
WHERE fecha_hecho 
BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nov_año
WHERE EXTRACT(MONTH FROM fecha_hecho) = 1) nov_mes ON rc.id_novedades = nov_mes.id_novedades";

//consultar por mes
$mes = '2020-01-01';
//select * from novedades where date_trunc('month', fecha_hecho) = date_trunc ('month', timestamp '2020-01-01')
$sql1 ="select * from novedades where date_trunc('month', fecha_hecho) = date_trunc ('month', timestamp '".$mes."')";

echo '<br>';
echo '<br>';
require_once('models/novedadesModel.php');
$novObject = new novedadesClass();
$novObject-> regNovedades();
$year = '2020-01-01';
$year1 = '2020-01-01';
$mess = 1; 
var_dump($novObject->totalMesAño($year, $year1, $mess));
// echo $novObject->getId_novedades();

 ?>


