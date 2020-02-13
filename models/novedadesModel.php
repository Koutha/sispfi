<?php 
/**
 * 
 */
require_once('models/baseModel.php');
class novedadesClass extends baseClass{

	private $id_novedades, $id_usuario, $lugar, 
			$fecha_hecho, $fecha_reporte, $descripcion, 
			$seccion, //secciones: BATERIA, ENGORDE, MATERNIDAD, RECRIA.
			$cantidad, $kilos, $ubicacion;
			// $cantidad_B, $cantidad_E, $catidad_M, $cantidad_R,
			// $kilos_B, $kilos_E, $kilos_M, $kilos_R,
			// $ubicacion_B, $ubicacion_E, $ubicacion_M, $ubicacion_R;

	function __construct()
	{
		parent::__construct();
	}
	//setters
	public function setId_novedades($id_novedades){
		$this->id_novedades = $id_novedades;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function setLugar($lugar){
		$this->lugar = $lugar;
	}

	public function setFecha_hecho($fecha_hecho){
		$this->fecha_hecho = $fecha_hecho;
	}

	public function setFecha_reporte($fecha_reporte){
		$this->fecha_reporte = $fecha_reporte;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function setSeccion($seccion){
		$this->seccion = $seccion;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function setKilos($kilos){
		$this->kilos = $kilos;
	}

	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}

	/*public function setCantidad_B($cantidad_B){
		$this->cantidad_B = $cantidad_B;
	}

	public function setCantidad_E($cantidad_E){
		$this->cantidad_E = $cantidad_E;
	}

	public function setCatidad_M($catidad_M){
		$this->catidad_M = $catidad_M;
	}

	public function setCantidad_R($cantidad_R){
		$this->cantidad_R = $cantidad_R;
	}

	public function setKilos_B($kilos_B){
		$this->kilos_B = $kilos_B;
	}

	public function setKilos_E($kilos_E){
		$this->kilos_E = $kilos_E;
	}

	public function setKilos_M($kilos_M){
		$this->kilos_M = $kilos_M;
	}

	public function setKilos_R($kilos_R){
		$this->kilos_R = $kilos_R;
	}

	public function setUbicacion_B($ubicacion_B){
		$this->ubicacion_B = $ubicacion_B;
	}

	public function setUbicacion_E($ubicacion_E){
		$this->ubicacion_E = $ubicacion_E;
	}

	public function setUbicacion_M($ubicacion_M){
		$this->ubicacion_M = $ubicacion_M;
	}

	public function setUbicacion_R($ubicacion_R){
		$this->ubicacion_R = $ubicacion_R;
	}*/

	public function getId_novedades(){
		return $this->id_novedades;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function getLugar(){
		return $this->lugar;
	}

	public function getFecha_hecho(){
		return $this->fecha_hecho;
	}

	public function getFecha_reporte(){
		return $this->fecha_reporte;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getSeccion(){
		return $this->seccion;
	}

	/*public function getCantidad_B(){
		return $this->cantidad_B;
	}

	public function getCantidad_E(){
		return $this->cantidad_E;
	}

	public function getCantidad_M(){
		return $this->cantidad_M;
	}

	public function getCantidad_R(){
		return $this->cantidad_R;
	}

	public function getKilos_B(){
		return $this->kilos_B;
	}

	public function getKilos_E(){
		return $this->kilos_E;
	}

	public function getKilos_M(){
		return $this->kilos_M;
	}

	public function getKilos_R(){
		return $this->kilos_R;
	}

	public function getUbicacion_B(){
		return $this->ubicacion_B;
	}

	public function getUbicacion_E(){
		return $this->ubicacion_E;
	}

	public function getUbicacion_M(){
		return $this->ubicacion_M;
	}

	public function getUbicacion_R(){
		return $this->ubicacion_R;
	}*/

	public function getAll(){
		try {
			$sql="SELECT * FROM novedades";
			$conn = $this->getConexion();
			$query=$conn->prepare($sql);
			$query->execute();
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$result[] = $row;
			}
			if(!empty($result)){
				return $result;
			}else{
				return 0;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function getBy($col, $val){ //devuele la consulta recibiendo columna y valor
		try {
			$sql="SELECT * FROM novedades WHERE $col=?";
			$conn = $this->getConexion();
			$query=$conn->prepare($sql);
			$query->bindParam(1, $val);
			$query->execute();
			if($row = $query->fetch(PDO::FETCH_ASSOC)){
				$result= $row;
				return $result;
			}else{
				return 0;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function regNovedades(){ //registra y settea el id en el atributo id_novedades de la clase
		try {
			$sql = "INSERT 	INTO novedades(id_usuario, lugar, fecha_hecho, fecha_reporte,
											descripcion) 
							VALUES(?,?,?,?,?)";
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->id_usuario);
			$sentence->bindParam(2, $this->lugar);
			$sentence->bindParam(3, $this->fecha_hecho);
			$sentence->bindParam(4, $this->fecha_reporte);
			$sentence->bindParam(5, $this->descripcion);
			$sentence->execute();
			$this->setId_novedades($conn->lastInsertId('novedades_id_novedades_seq'));
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function regRoboCerdos(){ //registra y settea el id en el atributo id_novedades de la clase
		try {
			$sql = "INSERT 	INTO robo_cerdo(id_novedades, seccion, 
											cantidad, kilos, ubicacion) 
							VALUES(?,?,?,?,?)";
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->id_novedades);
			$sentence->bindParam(2, $this->seccion);
			$sentence->bindParam(3, $this->cantidad);
			$sentence->bindParam(4, $this->kilos);
			$sentence->bindParam(5, $this->ubicacion);
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}


	public function totalMesAño ($año,$año1, $mes){
	//total de animales y kilos por mes 1-12 -- EXTRACT(MONTH FROM fecha_hecho) = 1 -- de un año dado 
		try {
			$sql=	"SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc
						JOIN (select * from (SELECT * FROM novedades 
						WHERE fecha_hecho 
						BETWEEN '$año' AND timestamp '$año1' + interval '1 year') nov_año
						WHERE EXTRACT(MONTH FROM fecha_hecho) = '$mes') nov_mes ON rc.id_novedades = nov_mes.id_novedades";
			$conn = $this->getConexion();
			// $query=$conn->prepare($sql);
			// $query->bindParam(1, $año,PDO::PARAM_STR);
			// $query->bindParam(2, $año1, PDO::PARAM_STR);
			// $query->bindParam(3, $mes, PDO::PARAM_INT);
			// $query->execute();
			$query=$conn->query($sql);
			if($row = $query->fetch(PDO::FETCH_ASSOC)){
				$result= $row;
				return $result;
			}else{
				return 0;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	}
} ?>