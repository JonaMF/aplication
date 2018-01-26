<?php  

class Conectar{

	public static function conexion(){
		
		try{
			
			$conexion = new PDO('mysql:host=localhost; dbname=registro_usuarios', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$conexion->exec('SET CHARACTER SET UTF8');
		
		}catch(Exception $e){

			die('error ' . $e->getMessage());
		
		}
		return $conexion;
	}
}

?>