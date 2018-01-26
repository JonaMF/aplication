$(document).ready(function(){

	$('#form_lo').submit(function(){

		var enviaForm = $(this).serialize();

		$.post('core/bin/ajax/goLogin.php', enviaForm, returnForm);

		return false;

	});

	function returnForm(e){
		if(e == 'success'){
			$(location).attr('href','index.php?action=admin');
		}else{
			$('#notification2').html(e);
		}
	}
});
