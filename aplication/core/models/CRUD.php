<?php  

class CRUD{

	private $bd;
	private $personas;

	public function __construct(){

		require 'conexion.php';

		$this->bd = Conectar::conexion();

	}

	public function getSelect(){
		try {
			
			$usuario = $this->bd->query('SELECT * FROM REGISTRO')->fetchAll(PDO::FETCH_OBJ);
			
			return $usuario;
			
		} catch (Exception $e) {
			die('error' . $e->getMessage());
		}

	}

}

?>