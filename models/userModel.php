<?php 
/**
 * 
 */
require_once('models/baseModel.php');

class userClass extends baseClass{

	private $username, $password, $nombres, $apellidos, $cedula, $email;

	function __construct()
	{
		parent::__construct();
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getnombres(){
		return $this->nombres;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setCedula($cedula){
		$this->cedula = $cedula;
	}

	public function getCedula(){
		return $this->cedula;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getAll(){
		try {
			$sql="SELECT * FROM usuario";
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

	public function getByUsername($username){
		try {
			$sql="SELECT * FROM usuario WHERE username=?";
			$conn = $this->getConexion();
			$query=$conn->prepare($sql);
			$query->bindParam(1, $username);
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

	public function getByCed($cedula){
		try {
			$sql="SELECT * FROM usuario WHERE cedula=?";
			$conn = $this->getConexion();
			$query=$conn->prepare($sql);
			$query->bindParam(1, $cedula);
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

	public function regUser(){
		try {
			$sql = "INSERT 	INTO usuario(username, password, nombres, apellidos, cedula, email) 
							VALUES(?,?,?,?,?,?)";
			$conn = $this->getConexion();
			$sentence = $conn->prepare($sql);
			$sentence->bindParam(1, $this->username);
			$sentence->bindParam(2, $this->password);
			$sentence->bindParam(3, $this->nombres);
			$sentence->bindParam(4, $this->apellidos);
			$sentence->bindParam(5, $this->cedula);
			$sentence->bindParam(6, $this->email);
			$sentence->execute(); 
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

}
?>