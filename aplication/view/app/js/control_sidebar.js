$(document).ready(function(){
	$('#crudo').load('html/public/tabCRUD.php');
	//registrar usuarios
    $('#registrar_user').click(function(event) {
        event.preventDefault();
        $('#crudo').load('html/public/tabCRUD.php');
    });
    //configurar usuarios
    $('#configurar').click(function(event){
    	event.preventDefault();
    	$("#wrapper").toggleClass("toggled",false);
    	$('#crudo').load('html/public/configPerfil.php');
    });
    //registrar pacientes
    $('#registrar_paciente').click(function(event){
    	event.preventDefault();
    	$('#crudo').load('html/public/regPaciente.php');
    });
});
