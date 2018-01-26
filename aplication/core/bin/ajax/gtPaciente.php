<?php 

	require '../../models/paciente.php';

	$pac = new Paciente();

	$pac->setPostPacientes(1,$_POST['nombre'],$_POST['apellido'],$_POST['cedula'],$_POST['diag']); //establece datos del post
	// $tabla = $pac->getSelecPacientes(); // query a la bbdd
	$seach = $pac->getSelecCiPacientes();

	if($seach == 'si'){
		echo 'error la cedula del paciente ya esta registrada';
	}
	else{
		$pac->getInsetPacientes();
	}
	
	


	
?>