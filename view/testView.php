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

////total de animales robados y total de kilos
$sql3 = "SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc 
			JOIN 
			(SELECT * FROM novedades 
				WHERE fecha_hecho 
					BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nv 
			ON rc.id_novedades = nv.id_novedades";

//total de animales robados y total de kilos por año por granjas
$sql69 = "SELECT sum(rc.cantidad) as total_cerdos , sum(rc.kilos) as total_kilos, lugar  FROM robo_cerdo rc 
JOIN (SELECT * FROM novedades WHERE fecha_hecho BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nv 
ON rc.id_novedades = nv.id_novedades GROUP BY nv.lugar";

//total de animales robados y total de kilos por año por seccion
$sqlSeccion = "SELECT sum(rc.cantidad) as total_cerdos , sum(rc.kilos) as total_kilos, rc.seccion  FROM robo_cerdo rc 
JOIN (SELECT * FROM novedades WHERE fecha_hecho BETWEEN '2020-01-01' AND timestamp '2020-01-01' + interval '1 year') nv 
ON rc.id_novedades = nv.id_novedades GROUP BY rc.seccion";

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
echo '<br>';
echo '<br>';
echo 'total granjas por año <br>';
var_dump($totalGranja1 = $novObject->totalAñoGranjas($year1)); 

echo '<br>';
echo '<br>';
$totalAñoGranjas = $novObject->totalAñoGranjas($year1); 
$valGranjas = Array("CEAPOCA"=>"0,",
					"LA PARREÑA"=>"0,",
					"LOS CERRITOS 1"=>"0,",
					"LOS CERRITOS 2"=>"0,",
					"MATACARMELERA"=>"0,",
					"OJO DE AGUA"=>"0,",
					"URIMAN 1"=>"0,",
					"URIMAN 2"=>"0,",
					"VILLA DE JULIA"=>"0");
print_r($valGranjas);
echo '<br>';
echo '<br>';
for ($i=0; $i < 9 ; $i++) { 
	if (isset($totalAñoGranjas[$i])) {
		switch ($totalAñoGranjas[$i]['lugar']) {
			case 'CEAPOCA':
				$valGranjas['CEAPOCA']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'LA PARREÑA':
				$valGranjas['CEAPOCA']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'LOS CERRITOS 1':
				$valGranjas['LOS CERRITOS 1']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'LOS CERRITOS 2':
				$valGranjas['LOS CERRITOS 2']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'MATACARMELERA':
				$valGranjas['MATACARMELERA']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'OJO DE AGUA':
				$valGranjas['OJO DE AGUA']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'URIMAN 1':
				$valGranjas['URIMAN 1']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'URIMAN 2':
				$valGranjas['URIMAN 2']=$totalAñoGranjas[$i]['total_kilos'].','; 
				break;
			case 'VILLA DE JULIA':
				$valGranjas['VILLA DE JULIA']=$totalAñoGranjas[$i]['total_kilos']; 
				break;
			default:
				echo '0,';
				break;
		}
	}
}
print_r($valGranjas);
echo '<br>';
foreach ($valGranjas as $key => $value) {
	echo $value;
}
echo '<br>';
echo 'kilos y cantidad';
echo '<br>';
$valGranjas1 = Array(
				array("lugar"=>"CEAPOCA","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"LA PARREÑA","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"LOS CERRITOS 1","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"LOS CERRITOS 2","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"MATACARMELERA","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"OJO DE AGUA","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"URIMAN 1","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"URIMAN 2","kilos"=>"0,", "cantidad"=>"0,"),
				array("lugar"=>"VILLA DE JULIA","kilos"=>"0", "cantidad"=>"0")
			);
print_r($valGranjas1);
echo '<br>';
echo '<br>';
foreach ($valGranjas1 as $key => $value) {
	
	echo $value['kilos'];


}
echo '<br>';
echo '<br>';
foreach ($totalAñoGranjas as $key => $value) {
	switch ($value['lugar']) {
		case 'CEAPOCA':
			echo $value['total_kilos'].','; 
			break;
		case 'LA PARREÑA':
			echo $value['total_kilos'].','; 
			break;
		case 'LOS CERRITOS 1':
			echo $value['total_kilos'].','; 
			break;
		case 'LOS CERRITOS 2':
			echo $value['total_kilos'].','; 
			break;
		case 'MATACARMELERA':
			echo $value['total_kilos'].','; 
			break;
		case 'OJO DE AGUA':
			echo $value['total_kilos'].','; 
			break;
		case 'URIMAN 1':
			echo $value['total_kilos'].','; 
			break;
		case 'URIMAN 2':
			echo $value['total_kilos'].','; 
			break;
		case 'VILLA DE JULIA':
			echo $value['total_kilos'].','; 
			break;
		default:
			echo '0,';
			break;
	}
}
// var_dump($totalYear1);
echo '<br><br>';
print_r($novObject->getBy('28'));
echo '<br><br>';
$nov1 = $novObject->getBy('28');
foreach ($nov1 as $key => $value) {
	echo $value['seccion'].', ';
	echo 'cantidad: '.$value['cantidad'].', ';
	echo 'kilos: '.$value['kilos'];
	echo '<br>';
}

echo '<br><br>';
echo 'datos filtrados';
echo '<br><br>';


setlocale(LC_ALL, "ES"); //sirve para cambiar el idioma en el script para las funciones de time()

$start    = (new DateTime('2019/01/01'))->modify('first day of this month');
$end      = (new DateTime('2019/12/01'))->modify('first day of next month');
$interval = DateInterval::createFromDateString('1 month');
$period   = new DatePeriod($start, $interval, $end);

foreach ($period as $dt) {
    // echo $dt->format("Y- F") . "<br>\n";
    echo $formatted_time = strftime("%B - %m - %Y", $dt->getTimestamp()). "<br>\n";

}


//consultas para graficas filtradasa
$fechaInicio = "01/01/2019";
$fechaFin = "01/02/2019";
//POR FECHA PASADA POR PARAMETRO Y POR GRANJA 
$fsql = "SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc
JOIN (SELECT * FROM (	SELECT * FROM novedades 
						WHERE fecha_hecho BETWEEN '01/01/2019' AND timestamp '01/02/2019' AND lugar = 'CEAPOCA'
					) nov_año
		WHERE EXTRACT(MONTH FROM fecha_hecho) = '1') nov_mes ON rc.id_novedades = nov_mes.id_novedades";

//parametros fecha inicio - fecha fin - mes y año - nombre de granja
$fsql1 = "SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc
JOIN (select * from (SELECT * FROM novedades WHERE fecha_hecho BETWEEN '01/01/2019' AND timestamp '01/03/2020' AND lugar = 'CEAPOCA') nov_año
WHERE EXTRACT(MONTH FROM fecha_hecho) = '1' AND EXTRACT(YEAR FROM fecha_hecho) = '2020') nov_mes ON rc.id_novedades = nov_mes.id_novedades";


 ?>


