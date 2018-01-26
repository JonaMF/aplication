<?php  

class Conectar2{

	public static function conexion2(){
		
		try{
			
			$conexion = new PDO('mysql:host=localhost; dbname=test', 'root', '');

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$conexion->exec('SET CHARACTER SET UTF8');
		
		}catch(Exception $e){

			die('error ' . $e->getMessage());
		
		}
		return $conexion;
	}
}

?>