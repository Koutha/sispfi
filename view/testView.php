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
// $novObject-> regNovedades();
$year = '2019-01-01';
$mess = 1; 
var_dump($novObject->totalMesAño($year, $mess));
// echo $novObject->getId_novedades();
echo '<br>';
echo '<br>';
//$totalAño['Enero'] = $novObject->totalMesAño($year, $mess);

for ($i=1; $i <= 12 ; $i++) { 
	$totalAño[$i] = $novObject->totalMesAño($year, $i);
}
  
 $year1 = '2020-01-01';
 $year2 = '2019-01-01';
  for ($i=1; $i <= 12 ; $i++) { 
    $totalYear1[$i] = $novObject->totalMesAño($year1, $i);
    $totalYear2[$i] = $novObject->totalMesAño($year2, $i);
  }
// data: [4215, 5312, 6251, 7841, 9821, 14984, 4215, 5312, 6251, 7841, 9821, 14984],

foreach ($totalYear2 as $key => $value) {
	if (!empty($value['total_kilos'])&&$key!=12) {
		echo $value['total_kilos'].',';
		
	}elseif(!empty($value['total_kilos'])){
		echo $value['total_kilos'];
		
	}elseif($key!=12){
		echo '0,';
		
	}else{
		echo '0';

	}
}



// var_dump($totalYear1);
 ?>


