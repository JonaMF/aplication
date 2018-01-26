<?php 
	
	require '../../models/login_modelo.php';

		$Login = new Login();
		$Login->comprueba_login();
		
?>