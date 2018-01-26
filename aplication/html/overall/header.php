<!DOCTYPE html>
<html lang="es">
<head>
    <?php if(isset($_SESSION['start'])) : ?>
    <title>     <?php echo TITLE_ADM ?></title>
    <?php else : ?>
    <title>     <?php echo TITLE_INI ?></title>
    <?php endif; ?>
    <base href="<?php echo APP_URL   ?>">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="view/dataTables/css/theme-fundation.min.css">
    <link rel="stylesheet" href="view/dataTables/css/dataTables.foundation.min.css">
    <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/app/icons/css/font-awesome.css">
    <link rel="stylesheet" href="view/app/fonts/Oxygen.css">
    <link rel="stylesheet" href="view/app/css/estilos2.css">
    <link rel="stylesheet" href="view/app/css/sidebar.css">
    <link rel="stylesheet" href="view/pace/themes/blue/pace-theme-flash.css">
    <link rel="shortcut icon" href="view/app/ico/ico.png">
    <script src="view/pace/pace.min.js"></script>
    <script src="view/bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="view/app/js/generales.js"></script>
</head>