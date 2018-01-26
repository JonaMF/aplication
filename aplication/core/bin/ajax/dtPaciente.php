<?php 

	require '../../models/paciente.php';

	$detalles = new Paciente();

	$res = $detalles->setSelecDetallesPac($_POST['ci']);
	echo $res->CEDULA;

?>