<?php
	require '../../core/models/paciente.php';
	$pac = new Paciente();
        $tabla = $pac->getSelecPacientes();
?>

<div>
    <table id="re_pa" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Dr(a)</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CEDULA</th>
                <th>DIAGNOSTICO</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Dr(a)</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CEDULA</th>
                <th>DIAGNOSTICO</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($tabla as $paciente) : ?>
            <tr>
                <td><?php echo $paciente->ID_PACIENTE; ?> </td>
                <td><?php echo $paciente->NOMBRE; ?> </td>
                <td><?php echo $paciente->APELLIDO; ?> </td>
                <td><?php echo $paciente->CEDULA; ?> </td>
                <td><?php echo $paciente->DIAGNOSTICO; ?> </td>
            </tr>
            <?php   endforeach; ?> 
            
        </tbody>
    </table>
    <div id="content_pac">
        <input type="button" value="Nuevo Paciente" onclick="paciente()"/>
    </div>
</div>
<?php require '../../html/public/creaPaciente.html'; ?>

<script>
$(document).ready(function() {

    var table = $('#re_pa').DataTable({

        "language": 
            {
                "lengthMenu": "Ver _MENU_ registros por página",
                "zeroRecords": "Sin registros almacenados",
                "info": "Mostrando _PAGE_ de _PAGES_ ",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }

    });
    // programado en front.js
    detallesPac();

} );
</script>