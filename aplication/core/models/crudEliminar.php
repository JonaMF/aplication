<?php 

class CrudEliminar{


	public function __construct(){
		require 'conexion.php';
		$this->bd = Conectar::conexion();
	}

	public function eliminar_registro(){

		try{

			$query = "DELETE FROM REGISTRO WHERE USUARIO = :u";

			$resultado = $this->bd->prepare($query);

			$usuario_ = htmlentities(addslashes($_GET['usuarioCRUD']));

			//vincula parametros user y correo
			$resultado->bindValue(":u", $usuario_);

			$resultado->execute();

			// TRUE si hubo alguna fila afectada 
			if($resultado->rowCount()){
			
				echo 'Usuario eliminado ' . $usuario_;

			}else{

				echo 'fail ' . $usuario_;

			}


		}catch(Exception $error_login){

			echo die("error " . $error_login->getMessage());
		}
	}
}
?>