$(document).ready(function() {
//menu admin o side bar
	$("#menu-toggle").click(function(e) {
	    e.preventDefault();
	    $("#wrapper").toggleClass("toggled");
	});
//
});

// --------------EDITAR USUARIO---------------
//acciones en el CRUD del control de registro.
function accion(e){

    $(document).ready(function() {

        $('#edita_registros').modal('show'); 

        $('#lista_datos').click(function(){
            
            var valor_lista = $(this).val(); //eleccion 

            if(valor_lista == 'eliminar'){

                eliminar_user(e);
                $('#__modal').hide();
                $('#save_ctn').show();


            }
            if(valor_lista == 'editar'){

                editar_user(e);
                $('#save_ctn').hide();
                $('#__modal').show();
            }
        });
    });
}

function editar_user(e){

    $(document).ready(function() {
        $('#__modal').load('html/public/ediCRUD.html', function(){

            $('#notification').html('Usuario: ' + e);
            $('#edi_crud').submit(function() {
               
                var enviaForm = { usuario: e,
                                  nombre: $('#nombre').val(),
                                  apellido: $('#apellido').val(),
                                  correo: $('#correo').val(),
                                  pass: $('#pass').val(),
                                  nv: $('#nv').val()
                                };

                $.ajax({
                    url: 'core/bin/ajax/goEditar.php',
                    type: 'POST',
                    data: enviaForm, 
                })
                .done(function(es) {
                    alert(es);
                })
                .fail(function(es) {
                    alert(es);
                });
                
            });
            
        });
    });

}

function eliminar_user(e){

    $(document).ready(function() {
        
        $('#save').click(function(){

            var resp = prompt('¿Deseas eliminar este registro?');

            if(resp == 'si' || resp == 'aceptar' || resp == 'ok'){

                $.ajax({
                    url: 'core/bin/ajax/goEliminar.php',
                    type: 'GET',
                    data: { usuarioCRUD: e },
                })
                .done(function(resp) {

                    $( "#"+e+" td:last-child").hide( "fast", function() {
                    $( this ).prev().hide( "fast", arguments.callee );
                    });
                   
                    setInterval(function(){
                        window.location.href = 'index.php?action=admin';
                    },2300);
                        
                })
                .fail(function() {
                    alert('Error al eliminar este registro');
                });

            }                       
        });//click 
    });
}

//---------------crea nuevo administrador----------------------

function creaAdm(){

    $('#crea_adm').modal('show');
    $('#bd_adm').load('html/public/formCreaAdm.html',function(){
        $('#re_crud').submit(function() {

            $paquete = $(this).serialize();

            $.ajax({
                url: 'core/bin/ajax/goReg.php',
                type: 'POST',
                data: $paquete,
            })
            .done(function() {
                alert("success");
            })
            .fail(function() {
                alert("error");
            }); 
        });
    });

}




// ---------------------REGISTRAR PACIENTE---------------------

function paciente(){
    
    $(document).ready(function(){
   
        $('#crea_paciente').modal('show'); 
        $('#bd_modal').load('html/public/formCreaPaciente.html',function(){

            $('#nuevo_pac').submit(function() {
                var enviaForm = $(this).serialize();
                // alert(enviaForm);

                $.ajax({
                    url: 'core/bin/ajax/gtPaciente.php',
                    type: 'POST',
                    data: enviaForm,
                })
                .done(function(e) {
                    alert(e);
                })
                .fail(function() {
                    
                    console.log(e);
                });
            });

        });
    
    });
}

// --------------DETALLES PACIENTE------------
function detallesPac(){

    $(document).ready(function() {

        var table = $('#re_pa').DataTable();

        $('#re_pa tbody').on('click', 'tr', function () {

            var data = table.row( this ).data(); // fila clikeada

            $.ajax({
                url: 'core/bin/ajax/dtPaciente.php',
                type: 'POST',
                data: {ci:data[3]},
            })
            .done(function(e) {

                $('#crudo').load('html/public/detallesPaciente.php?ci='+e);
                
            })
            .fail(function() {
                alert('ERROR FATAL');
                console.log(e);
            });
                
        } );
    } );
}

//------------------CREAR UN DIAGNOSTICO-------------

function nuevoDiag(e){
    
    $(document).ready(function(){
   
        $('#crea_diag').modal('show'); 
        $('#bd_diag').load('html/public/formCreaDiag.html',function(){

            $('#nuevo_diag').submit(function() {
                var enviaForm = { 
                                  ci:e,
                                  cantidad: $('#cantidad').val(),
                                  concepto: $('#concepto').val(),
                                  subtotal: $('#subtotal').val(),
                                  total: $('#total').val(),
                                };

                // alert(enviaForm);

                $.ajax({
                    url: 'core/bin/ajax/nvDiag.php',
                    type: 'POST',
                    data: enviaForm,
                })
                .done(function(e) {
                    alert(e);
                })
                .fail(function() {
                    alert('verifique su registro');
                });
            });

        });
    
    });
}