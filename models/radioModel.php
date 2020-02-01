<?php 
/**
 * 
 */
require_once('models/baseModel.php');

class radioClass extends baseClass{

	private $codigo_usuario,$status,$centro_trabajo, $tipo_comunicacion, $responsable, $empresa, $codigo_ip, $serial, $marca, $modelo, $estado, $serial_bateria, $est_bateria, $est_antena, $est_perillacan, $est_dustcap, $est_beltclip, $est_teclaptt, $est_cargador, $est_adaptador, $est_perillavol, $observacion;

	function __construct()
	{
		parent::__construct();
	}

	public function setCodigo_usuario ($codigo_usuario){
		$this->codigo_usuario = $codigo_usuario;
	}

	public function setStatus ($status){
		$this->status = $status;
	}

	public function setCentro_trabajo($centro_trabajo){
		$this->centro_trabajo = $centro_trabajo;
	}

	public function setTipo_comunicacion($tipo_comunicacion){
		$this->tipo_comunicacion = $tipo_comunicacion;
	}

	public function setResponsable($responsable){
		$this->responsable = $responsable;
	}

	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}

	public function setCodigo_ip($codigo_ip){
		$this->codigo_ip = $codigo_ip;
	}

	public function setSerial($serial){
		$this->serial = $serial;
	}

	public function setMarca($marca){
		$this->marca = $marca;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function setSerial_bateria($serial_bateria){
		$this->serial_bateria = $serial_bateria;
	}

	public function setEst_bateria($est_bateria){
		$this->est_bateria = $est_bateria;
	}

	public function setEst_antena($est_antena){
		$this->est_antena = $est_antena;
	}

	public function setEst_perillacan($est_perillacan){
		$this->est_perillacan = $est_perillacan;
	}

	public function setEst_dustcap($est_dustcap){
		$this->est_dustcap = $est_dustcap;
	}

	public function setEst_beltclip($est_beltclip){
		$this->est_beltclip = $est_beltclip;
	}

	public function setEst_teclaptt($est_teclaptt){
		$this->est_teclaptt = $est_teclaptt;
	}

	public function setEst_cargador($est_cargador){
		$this->est_cargador = $est_cargador;
	}

	public function setEst_adaptador($est_adaptador){
		$this->est_adaptador = $est_adaptador;
	}

	public function setEst_perillavol($est_perillavol){
		$this->est_perillavol = $est_perillavol;
	}

	public function setObservacion($observacion){
		$this->observacion = $observacion;
	}

	public function getCodigo_usuario(){
		return $this->codigo_usuario;
	}

	public function getStatus(){
		return $this->status;
	}

	public function getCentro_trabajo(){
		return $this->centro_trabajo;
	}

	public function getTipo_comunicacion(){
		return $this->tipo_comunicacion;
	}

	public function getResponsable(){
		return $this->responsable;
	}

	public function getEmpresa(){
		return $this->empresa;
	}

	public function getCodigo_ip(){
		return $this->codigo_ip;
	}

	public function getSerial(){
		return $this->serial;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getSerial_bateria(){
		return $this->serial_bateria;
	}

	public function getEst_bateria(){
		return $this->est_bateria;
	}

	public function getEst_antena(){
		return $this->est_antena;
	}

	public function getEst_perillacan(){
		return $this->est_perillacan;
	}

	public function getEst_dustcap(){
		return $this->est_dustcap;
	}

	public function getEst_Beltclip(){
		return $this->Est_beltclip;
	}

	public function getEst_teclaptt(){
		return $this->est_teclaptt;
	}

	public function getEst_cargador(){
		return $this->est_cargador;
	}

	public function getEst_adaptador(){
		return $this->est_adaptador;
	}

	public function getEst_perillavol(){
		return $this->est_perillavol;
	}

	public function getObservacion(){
		return $this->observacion;
	}

	public function getAll(){
		try {
			$sql="SELECT * FROM radio";
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
			$sql="SELECT * FROM radio WHERE $col=?";
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

	public function regRadio(){
		try {
			$sql = "INSERT 	INTO radio(codigo_usuario,status,centro_trabajo,tipo_comunicacion,
										responsable,empresa,codigo_ip,serial,
										marca,modelo,estado,serial_bateria,
										est_bateria,est_antena,est_perillacan,est_dustcap,
										est_beltclip,est_teclaptt,est_cargador,est_adaptador,
										est_perillavol,observacion) 
							VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->codigo_usuario);
			$sentence->bindParam(2, $this->status);
			$sentence->bindParam(3, $this->centro_trabajo);
			$sentence->bindParam(4, $this->tipo_comunicacion);
			$sentence->bindParam(5, $this->responsable);
			$sentence->bindParam(6, $this->empresa);
			$sentence->bindParam(7, $this->codigo_ip);
			$sentence->bindParam(8, $this->serial);
			$sentence->bindParam(9, $this->marca);
			$sentence->bindParam(10, $this->modelo);
			$sentence->bindParam(11, $this->estado);
			$sentence->bindParam(12, $this->serial_bateria);
			$sentence->bindParam(13, $this->est_bateria);
			$sentence->bindParam(14, $this->est_antena);
			$sentence->bindParam(15, $this->est_perillacan);
			$sentence->bindParam(16, $this->est_dustcap);
			$sentence->bindParam(17, $this->est_beltclip);
			$sentence->bindParam(18, $this->est_teclaptt);
			$sentence->bindParam(19, $this->est_cargador);
			$sentence->bindParam(20, $this->est_adaptador);
			$sentence->bindParam(21, $this->est_perillavol);
			$sentence->bindParam(22, $this->observacion);
			$sentence->execute(); 
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function editRadio($id){
		try {
			$sql = "UPDATE radio SET codigo_usuario=?,status=?,centro_trabajo=?,tipo_comunicacion=?,
										responsable=?,empresa=?,codigo_ip=?,serial=?,
										marca=?,modelo=?,estado=?,serial_bateria=?,
										est_bateria=?,est_antena=?,est_perillacan=?,est_dustcap=?,
										est_beltclip=?,est_teclaptt=?,est_cargador=?,est_adaptador=?,
										est_perillavol=?,observacion=?
							WHERE id_radio = ?";
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->codigo_usuario);
			$sentence->bindParam(2, $this->status);
			$sentence->bindParam(3, $this->centro_trabajo);
			$sentence->bindParam(4, $this->tipo_comunicacion);
			$sentence->bindParam(5, $this->responsable);
			$sentence->bindParam(6, $this->empresa);
			$sentence->bindParam(7, $this->codigo_ip);
			$sentence->bindParam(8, $this->serial);
			$sentence->bindParam(9, $this->marca);
			$sentence->bindParam(10, $this->modelo);
			$sentence->bindParam(11, $this->estado);
			$sentence->bindParam(12, $this->serial_bateria);
			$sentence->bindParam(13, $this->est_bateria);
			$sentence->bindParam(14, $this->est_antena);
			$sentence->bindParam(15, $this->est_perillacan);
			$sentence->bindParam(16, $this->est_dustcap);
			$sentence->bindParam(17, $this->est_beltclip);
			$sentence->bindParam(18, $this->est_teclaptt);
			$sentence->bindParam(19, $this->est_cargador);
			$sentence->bindParam(20, $this->est_adaptador);
			$sentence->bindParam(21, $this->est_perillavol);
			$sentence->bindParam(22, $this->observacion);
			$sentence->bindParam(23, $id);
			$sentence->execute(); 
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>