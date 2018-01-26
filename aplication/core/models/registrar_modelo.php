<?php  

class Registrar{

	private $bd;

	private $nombre;
	private $apellido;
	private $correo;
	private $usuario;
	private $clave;
	

	public function __construct(){
		require 'conexion.php';
		$this->bd = Conectar::conexion();
	}

	public function set_verify_login(){

		try{

			$queryComprueba = "SELECT * FROM REGISTRO WHERE CORREO = :c OR USUARIO = :u";

			$resultado = $this->bd->prepare($queryComprueba);

			$this->nombre = strtolower(htmlentities(addslashes($_POST['nombre'])));
			$this->apellido = strtolower(htmlentities(addslashes($_POST['apellido'])));
			$this->correo = $correo_ = strtolower(htmlentities(addslashes($_POST['correo'])));
			$this->usuario = $usuario_ = strtolower(htmlentities(addslashes($_POST['usuario'])));
			$this->clave = strtolower(htmlentities(addslashes($_POST['pass'])));

			$resultado->bindValue(':c', $correo_);
			$resultado->bindValue(':u', $usuario_);

			$resultado->execute();

			if($resultado->rowCount()){
				
				echo 'false';
			}
			else{

				Registrar::registrar_login();
				session_start();
				$_SESSION['start'] = $this->nombre . " " . $this->apellido;

				echo 'true';
			}

		}catch(Exception $error_registro){

			echo die("error " . $error_registro->getMessage());
		}
	} // FIN DE set_verify_login

	public function registrar_login(){

		try{

			$queryRegistra = "INSERT INTO REGISTRO(NOMBRE, APELLIDO, CORREO, USUARIO, CONTRASENA) VALUES (:n ,:a,:c, :u, :p)";

			$resultado = $this->bd->prepare($queryRegistra);

			$resultado->execute(array(":n"=>$this->nombre, ":a"=>$this->apellido, ":c"=>$this->correo, ":u"=>$this->usuario, ":p"=>$this->clave));
			
			require 'empleado.php';
			
			$reg = new Empleado();
			$reg->ci_empleado();

		}catch(Exception $registroError){

			echo die("Exception: " . $registroError->getMessage());
		}

	
	} // FIN DE get_registrar_login

}// FIN DE LA CLASE LOGIN

?>