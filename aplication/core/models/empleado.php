<?php  

class Empleado{

	private $bd2;
	private $usuario;
	private $nom;
	private $ape;
	private $edad;
	private $genero;
	private $profesion;
	private $rol;
	
	function __construct(){
		require 'conexion2.php';
		$this->bd2=Conectar2::conexion2();
	}
	
	function ci_empleado(){
		
		try {
			
			$query = "INSERT INTO EMPLEADOS(USUARIO) VALUES (:u)";
			$respuesta = $this->bd2->prepare($query);
			
			$this->usuario = strtolower(htmlentities(addslashes($_POST['usuario'])));
			
			$respuesta->execute(array(":u"=>$this->usuario));
			
		} catch (Exception $e) {
			die('error: ' . $e->getMessage());
		}
		
	}
}










?>