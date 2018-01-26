<?php 

class CrudEditar{

	private $bd;

	public function __construct(){
		require 'conexion.php';
		$this->bd = Conectar::conexion();
	}

	public function editar_registro(){

		try{

			$nombre =   strtolower(htmlentities(addslashes($_POST['nombre'])));
			$apellido = strtolower(htmlentities(addslashes($_POST['apellido'])));
			$correo =   strtolower(htmlentities(addslashes($_POST['correo'])));
			$clave =    strtolower(htmlentities(addslashes($_POST['pass'])));
			$nv = 		strtolower(htmlentities(addslashes($_POST['nv'])));
			$usuario =  strtolower(htmlentities(addslashes($_POST['usuario'])));

			$query = "UPDATE REGISTRO SET NOMBRE= :n, APELLIDO= :a, CORREO= :c, CONTRASENA= :p, NIVEL= :nv WHERE USUARIO= :u";

			$resultado = $this->bd->prepare($query);

			//vincula parametros user y correo
			
			$resultado->bindValue(":n", $nombre);
			$resultado->bindValue(":a", $apellido);
			$resultado->bindValue(":c", $correo);
			$resultado->bindValue(":p", $clave);
			$resultado->bindValue(":nv", $nv);
			$resultado->bindValue(":u", $usuario);

			$resultado->execute();

			// TRUE si hubo alguna fila afectada 
			if($resultado->rowCount()){
			
				echo 'Credenciales actualizadas ' . $usuario;

			}else{

				echo 'fail ' . $usuario;

			}


		}catch(Exception $error_login){

			die("error " . $error_login->getMessage());
		}
	}
}
?>