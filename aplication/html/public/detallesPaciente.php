<?php  

    require '../../core/models/paciente.php';

    $res = new Paciente();
    $detallesPac = $res->setSelecDetallesPac($_GET['ci']);
    $filaDiag = $res->detallesDiagnostico($_GET['ci']);
?>

<table id="detallesPac" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>PACIENTE</th>
            <th>CANTIDAD</th>
            <th>CONCEPTO</th>
            <th>TOTAL</th>
            <th>SUB TOTAL</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>PACIENTE</th>
            <th>CANTIDAD</th>
            <th>CONCEPTO</th>
            <th>TOTAL</th>
            <th>SUB TOTAL</th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($filaDiag as $fila) : ?>
        <tr>
            <td><?php echo $detallesPac->NOMBRE . " " . $detallesPac->APELLIDO;?></td>
            <td><?php echo $fila->CANTIDAD ?></td>
            <td><?php echo $fila->CONCEPTO ?></td>
            <td><?php echo $fila->SUB_TOTAL ?></td>
            <td><?php echo $fila->TOTAL ?></td>
        </tr> 
        <?php endforeach; ?> 
    </tbody>
</table>

<div id="content_diag">
    <input type="button" value="Crea un campo" onclick="nuevoDiag(<?php echo $_GET['ci'];?>)"/>
</div>

<?php require '../../html/public/creaDiag.php'; ?>

<script>

$(document).ready(function() {
    var table = $('#detallesPac').DataTable({

        "language": 
            {
                "lengthMenu": "Ver _MENU_ registros por página",
                "zeroRecords": "Este paciente no tiene ningun historial medico",
                "info": "Mostrando _PAGE_ de _PAGES_ ",
                "infoEmpty": '<?php echo $detallesPac->NOMBRE . " " . $detallesPac->APELLIDO;?> sin registros',
                "infoFiltered": "(filtered from _MAX_ total records)"
            }

    });
});

</script>