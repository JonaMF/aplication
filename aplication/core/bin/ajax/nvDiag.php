<?php  

	require '../../models/paciente.php';

	$diag = new Paciente();

	$diag->setPostDiagNuevo($_POST['ci'],$_POST['cantidad'],$_POST['concepto'],$_POST['subtotal'],$_POST['total']);

	$diag->getInsetDiagPaciente();

?>