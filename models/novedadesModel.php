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

	public function getAll(){
		try {
			// $sql="SELECT id_novedades, nov.id_usuario, username, lugar, fecha_hecho, fecha_reporte, descripcion
			// 		FROM novedades nov
			// 			JOIN usuario u ON nov.id_usuario = u.id_usuario";
			$sql = "SELECT nov.id_novedades, nov.id_usuario, username, lugar, 
							fecha_hecho, fecha_reporte,
							sum(cantidad) as total_cerdos, sum(kilos) as total_kilos, 
							descripcion
					FROM novedades nov
						JOIN usuario u ON nov.id_usuario = u.id_usuario
						JOIN robo_cerdo rc ON nov.id_novedades = rc.id_novedades
					GROUP BY nov.id_novedades, username
					ORDER BY id_novedades";
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
	
	public function getBy($val){ //devuele la consulta recibiendo columna y valor
		try {
			// $sql="SELECT * FROM novedades WHERE $col=?";
			$sql = "SELECT 	nov.id_novedades, nov.id_usuario, username, lugar, 
							fecha_hecho, fecha_reporte, descripcion, rc.seccion, 
							rc.cantidad, rc.kilos, rc.ubicacion,rc.kilos/rc.cantidad as avgan
					FROM novedades nov
					JOIN usuario u ON nov.id_usuario = u.id_usuario
					JOIN robo_cerdo rc ON rc.id_novedades = nov.id_novedades
					WHERE nov.id_novedades = ?";
			$conn = $this->getConexion();
			$query=$conn->prepare($sql);
			$query->bindParam(1, $val);
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

	public function updateNovedades(){
		try {
			$sql = 'UPDATE novedades SET id_usuario=:id_usuario, lugar=:lugar, fecha_hecho=:fecha_hecho,
										fecha_reporte=:fecha_reporte, descripcion=:descripcion
					WHERE id_novedades=:id_novedades';
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(':id_usuario', $this->id_usuario);
			$sentence->bindParam(':lugar', $this->lugar);
			$sentence->bindParam(':fecha_hecho', $this->fecha_hecho);
			$sentence->bindParam(':fecha_reporte', $this->fecha_reporte);
			$sentence->bindParam(':descripcion', $this->descripcion);
			$sentence->bindParam(':id_novedades', $this->id_novedades);
			$sentence->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function delRoboCerdos(){
		try {
			$sql = 'DELETE FROM robo_cerdo WHERE id_novedades=?';
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->id_novedades);
			$sentence->execute();
		} catch (PDException $e) {
			echo $e->getMessage();
		}
	}

	public function totalMesAño ($año,$mes){
	//total de animales y kilos por mes 1-12 -- EXTRACT(MONTH FROM fecha_hecho) = 1 -- de un año dado 
		try {
			$sql=	"SELECT sum(cantidad) as total_cerdos, sum(kilos) as total_kilos FROM robo_cerdo rc
						JOIN (select * from (SELECT * FROM novedades 
						WHERE fecha_hecho 
						BETWEEN '$año' AND timestamp '$año' + interval '1 year') nov_año
						WHERE EXTRACT(MONTH FROM fecha_hecho) = '$mes') nov_mes ON rc.id_novedades = nov_mes.id_novedades";
			$conn = $this->getConexion();
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

	 public function totalAño ($año){
	 //total de animales robados y total de kilos por año
	 	try {
	 		$sql = "SELECT sum(cantidad) AS total_cerdos, sum(kilos) AS total_kilos 
	 				FROM robo_cerdo rc 
					JOIN (	SELECT * 
							FROM novedades 
							WHERE fecha_hecho 
							BETWEEN '$año' AND timestamp '$año' + interval '1 year') nv 
					ON rc.id_novedades = nv.id_novedades";	
			$conn = $this->getConexion();
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

	 public function totalAñoGranjas ($año){
	 //total de animales robados y total de kilos por año por granjas
	 	try {
	 		$sql = "SELECT sum(rc.cantidad) as total_cerdos , sum(rc.kilos) as total_kilos, lugar  
	 				FROM robo_cerdo rc 
					JOIN (SELECT * FROM novedades WHERE fecha_hecho BETWEEN '$año' AND timestamp '$año' + interval '1 year') nv 
					ON rc.id_novedades = nv.id_novedades GROUP BY nv.lugar";
			$conn = $this->getConexion();
			$query=$conn->query($sql);
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

	 public function totalAñoSeccion ($año){
	 //total de animales robados y total de kilos por año
	 	try {
	 		$sql = "SELECT sum(rc.cantidad) as total_cerdos , sum(rc.kilos) as total_kilos, rc.seccion  
	 				FROM robo_cerdo rc 
					JOIN (SELECT * FROM novedades WHERE fecha_hecho BETWEEN '$año' AND timestamp '$año' + interval '1 year') nv 
					ON rc.id_novedades = nv.id_novedades GROUP BY rc.seccion";
			$conn = $this->getConexion();
			$query=$conn->query($sql);
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
} 
?>
