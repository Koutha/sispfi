<?php 
class db {
	private $host_db = "localhost",
			$user_db = "postgres",
			$pass_db = "",
			$db_name = "db_pfi2019",
			$db_port = 5432;
			
	public function conexion(){
		try {
			$conexion = new PDO("pgsql:	host=$this->host_db;
										port=$this->db_port;
										dbname=$this->db_name",
										$this->user_db,
										$this->pass_db);
		}catch(PDOException $e){
			echo "Falló la conexion, reason: ". $e->getMessage();

		}
		return $conexion;
	}
}
?>
