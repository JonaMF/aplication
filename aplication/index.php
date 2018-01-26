<?php  

require 'core/core.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if(file_exists('core/controllers/'. strtolower($action) .'Controller.php')){

    include 'core/controllers/'. $action .'Controller.php';

}else{

    include 'core/controllers/errorController.php';
}
?>
