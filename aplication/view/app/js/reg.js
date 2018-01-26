$(document).ready(function(){

	$('#form_re').submit(function(){

		var enviaForm = $(this).serialize();

		$.post('core/bin/ajax/goReg.php', enviaForm, returnForm);

		return false;

	});

	function returnForm(e){
		var fail = '<div class="alert alert-dismissible alert-warning">';
			fail += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
			fail += '<p>La dirección mail ó usuario no es válida o está siendo usada.</p></div>';
			
		if(e == 'true'){
			$(location).attr('href','index.php?action=admin');
		}else{
			$('#notification').html(fail);
		}			
	}
});
