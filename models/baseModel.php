<?php 
/**
 * 
 */
class baseClass{

	private $db;
	private $conexion;

	function __construct(){
		require_once('core/dbVariables.php');
		$this->db= new db();
		$this->conexion = $this->db->conexion();
	}

    public function getConexion(){
        return $this->conexion;
    }

}
?>