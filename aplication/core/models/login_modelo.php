<?php 

class Login{

	private $nombre_login;
	private $correo;
	private $pass_login;
	private $arrayUsers;

	public function __construct(){
		require 'conexion.php';
		$this->bd = Conectar::conexion();
	}

	public function comprueba_login(){

		try{

			$queryUsers = "SELECT * FROM REGISTRO WHERE CORREO = :c OR USUARIO = :u";
			$queryClave = "SELECT * FROM REGISTRO WHERE CONTRASENA = :p";

			$preUsers = $this->bd->prepare($queryUsers);
			$preClave = $this->bd->prepare($queryClave);

			$this->nombre_login = $usuario_ = htmlentities(addslashes($_POST['nombre_login']));
			$this->pass_login = $clave_ = htmlentities(addslashes($_POST['pass_login']));

			//vincula parametros user y correo
			$preUsers->bindValue(":c", $usuario_);
			$preUsers->bindValue(":u", $usuario_);

			//vincula parametros clave
			$preClave->bindValue(":p", $clave_);

			$preUsers->execute();
			$preClave->execute();

			// TRUE si hubo alguna fila afectada 
			if($preUsers->rowCount() && $preClave->rowCount()){
			
				$arrayUsers = $preUsers->fetch(PDO::FETCH_OBJ);
				$arrayClave = $preClave->fetch(PDO::FETCH_OBJ);

				if($arrayUsers->CONTRASENA == $arrayClave->CONTRASENA){ 

					session_start();
					$_SESSION['start'] = $arrayUsers->NOMBRE . " " . $arrayUsers->APELLIDO;

					echo 'success';

				}else{

					$result = 
						'<div class="alert alert-dismissible alert-warning">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <p>Las credenciales son incorrectas</p>
						</div>';

					echo $result;

				}
			
			}else{
					$result = 
						'<div class="alert alert-dismissible alert-warning">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <p>Las credenciales son incorrectas</p>
						</div>';

					echo $result;

			}


		}catch(Exception $error_login){

			echo die("error " . $error_login->getMessage());

		}
	}
}
?>